<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FranchiseLivewire extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $id, $name, $description, $img;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('franchises', 'name')->ignore($this->id),
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
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $franchises = Franchise::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $franchises = Franchise::withTrashed()->paginate($validPerPage);
        }

        return view('livewire.admin.franchise', compact('franchises', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->id = '';
        $this->name = '';
        $this->description = '';
        $this->img = '';
    }

    public function store()
    {
        $this->validate();

        $franchiseData = [
            'name' => $this->name,
            'description' => $this->description,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $franchiseData['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }

        Franchise::create($franchiseData);

        session()->flash('success', 'Franchise Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        $this->id = $id;
        $this->name = $franchise->name;
        $this->description = $franchise->desc;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate();

        $franchise = Franchise::findOrFail($this->id);
        $franchiseData = [
            'name' => $this->name,
            'description' => $this->description,
        ];

        if ($this->img) {
            $img = $this->img;
            $file_name = $this->name . '.' . $img->getClientOriginalExtension();
            $franchiseData['img'] = $file_name;
            $img->storeAs('public', $file_name);
        }

        $franchise->update($franchiseData);

        session()->flash('success', 'Franchise Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }

    public function delete($id)
    {
        Franchise::findOrFail($id)->forceDelete();
        session()->flash('success', 'Franchise Deleted Successfully.');
    }
}
