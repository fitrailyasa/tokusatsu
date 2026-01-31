<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Http\Requests\VideoReportRequest;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Video;
use App\Models\VideoComment;
use App\Models\VideoReact;
use App\Models\VideoReport;
use App\Models\VideoView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadeRequest;

class ClientVideoController extends Controller
{
    public function indexSeries()
    {
        $franchises = Franchise::withoutTrashed()->where('status', 1)->paginate(15);
        return view('client.video.series.index', compact('franchises'));
    }

    public function indexMovie()
    {
        $franchises = Franchise::withoutTrashed()->where('status', 1)->paginate(15);
        return view('client.video.movie.index', compact('franchises'));
    }

    public function franchiseSeries(TableRequest $request, string $franchise)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $eraId = $request->input('era_id');
        $franchiseId = $request->input('franchise_id');
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $franchise = Franchise::where('slug', $franchise)->withoutTrashed()->where('status', 1)->firstOrFail();
        $categories = Category::where('franchise_id', $franchise->id)
            ->withoutTrashed()
            ->orderBy('id', 'desc')
            ->where('status', 1)
            ->whereHas('era', function ($q) {
                $q->where('status', 1);
            })
            ->whereHas('videos', function ($q) {
                $q->where('status', 1)
                    ->where('type', 'episode')
                    ->whereNotNull('link')
                    ->where('link', '!=', '[]');
            })
            ->paginate(10);

        $title = $franchise->name . ' Series';

        return view('client.video.series.franchise', compact(['title', 'franchise', 'categories', 'search', 'perPage', 'eraId', 'franchiseId']));
    }

    public function franchiseMovie(TableRequest $request, string $franchise)
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

        $title = $franchise->name . ' Movie';

        return view('client.video.movie.franchise', compact('title', 'franchise', 'search', 'perPage', 'eraId', 'franchiseId', 'videos'));
    }

    /**
     * Display a list of videos for a category.
     *
     * @param string $franchise The slug of the franchise.
     * @param string $category The slug of the category.
     * @return \Illuminate\Http\Response
     */
    public function categorySeries(TableRequest $request, $franchise, $category)
    {
        $perPage = (int) $request->input('perPage', 100);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 100;

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
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]')
            ->exists();

        $videosQuery = $category->videos()
            ->with('category')
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]');

        if (empty($category->last_aired)) {
            $videosQuery->orderByDesc('airdate');
        } else {
            $videosQuery->latest('type')->orderByDesc('last_aired');
        }

        if ($hasEpisode) {
            $videosQuery->where('type', 'episode');
        } else {
            $videosQuery->where('type', '!=', 'episode');
        }

        $videos = $videosQuery->paginate($validPerPage);
        $type = $hasEpisode ? 'episode' : 'video';

        $title = $category->fullname;

        return view('client.video.series.category', [
            'perPage'    => $perPage,
            'title' => $title,
            'category' => $category,
            'franchise' => $category->franchise,
            'videos' => $videos,
            'type' => $type,
        ]);
    }

    public function categoryMovie(TableRequest $request, $franchise, $category)
    {
        $perPage = (int) $request->input('perPage', 100);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 100;

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
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]')
            ->exists();

        $videosQuery = $category->videos()
            ->with('category')
            ->latest('type')
            ->where('status', 1)
            ->whereNotNull('link')
            ->where('link', '!=', '[]');

        if (empty($category->last_aired)) {
            $videosQuery->orderByDesc('number');
        } else {
            $videosQuery->orderByDesc('last_aired');
        }

        $videosQuery->where('type', '!=', 'episode');

        $videos = $videosQuery->paginate($validPerPage);
        $type = $hasEpisode ? 'episode' : 'video';

        $title = $category->fullname;

        return view('client.video.movie.category', [
            'perPage'    => $perPage,
            'title' => $title,
            'category' => $category,
            'franchise' => $category->franchise,
            'videos' => $videos,
            'type' => $type,
        ]);
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

        $video = Video::withCount('video_views')
            ->where([
                ['category_id', '=', $category->id],
                ['type', '=', $type],
                ['number', '=', $number],
                ['status', '=', 1],
            ])->firstOrFail();

        $this->view($video);

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

        $userReaction = null;
        if (Auth::check()) {
            $userReact = VideoReact::where('video_id', $video->id)
                ->where('user_id', Auth::id())
                ->first();
            if ($userReact) {
                $userReaction = $userReact->status;
            }
        }

        return view('client.video.watch', [
            'title'          => $title,
            'category'       => $category,
            'franchise'      => $category->franchise,
            'video'          => $video,
            'episodes'       => $episodes,
            'embedUrls'      => $embedUrls,
            'downloadTokens' => $downloadTokens,
            'userReaction'   => $userReaction,
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

    public function react(Request $request, Video $video)
    {
        $request->validate([
            'status' => 'required|in:like,dislike',
        ]);

        $user = $request->user();

        $react = VideoReact::firstOrNew([
            'video_id' => $video->id,
            'user_id' => $user->id,
        ]);

        $react->status = $request->status;
        $react->save();

        $likes = VideoReact::where('video_id', $video->id)->where('status', 'like')->count();
        $dislikes = VideoReact::where('video_id', $video->id)->where('status', 'dislike')->count();

        return response()->json([
            'likes' => $likes,
            'dislikes' => $dislikes,
            'user_reaction' => $react->status,
        ]);
    }

    public function comment(Request $request, Video $video)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $comment = VideoComment::create([
            'video_id' => $video->id,
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        $comment->load('user');

        return response()->json([
            'id' => $comment->id,
            'message' => $comment->message,
            'user' => [
                'name' => $comment->user->name,
                'img' => $comment->user->img,
            ],
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }

    public function deleteComment(VideoComment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'id' => $comment->id
        ]);
    }

    private function view(Video $video)
    {
        $ip = FacadeRequest::ip();
        $agent = FacadeRequest::header('User-Agent');

        $exists = VideoView::where('video_id', $video->id)
            ->where('ip_address', $ip)
            ->where('user_agent', $agent)
            ->where('created_at', '>=', now()->subHour(1))
            ->exists();

        if (!$exists) {
            VideoView::create([
                'video_id' => $video->id,
                'ip_address' => $ip,
                'user_agent' => $agent,
            ]);
        }
    }
}
