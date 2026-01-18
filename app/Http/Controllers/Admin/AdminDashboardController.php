<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Era;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Data;
use App\Models\Tag;
use App\Models\Video;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (!auth()->user() || !auth()->user()->can('admin:dashboard')) {
                return redirect('/');
            }

            return $next($request);
        })->only(['index']);
    }

    public function index()
    {
        $users = User::all()->count();
        $franchises = Franchise::all()->count();
        $eras = Era::all()->count();
        $categories = Category::all()->count();
        $datas = Data::all()->count();
        $tags = Tag::all()->count();
        $videos = Video::all()->count();
        $roles = Role::all()->count();

        return view('admin.dashboard', compact('users', 'franchises', 'eras', 'categories', 'datas', 'tags', 'videos', 'roles'));
    }
}
