<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FilmImport;
use App\Exports\FilmExport;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminFilmController extends Controller
{
    // Middleware for film permissions
    public function __construct()
    {
        $this->middleware('permission:view-film')->only(['index']);
        $this->middleware('permission:create-film')->only(['store']);
        $this->middleware('permission:edit-film')->only(['update']);
        $this->middleware('permission:delete-film')->only(['destroy']);
        $this->middleware('permission:delete-all-film')->only(['destroyAll']);
        $this->middleware('permission:soft-delete-film')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all-film')->only(['softDeleteAll']);
        $this->middleware('permission:restore-film')->only(['restore']);
        $this->middleware('permission:restore-all-film')->only(['restoreAll']);
        $this->middleware('permission:import-film')->only(['import']);
        $this->middleware('permission:export-film')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $types = [
            ['id' => 'episode', 'name' => 'Episode'],
            ['id' => 'special', 'name' => 'Special'],
            ['id' => 'movie', 'name' => 'Movie'],
            ['id' => 'stageshow', 'name' => 'Stage Show'],
            ['id' => 'manga', 'name' => 'Manga'],
            ['id' => 'novel', 'name' => 'Novel'],
            ['id' => 'herosaga', 'name' => 'Hero Saga'],
            ['id' => 'audiodrama', 'name' => 'Audio Drama'],
            ['id' => 'netmovie', 'name' => 'Net Movie'],
            ['id' => 'videogame', 'name' => 'Video Game'],
            ['id' => 'print', 'name' => 'Print'],
            ['id' => 'other', 'name' => 'Other'],
        ];
        $categories = Category::all();
        $groupedCategories = $categories->groupBy('franchise.name');

        $films = Film::withTrashed()
            ->with(['category', 'category.era', 'category.franchise'])
            ->when($search, function ($query, $search) {
                $searchTerms = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchTerms as $term) {
                    $query->where(function ($q) use ($term) {
                        $q->where('name', 'like', "%{$term}%")
                            ->orWhere('img', 'like', "%{$term}%")
                            ->orWhereHas('category', function ($q) use ($term) {
                                $q->where('name', 'like', "%{$term}%")
                                    ->orWhereHas('era', fn($q) => $q->where('name', 'like', "%{$term}%"))
                                    ->orWhereHas('franchise', fn($q) => $q->where('name', 'like', "%{$term}%"));
                            });
                    });
                }
            })
            ->when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->orderBy('id', 'desc')
            ->paginate($validPerPage);

        return view('admin.film.index', compact(
            'films',
            'groupedCategories',
            'categories',
            'categoryId',
            'types',
            'search',
            'perPage'
        ));
    }

    // Handle import film data from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new FilmImport, $file);

        return back()->with('success', 'Successfully Import Film!');
    }

    // Handle export film data to excel file
    public function exportExcel()
    {
        return Excel::download(new FilmExport, 'Data Film.xlsx');
    }

    // Handle export film data to pdf file
    public function exportPDF()
    {
        $films = Film::all();
        $pdf = Pdf::loadView('admin.film.pdf.template', compact('films'));

        return $pdf->stream('Data Film.pdf');
    }

    // Handle store data
    public function store(FilmRequest $request)
    {
        Film::create($request->validated());

        return back()->with('success', 'Successfully Create Film!');
    }

    // Handle update data
    public function update(FilmRequest $request, $id)
    {
        Film::findOrFail($id)->update($request->validated());

        return back()->with('success', 'Successfully Edit Film!');
    }

    // Handle hard delete data
    public function destroy($id)
    {
        Film::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete Film!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        Film::truncate();
        return back()->with('success', 'Successfully Delete All Film!');
    }

    // Handle soft delete data
    public function softDelete($id)
    {
        Film::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete Film!');
    }

    // Handle soft delete all data
    public function softDeleteAll()
    {
        Film::query()->delete();
        return back()->with('success', 'Successfully Delete All Film!');
    }

    // Handle restore data
    public function restore($id)
    {
        Film::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore Film!');
    }

    // Handle restore all data
    public function restoreAll()
    {
        Film::onlyTrashed()->restore();

        return back()->with('success', 'Successfully Restore All Film!');
    }
}
