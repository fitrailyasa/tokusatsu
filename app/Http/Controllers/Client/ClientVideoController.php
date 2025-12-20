<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Category;
use App\Models\Video;
use App\Models\Franchise;

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

        return view('client.video.category', compact('franchise', 'categories', 'search', 'perPage', 'eraId', 'franchiseId'));
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

        $videos = $category->videos()->with('category')->latest('number')->paginate(100);

        return view('client.video.show', [
            'category' => $category,
            'franchise' => $category->franchise,
            'videos' => $videos,
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

        $video = Video::where([
            ['category_id', '=', $category->id],
            ['type', '=', $type],
            ['number', '=', $number],
        ])->firstOrFail();

        $embedUrl = $this->videoEmbed($video->link);

        $prev = Video::where([
            'category_id' => $category->id,
            'type' => $type,
            'number' => $number - 1,
        ])->first();

        $next = Video::where([
            'category_id' => $category->id,
            'type' => $type,
            'number' => $number + 1,
        ])->first();

        return view('client.video.watch', [
            'category' => $category,
            'franchise' => $category->franchise,
            'video' => $video,
            'embedUrl' => $embedUrl,
            'prev' => $prev,
            'next' => $next,
        ]);
    }

    /**
     * Convert video link into embeddable URL.
     */
    protected function videoEmbed($url)
    {
        // Google Drive
        if (strpos($url, 'drive.google.com') !== false) {
            if (preg_match('/\/d\/(.*?)\//', $url, $matches)) {
                return "https://drive.google.com/file/d/" . $matches[1] . "/preview";
            }
        }

        // YouTube
        if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
            preg_match('/(youtu\.be\/|v=)([^&]+)/', $url, $matches);
            if (isset($matches[2])) {
                return "https://www.youtube.com/embed/" . $matches[2];
            }
        }

        // Dropbox
        if (strpos($url, 'dropbox.com') !== false) {
            return str_replace('?dl=0', '?raw=1', $url);
        }

        // OneDrive
        if (strpos($url, 'onedrive.live.com') !== false) {
            return $url;
        }

        // Archive.org
        if (strpos($url, 'archive.org') !== false) {

            // Jika format /details/xxxx/file.mp4
            if (preg_match('#archive\.org/details/([^/]+)/(.+)$#', $url, $m)) {
                return "https://archive.org/embed/{$m[1]}/{$m[2]}";
            }

            // Jika format /download/xxxx/file.mp4
            if (preg_match('#archive\.org/download/([^/]+)/(.+)$#', $url, $m)) {
                return "https://archive.org/embed/{$m[1]}/{$m[2]}";
            }

            // fallback default
            return str_replace('/details/', '/embed/', $url);
        }

        // Direct storage / CDN / S3 / Laravel public storage
        if (preg_match('/\.(mp4|webm|ogg)$/i', $url)) {
            return $url;
        }

        return $url;
    }
}
