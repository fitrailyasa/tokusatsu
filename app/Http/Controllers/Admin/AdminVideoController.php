<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VideoImport;
use App\Exports\VideoExport;
use App\Http\Requests\VideoRequest;
use App\Http\Requests\TableRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminVideoController extends Controller
{
    protected $title = "Video";

    // Middleware for video permissions
    public function __construct()
    {
        $this->middleware('permission:view:video')->only(['index']);
        $this->middleware('permission:create:video')->only(['store']);
        $this->middleware('permission:edit:video')->only(['update', 'toggleStatus']);
        $this->middleware('permission:delete:video')->only(['destroy']);
        $this->middleware('permission:delete-all:video')->only(['destroyAll']);
        $this->middleware('permission:soft-delete:video')->only(['softDelete']);
        $this->middleware('permission:soft-delete-all:video')->only(['softDeleteAll']);
        $this->middleware('permission:restore:video')->only(['restore']);
        $this->middleware('permission:restore-all:video')->only(['restoreAll']);
        $this->middleware('permission:import:video')->only(['import']);
        $this->middleware('permission:export:video')->only(['exportExcel', 'exportPDF']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $types = [
            ['id' => 'episode', 'name' => 'Series'],
            ['id' => 'special', 'name' => 'Special'],
            ['id' => 'movie', 'name' => 'Movie'],
            ['id' => 'hyper-battle-dvd', 'name' => 'Hyper Battle DVD'],
            ['id' => 'spin-off', 'name' => 'Spin-Off'],
            ['id' => 'v-cinema', 'name' => 'V-Cinema'],
            ['id' => 'mini-series', 'name' => 'Mini-Series'],
            ['id' => 'stageshow', 'name' => 'Stage Show'],
            ['id' => 'manga', 'name' => 'Manga'],
            ['id' => 'novel', 'name' => 'Novel'],
            ['id' => 'hero-saga', 'name' => 'Hero Saga'],
            ['id' => 'audio-drama', 'name' => 'Audio Drama'],
            ['id' => 'net-movie', 'name' => 'Net Movie'],
            ['id' => 'video-game', 'name' => 'Video Game'],
            ['id' => 'other', 'name' => 'Other'],
        ];

        $categories = Category::all();
        $groupedCategories = $categories->groupBy('franchise.name');

        $videos = Video::withTrashed()
            ->with(['category', 'category.era', 'category.franchise'])
            ->when(!Gate::allows('edit:video'), function ($query) {
                $query->where('status', 1);
            })
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
            ->orderByRaw("
                            (
                                link IS NULL
                                OR link = ''
                                OR link = '[]'
                                OR link = '{}'
                            ) DESC
                        ")
            ->orderBy('airdate', 'desc')
            ->paginate($validPerPage);

        $totalEmptyLinks = Video::withTrashed()->emptyLink()->count();
        $emptyLinkPerCategory = Video::withTrashed()->emptyLinkPerCategory()->get();

        return view('admin.video.index', compact(
            'videos',
            'totalEmptyLinks',
            'emptyLinkPerCategory',
            'groupedCategories',
            'categories',
            'categoryId',
            'types',
            'search',
            'perPage'
        ));
    }

    // Handle toggle status video
    public function toggleStatus($id)
    {
        $video = Video::withTrashed()->findOrFail($id);

        $video->status = $video->status == 1 ? 0 : 1;
        $video->save();

        return redirect()->back()->with('success', 'Successfully Change Status ' . $this->title . '!');
    }

    // Handle import video data from excel file
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10240|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new VideoImport, $file);

        return back()->with('success', 'Successfully Import ' . $this->title . '!');
    }

    // Handle export video data to excel file
    public function exportExcel(Request $request)
    {
        $categoryId = $request->query('category_id');

        $categoryName = $categoryId
            ? Category::where('id', $categoryId)->value('fullname')
            : null;

        $fileName = 'Data Video';

        if (!empty($categoryName)) {
            $fileName .= ' ' . $categoryName;
        }

        $fileName .= '.xlsx';

        return Excel::download(new VideoExport($categoryId), $fileName);
    }

    // Handle export video data to pdf file
    public function exportPDF()
    {
        $videos = Video::all();
        $pdf = Pdf::loadView('admin.video.pdf.template', compact('videos'));

        return $pdf->stream('Data video.pdf');
    }

    // Handle store data
    public function store(VideoRequest $request)
    {
        Video::create($request->validated());

        return back()->with('success', 'Successfully Create ' . $this->title . '!');
    }

    // Handle update data
    public function update(VideoRequest $request, $id)
    {
        Video::findOrFail($id)->update($request->validated());

        return back()->with('success', 'Successfully Edit ' . $this->title . '!');
    }

    // Handle hard delete data
    public function destroy($id)
    {
        Video::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete ' . $this->title . '!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        Video::truncate();
        return back()->with('success', 'Successfully Delete All ' . $this->title . '!');
    }

    // Handle soft delete data
    public function softDelete($id)
    {
        Video::findOrFail($id)->delete();
        return back()->with('success', 'Successfully Delete ' . $this->title . '!');
    }

    // Handle soft delete all data
    public function softDeleteAll()
    {
        Video::query()->delete();
        return back()->with('success', 'Successfully Delete All ' . $this->title . '!');
    }

    // Handle restore data
    public function restore($id)
    {
        Video::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Successfully Restore ' . $this->title . '!');
    }

    // Handle restore all data
    public function restoreAll()
    {
        Video::onlyTrashed()->restore();

        return back()->with('success', 'Successfully Restore All ' . $this->title . '!');
    }
}
