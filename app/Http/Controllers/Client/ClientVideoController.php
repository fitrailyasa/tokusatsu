<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Video;
use App\Models\VideoReport;
use App\Http\Requests\VideoReportRequest;
use Illuminate\Support\Facades\Storage;

class ClientVideoController extends Controller
{
    public function index()
    {
        $franchises = Franchise::withoutTrashed()->where('status', 1)->paginate(15);
        return view('client.video.index', compact('franchises'));
    }

    public function category(TableRequest $request, string $category)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $eraId = $request->input('era_id');
        $franchiseId = $request->input('franchise_id');
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $franchise = Franchise::where('slug', $category)->withoutTrashed()->where('status', 1)->firstOrFail();
        $categories = Category::where('franchise_id', $franchise->id)
            ->withoutTrashed()
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->whereHas('era', function ($q) {
                $q->where('status', 1);
            })
            ->paginate(10);

        $title = $franchise->name;

        return view('client.video.category', compact(['title', 'franchise', 'categories', 'search', 'perPage', 'eraId', 'franchiseId']));
    }

    /**
     * Display a list of videos for a category.
     *
     * @param string $franchise The slug of the franchise.
     * @param string $category The slug of the category.
     * @return \Illuminate\Http\Response
     */
    public function show($franchise, $category)
    {
        $category = Category::where('slug', $category)
            ->with('franchise')
            ->where('status', 1)
            ->whereHas('franchise', function ($q) {
                $q->where('status', 1);
            })
            ->whereHas('era', function ($q) {
                $q->where('status', 1);
            })
            ->firstOrFail();

        if ($category->franchise->slug !== $franchise) {
            abort(404);
        }

        $hasEpisode = $category->videos()
            // ->where('type', 'episode')
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]')
            ->exists();

        $videosQuery = $category->videos()
            ->with('category')
            ->latest('type')
            ->latest('number')
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]');

        // if ($hasEpisode) {
        //     $videosQuery->where('type', 'episode');
        // } else {
        //     $videosQuery->where('type', '!=', 'episode');
        // }

        $videos = $videosQuery->paginate(100);
        $type = $hasEpisode ? 'episode' : 'video';

        $title = $category->fullname;

        return view('client.video.show', [
            'title' => $title,
            'category' => $category,
            'franchise' => $category->franchise,
            'videos' => $videos,
            'type' => $type,
        ]);
    }

    public function movie(TableRequest $request, string $franchise)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $eraId = $request->input('era_id');
        $franchiseId = $request->input('franchise_id');
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $franchise = Franchise::where('slug', $franchise)->withoutTrashed()->where('status', 1)->firstOrFail();

        $videos = Video::whereHas('category', function ($q) use ($franchise) {
            $q->where('franchise_id', $franchise->id);
        })
            ->where('type', '!=', 'episode')
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]')
            ->orderBy('airdate', 'desc')
            ->paginate($validPerPage);

        return view('client.video.movie', compact('search', 'perPage', 'eraId', 'franchiseId', 'videos'));
    }

    /**
     * Display a video for a category.
     *
     * @param string $franchise The slug of the franchise.
     * @param string $category The slug of the category.
     * @param string $type The type of the video.
     * @param int $number The number of the video.
     * @return \Illuminate\Http\Response
     */
    public function watch($franchise, $category, $type, $number)
    {
        $category = Category::where('slug', $category)
            ->with('franchise')
            ->where('status', 1)
            ->whereHas('franchise', fn($q) => $q->where('status', 1))
            ->whereHas('era', fn($q) => $q->where('status', 1))
            ->firstOrFail();

        if ($category->franchise->slug !== $franchise) {
            abort(404);
        }

        $video = Video::where([
            ['category_id', '=', $category->id],
            ['type', '=', $type],
            ['number', '=', $number],
            ['status', '=', 1],
        ])->firstOrFail();

        $embedUrls = collect($video->getValidEmbedLinks());

        $title = $video->type === 'episode'
            ? "{$category->fullname} Episode {$video->number}"
            : $video->title;

        $downloadTokens = [];

        foreach ($embedUrls as $link) {
            if (preg_match('/\/d\/([a-zA-Z0-9_-]+)/', $link, $matches)) {
                $downloadTokens[] = encrypt($matches[1]);
            } else {
                $downloadTokens[] = null;
            }
        }

        $episodes = Video::where('category_id', $category->id)
            ->where('type', $video->type)
            ->orderBy('number')
            ->get();

        return view('client.video.watch', [
            'title'      => $title,
            'category'   => $category,
            'franchise'  => $category->franchise,
            'video'      => $video,
            'episodes'   => $episodes,
            'embedUrls'  => $embedUrls,
            'downloadTokens' => $downloadTokens,
        ]);
    }

    public function report(VideoReportRequest $request)
    {
        $data = $request->validated();

        $data['status'] = 0;

        VideoReport::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Report submitted successfully.'
        ]);
    }
}
