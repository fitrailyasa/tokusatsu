<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Era;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Data;

class DashboardLivewire extends Component
{
    public function render()
    {
        $users = User::all()->count();
        $franchises = Franchise::all()->count();
        $eras = Era::all()->count();
        $categories = Category::all()->count();
        $datas = Data::all()->count();
        return view('livewire.admin.dashboard', compact('users', 'franchises', 'eras', 'categories', 'datas'));
    }
}
