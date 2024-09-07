<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Era;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EraLivewire extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id, $name, $desc, $img;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('era', 'name')->ignore($this->id),
            ],
            'desc' => 'nullable|max:1024',
            'img' => 'nullable|mimes:jpg,jpeg,png|max:2048',
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
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $eras = Era::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $eras = Era::withTrashed()->paginate($validPerPage);
        }

        return view('livewire.admin.era', compact('eras', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->id = '';
        $this->name = '';
        $this->desc = '';
        $this->img = '';
    }

    public function store()
    {
        $this->validate();

        $eraData = [
            'name' => $this->name,
            'desc' => $this->desc,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $eraData['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }

        Era::create($eraData);

        session()->flash('message', 'Era Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $era = Era::findOrFail($id);
        $this->id = $id;
        $this->name = $era->name;
        $this->desc = $era->desc;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $era = Era::findOrFail($this->id);
        $eraData = [
            'name' => $this->name,
            'desc' => $this->desc,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $eraData['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }
    
        $era->update($eraData);

        session()->flash('message', 'Era Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }

    public function delete($id)
    {
        Era::findOrFail($id)->forceDelete();
        session()->flash('message', 'Era Deleted Successfully.');
    }
}
