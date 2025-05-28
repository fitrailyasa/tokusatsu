<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $email, $no_hp, $password, $role, $status, $userId;
    public $isUpdate = false;

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function render(Request $request)
    {
        $roles = Role::all();

        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $users = User::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $users = User::withTrashed()->paginate($validPerPage);
        }

        return view('livewire.admin.user', compact('users', 'roles', 'search', 'perPage'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->no_hp = '';
        $this->password = '';
        $this->role = '';
        $this->status = '';
        $this->userId = '';
    }

    public function store()
    {
        $this->validate([
            'password' => 'required|min:8',
        ] + $this->rules());

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ]);

        $user->assignRole($this->role);

        session()->flash('message', 'User Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->no_hp = $user->no_hp;
        $this->password = '';
        $this->role = $user->getRoleNames()->first();
        $this->status = $user->status;
        $this->isUpdate = true;
    }

    public function update()
    {
        $this->validate([
            'password' => 'nullable|min:8',
        ] + $this->rules());

        $user = User::findOrFail($this->userId);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'no_hp' => $this->no_hp,
            'status' => $this->status,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        $user->syncRoles($this->role);

        session()->flash('message', 'User Updated Successfully.');

        $this->resetInputFields();
        $this->isUpdate = false;
    }


    public function delete($id)
    {
        User::findOrFail($id)->forceDelete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
