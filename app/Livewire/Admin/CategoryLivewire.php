<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Franchise;
use App\Models\Era;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Validation\Rule;

class CategoryLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $desc, $img, $categoryId, $era_id, $franchise_id;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'era_id' => 'required',
            'franchise_id' => 'required',
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories', 'name')->ignore($this->id),
            ],
            'desc' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function render(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $eras = Era::all();
        $franchises = Franchise::all();

        if ($search) {
            $categories = Category::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $categories = Category::withTrashed()->paginate($validPerPage);
        }

        return view('livewire.admin.category', compact('categories', 'eras', 'franchises', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->desc = '';
        $this->img = '';
        $this->categoryId = '';
        $this->era_id = '';
        $this->franchise_id = '';
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'era_id' => $this->era_id,
            'franchise_id' => $this->franchise_id,
            'name' => $this->name,
            'desc' => $this->desc,
        ]);

        session()->flash('success', 'Category Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->name = $category->name;
        $this->desc = $category->desc;
        $this->img = $category->img;
        $this->era_id = $category->era_id;
        $this->franchise_id = $category->franchise_id;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'era_id' => $this->era_id,
            'franchise_id' => $this->franchise_id,
            'name' => $this->name,
            'desc' => $this->desc,
        ]);

        session()->flash('success', 'Category Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }

    public function delete($id)
    {
        Category::findOrFail($id)->forceDelete();
        session()->flash('success', 'Category Deleted Successfully.');
    }
}
