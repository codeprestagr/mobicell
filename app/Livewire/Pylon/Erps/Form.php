<?php

namespace App\Livewire\Pylon\Erps;

use Livewire\Component;

class Form extends Component
{

    public $id;
    public $name;
    public $api_key;
    public $database;
    public $username;
    public $password;
    public $url;
    public $is_main;
    public $isEdit = false;
    protected $rules = [
        'name' => 'required|string|max:255',
        'api_key' => 'required|string|max:255|unique:'.Erp::class,
        'database' => 'required|string|max:255|unique:'.Erp::class,
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'url' => 'required|url|unique:'.Erp::class,
        'is_main' => 'nullable|boolean',
    ];

    public function mount($erp = null)
    {
        if ($erp) {
            $erp = Erp::findOrFail($erp);
            $this->id = $erp->id;
            $this->name = $erp->name;
            $this->api_key = $erp->api_key;
            $this->database = $erp->database;
            $this->username = $erp->username;
            $this->password = $erp->password;
            $this->url = $erp->url;
            $this->is_main = $erp->is_main;
            $this->isEdit   = true;

        }
    }

    public function save()
    {

        if ($this->isEdit) {


            // Allow the current email for updates
            $this->rules['api_key'] = 'required|string|max:255|unique:erps,api_key,' . $this->id;
            $this->rules['database'] = 'required|string|max:255|unique:erps,database,' . $this->id;
//            $this->rules['username'] = 'required|string|max:255|unique:erps,username,' . $this->id;
            $this->rules['url'] = 'required|url|unique:erps,url,' . $this->id;

        }


        $this->validate();


        if ($this->is_main) {
            Erp::where('is_main', true)->update(['is_main' => false]);
        }

        $erp =  Erp::updateOrCreate(
            ['id' => $this->id],
            [
                'name'     => $this->name,
                'api_key'  => $this->api_key,
                'database' => $this->database,
                'username' => $this->username,
                'password' => $this->password,
                'url'      => $this->url,
                'is_main'  => $this->is_main,
            ]
        );

        $this->id = $erp->id;
        if (!$this->isEdit) {
            $this->reset();
            $this->isEdit = true;
        }

        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));

        return redirect()->route('admin.erps.edit', ['erp' => $erp->id]);

    }
    public function render()
    {
        return view('livewire.pylon.erps.form');
    }
}
