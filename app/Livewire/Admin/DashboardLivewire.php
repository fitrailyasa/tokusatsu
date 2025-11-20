<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Era;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Data;
use App\Models\Tag;
use App\Models\Video;
use Spatie\Permission\Models\Role;

class DashboardLivewire extends Component
{
    public function render()
    {
        $users = User::all()->count();
        $franchises = Franchise::all()->count();
        $eras = Era::all()->count();
        $categories = Category::all()->count();
        $datas = Data::all()->count();
        $tags = Tag::all()->count();
        $videos = Video::all()->count();
        $roles = Role::all()->count();

        return view('livewire.admin.dashboard', compact('users', 'franchises', 'eras', 'categories', 'datas', 'tags', 'videos', 'roles'));
    }
}
