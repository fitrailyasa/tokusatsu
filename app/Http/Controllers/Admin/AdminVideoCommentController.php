<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoComment;
use App\Http\Requests\TableRequest;

class AdminVideoCommentController extends Controller
{
    protected $title = "Video comment";

    // Middleware for video-comment permissions
    public function __construct()
    {
        $this->middleware('permission:view:video-comment')->only(['index']);
        $this->middleware('permission:delete:video-comment')->only(['destroy']);
        $this->middleware('permission:delete-all:video-comment')->only(['destroyAll']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $video_comments = VideoComment::where('message', 'like', "%{$search}%")->paginate($validPerPage);
        } else {
            $video_comments = VideoComment::paginate($validPerPage);
        }

        return view('admin.video-comment.index', compact(
            'video_comments',
            'search',
            'perPage'
        ));
    }

    // Handle hard delete data
    public function destroy($id)
    {
        VideoComment::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully delete ' . $this->title . '!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        VideoComment::truncate();
        return back()->with('success', 'Successfully delete all ' . $this->title . '!');
    }
}
