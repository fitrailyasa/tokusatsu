<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use App\Models\VideoReport;
use App\Http\Requests\TableRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminVideoReportController extends Controller
{
    protected $title = "Video Report";

    // Middleware for video-report permissions
    public function __construct()
    {
        $this->middleware('permission:view:video-report')->only(['index']);
        $this->middleware('permission:delete:video-report')->only(['destroy']);
        $this->middleware('permission:delete-all:video-report')->only(['destroyAll']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $video_reports = VideoReport::withTrashed()
                ->where('message', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $video_reports = VideoReport::withTrashed()
                ->paginate($validPerPage);
        }

        $totalProblematicVideos = VideoReport::withTrashed()
            ->distinct('video_id')
            ->count('video_id');

        $problematicVideoPerCategory = Video::whereHas('video_reports', function ($q) {
            $q->withTrashed();
        })
            ->select('category_id', DB::raw('COUNT(DISTINCT videos.id) as total'))
            ->groupBy('category_id')
            ->with('category')
            ->get();

        return view('admin.video-report.index', compact(
            'video_reports',
            'totalProblematicVideos',
            'problematicVideoPerCategory',
            'search',
            'perPage'
        ));
    }

    // Handle hard delete data
    public function destroy($id)
    {
        VideoReport::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully Delete ' . $this->title . '!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        VideoReport::truncate();
        return back()->with('success', 'Successfully Delete All ' . $this->title . '!');
    }
}
