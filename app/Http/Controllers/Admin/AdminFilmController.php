<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FilmImport;
use App\Exports\FilmExport;
use App\Http\Requests\FilmRequest;

class AdminFilmController extends Controller
{
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
        $this->middleware('permission:export-film')->only(['export']);
    }

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $categories = Category::all();
        $groupedCategories = $categories->groupBy('franchise.name');
        $types = [
            [
                'id' => 'episode',
                'name' => 'Episode'
            ],
            [
                'id' => 'special',
                'name' => 'Special'
            ],
            [
                'id' => 'movie',
                'name' => 'Movie'
            ],
            [
                'id' => 'stageshow',
                'name' => 'Stage Show'
            ],
            [
                'id' => 'manga',
                'name' => 'Manga'
            ],
            [
                'id' => 'novel',
                'name' => 'Novel'
            ],
            [
                'id' => 'herosaga',
                'name' => 'Hero Saga'
            ],
            [
                'id' => 'audiodrama',
                'name' => 'Audio Drama'
            ],
            [
                'id' => 'netmovie',
                'name' => 'Net Movie'
            ],
            [
                'id' => 'videogame',
                'name' => 'Video Game'
            ],
            [
                'id' => 'print',
                'name' => 'Print'
            ],
            [
                'id' => 'other',
                'name' => 'Other'
            ],
        ];

        if ($search) {
            $films = Film::withTrashed()
                ->with(['category', 'category.era', 'category.franchise'])
                ->when($search, function ($query, $search) {
                    $query->where(function ($query) use ($search) {
                        $searchTerms = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);

                        foreach ($searchTerms as $term) {
                            $query->where(function ($q) use ($term) {
                                $q->where('name', 'like', "%{$term}%")
                                    ->orWhere('type', 'like', "%{$term}%")
                                    ->orWhere('number', 'like', "%{$term}%")
                                    ->orWhereHas('category', function ($q) use ($term) {
                                        $q->where('name', 'like', "%{$term}%")
                                            ->orWhereHas('era', function ($q) use ($term) {
                                                $q->where('name', 'like', "%{$term}%");
                                            })
                                            ->orWhereHas('franchise', function ($q) use ($term) {
                                                $q->where('name', 'like', "%{$term}%");
                                            });
                                    });
                            });
                        }
                    });
                })
                ->paginate($validPerPage);
        } else {
            $films = Film::withTrashed()
                ->with(['category', 'category.era', 'category.franchise'])
                ->paginate($validPerPage);
        }

        return view("admin.film.index", compact('films', 'groupedCategories', 'categories', 'types', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new FilmImport, $file);

        return back()->with('message', 'Berhasil Import Film!');
    }

    public function export()
    {
        return Excel::download(new FilmExport, 'Film.xlsx');
    }

    public function store(FilmRequest $request)
    {
        Film::create($request->validated());

        return back()->with('message', 'Berhasil Tambah Film!');
    }

    public function update(FilmRequest $request, $id)
    {
        Film::findOrFail($id)->update($request->validated());

        return back()->with('message', 'Berhasil Edit Film!');
    }

    public function destroy($id)
    {
        Film::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('message', 'Berhasil Hapus Film!');
    }

    public function destroyAll()
    {
        Film::truncate();
        return back()->with('message', 'Berhasil Hapus Semua Film!');
    }

    public function softDelete($id)
    {
        Film::findOrFail($id)->delete();
        return back()->with('message', 'Berhasil Hapus Film!');
    }

    public function softDeleteAll()
    {
        Film::query()->delete();
        return back()->with('message', 'Berhasil Hapus Semua Film!');
    }

    public function restore($id)
    {
        Film::withTrashed()->findOrFail($id)->restore();
        return back()->with('message', 'Berhasil Restore Film!');
    }

    public function restoreAll()
    {
        Film::onlyTrashed()->restore();

        return back()->with('message', 'Berhasil Restore Semua Film!');
    }
}
