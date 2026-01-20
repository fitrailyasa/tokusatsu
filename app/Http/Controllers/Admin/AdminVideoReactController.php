<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoReact;
use App\Http\Requests\TableRequest;

class AdminVideoReactController extends Controller
{
    protected $title = "Video React";

    // Middleware for video-react permissions
    public function __construct()
    {
        $this->middleware('permission:view:video-react')->only(['index']);
        $this->middleware('permission:delete:video-react')->only(['destroy']);
        $this->middleware('permission:delete-all:video-react')->only(['destroyAll']);
    }

    // Display a listing of the resource
    public function index(TableRequest $request)
    {
        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);
        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $video_reacts = VideoReact::where('status', 'like', "%{$search}%")->paginate($validPerPage);
        } else {
            $video_reacts = VideoReact::paginate($validPerPage);
        }

        return view('admin.video-react.index', compact(
            'video_reacts',
            'search',
            'perPage'
        ));
    }

    // Handle hard delete data
    public function destroy($id)
    {
        VideoReact::findOrFail($id)->forceDelete();
        return back()->with('success', 'Successfully delete ' . $this->title . '!');
    }

    // Handle hard delete all data
    public function destroyAll()
    {
        VideoReact::truncate();
        return back()->with('success', 'Successfully delete all ' . $this->title . '!');
    }
}
