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

    public $fullname, $name, $description, $img, $categoryId, $era_id, $franchise_id;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'era_id' => 'required',
            'franchise_id' => 'required',
            'fullname' => [
                'required',
                'max:100',
                Rule::unique('categories', 'fullname')->ignore($this->id),
            ],
            'name' => [
                'required',
                'max:100',
                Rule::unique('categories', 'name')->ignore($this->id),
            ],
            'description' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function render(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
            'era_id' => 'nullable|exists:eras,id',
            'franchise_id' => 'nullable|exists:franchises,id',
        ]);

        $search = $request->input('search');
        $eraId = $request->input('era_id');
        $franchiseId = $request->input('franchise_id');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $eras = Era::all();
        $franchises = Franchise::all();

        $categories = Category::withTrashed()
            ->with(['era', 'franchise'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('era', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('franchise', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($eraId, function ($query, $eraId) {
                $query->where('era_id', $eraId);
            })
            ->when($franchiseId, function ($query, $franchiseId) {
                $query->where('franchise_id', $franchiseId);
            })
            ->paginate($validPerPage);

        return view('livewire.admin.category', compact('categories', 'eras', 'franchises', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
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
            'description' => $this->description,
        ]);

        session()->flash('success', 'Category Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->name = $category->name;
        $this->description = $category->description;
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
            'description' => $this->description,
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
