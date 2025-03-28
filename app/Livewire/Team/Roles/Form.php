<?php

namespace App\Livewire\Team\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    public $name;
    public $guard_name='web';
    public $isEdit = false;

    public $object;

    public $id;
    protected $rules = [
        'name' => 'required|string|max:255|unique:'.Role::class,
    ];


    public function mount($role = null)
    {
        if ($role) {
            $role = Role::findById($role);
            $this->object = $role;
            $this->name = $role->name;
            $this->isEdit = true;
            $this->id = $role->id;

        }
    }

    public function render()
    {
        return view('livewire.team.roles.form');
    }

    public function save()
    {
        if ($this->isEdit) {
            // Allow the current email for updates
            $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $this->id;

        } else {
            // Apply unique validation for new users
            $this->rules['name'] = 'required|string|max:255|unique:roles,name';
        }

        $this->validate();




        // When editing, we make sure to set the ID to the existing user's ID
        if ($this->isEdit) {
            $role = Role::findOrFail($this->id);  // Use findOrFail to get the user by ID


            $role->fill([
                'name' => $this->name,
                'guard_name' => $this->guard_name,
            ]);
            $role->save(); // Save the user to the database
        } else {
            $role = new Role();  // Use findOrFail to get the user by ID


            // When creating a new user, we create a new user and hash the password
            $role->name = $this->name;
            $role->guard_name = $this->guard_name;
            $role->save(); // Save the user to the database
        }


        $this->id = $role->id;


        // Reset the form if it's a new user
        if (!$this->isEdit) {
            $this->reset();
        }
        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));

        return redirect()->route('roles.edit', ['role' => $role->id]);
    }
}
