<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Era;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Data;
use App\Models\Tag;
use App\Models\Film;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard, which shows a count of all the available resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all()->count();
        $franchises = Franchise::all()->count();
        $eras = Era::all()->count();
        $categories = Category::all()->count();
        $datas = Data::all()->count();
        $tags = Tag::all()->count();
        $films = Film::all()->count();
        $roles = Role::all()->count();

        return view('admin.dashboard', compact('users', 'franchises', 'eras', 'categories', 'datas', 'tags', 'films', 'roles'));
    }
}
