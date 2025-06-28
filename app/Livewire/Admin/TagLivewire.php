<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $tagId;
    public $isUpdate = false;

    public function render(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $tags = Tag::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $tags = Tag::withTrashed()->paginate($validPerPage);
        }

        return view('livewire.admin.tag', compact('tags', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->tagId = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($validatedData);

        session()->flash('success', 'Tag Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tagId = $id;
        $this->name = $tag->name;
        $this->isUpdate = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($this->tagId);
        $tag->update($validatedData);

        session()->flash('success', 'Tag Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }

    public function delete($id)
    {
        Tag::findOrFail($id)->forceDelete();
        session()->flash('success', 'Tag Deleted Successfully.');
    }
}
