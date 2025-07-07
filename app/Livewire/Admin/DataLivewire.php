<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class DataLivewire extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $id, $name, $img, $category_id, $tag_id;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'category_id' => 'required',
            'tag_id' => 'nullable',
        ];
    }

    public function save()
    {
        $this->img->store(path: 'img');
    }

    public function render(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        $tags = Tag::all();
        $categories = Category::all();
        $groupedCategories = $categories->groupBy('franchise.name');

        $datas = Data::withTrashed()
            ->with(['category', 'category.era', 'category.franchise'])
            ->when($search, function ($query, $search) {
                $searchTerms = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchTerms as $term) {
                    $query->where(function ($q) use ($term) {
                        $q->where('name', 'like', "%{$term}%")
                            ->orWhere('img', 'like', "%{$term}%")
                            ->orWhereHas('category', function ($q) use ($term) {
                                $q->where('name', 'like', "%{$term}%")
                                    ->orWhereHas('era', fn($q) => $q->where('name', 'like', "%{$term}%"))
                                    ->orWhereHas('franchise', fn($q) => $q->where('name', 'like', "%{$term}%"));
                            });
                    });
                }
            })
            ->when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->orderBy('id', 'desc')
            ->paginate($validPerPage);

        return view('livewire.admin.data', compact('datas', 'groupedCategories', 'categories', 'tags', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->id = '';
        $this->name = '';
        $this->img = '';
        $this->category_id = '';
    }

    public function store()
    {
        $this->validate();

        $datas = [
            'name' => $this->name,
            'category_id' => $this->category_id,
            'tag_id' => $this->tag_id,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $datas['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }

        Data::create($datas);

        session()->flash('success', 'Data Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $data = Data::findOrFail($id);
        $this->id = $id;
        $this->img = $data->img;
        $this->name = $data->name;
        $this->category_id = $data->category_id;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $data = Data::findOrFail($this->id);
        $datas = [
            'name' => $this->name,
            'category_id' => $this->category_id,
            'tag_id' => $this->tag_id,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $datas['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }

        $data->update($datas);

        session()->flash('success', 'Data Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }

    public function delete($id)
    {
        Data::findOrFail($id)->forceDelete();
        session()->flash('success', 'Data Deleted Successfully.');
    }
}
