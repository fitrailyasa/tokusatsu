<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VideoImport;
use App\Exports\VideoExport;
use App\Http\Requests\VideoRequest;
use App\Http\Requests\TableRequest;

class AdminVideoController extends AdminBaseCrudController
{
    protected $model = Video::class;
    protected $title = 'video';
    protected $permissionName = 'video';

    protected $exportClass = VideoExport::class;
    protected $importClass = VideoImport::class;
    protected $requestClass = VideoRequest::class;
    protected $pdfView = 'admin.video.pdf.template';

    protected $imageField = 'img';
    protected $imageFolder = 'video';

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

        $keywords = explode(' ', $search);

        $videos = Video::withTrashed()
            ->with(['category', 'category.era', 'category.franchise'])
            ->when(!Gate::allows('edit:video'), function ($query) {
                $query->where('status', 1);
            })
            ->where(function ($query) use ($keywords) {

                foreach ($keywords as $word) {

                    $query->where(function ($q) use ($word) {

                        if (is_numeric($word)) {

                            $q->where('number', '=', $word)
                                ->orWhereHas('category', function ($cat) use ($word) {
                                    $like = '%' . $word . '%';
                                    $cat->where('fullname', 'like', $like)
                                        ->orWhere('name', 'like', $like);
                                });
                        } else {

                            $like = '%' . $word . '%';

                            $q->where('title', 'like', $like)
                                ->orWhere('type', 'like', $like)
                                ->orWhereHas('category', function ($cat) use ($like) {
                                    $cat->where('name', 'like', $like)
                                        ->orWhere('fullname', 'like', $like);
                                });
                        }
                    });
                }
            })
            ->when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->orderByRaw("
                            (
                                link IS NULL
                                OR link = ''
                                OR link = '[]'
                                OR link = '[null]'
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
}
