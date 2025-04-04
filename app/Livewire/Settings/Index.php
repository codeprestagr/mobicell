<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $settings = [];


    public function mount()
{
    $this->loadSettings();
}


    public function loadSettings()
    {
        $this->settings = Setting::pluck('value', 'key')->toArray();

        // Αν δεν υπάρχουν ρυθμίσεις, ορίζουμε κάποιες βασικές
        if (empty($this->settings)) {
            $this->settings = [
                'site_name' => '',
                'site_description' => '',
                'site_logo' => '',
            ];
        }


        /**  if (!array_key_exists('new_key', $this->settings)) {
            Setting::create(['key' => 'new_key', 'value' => '']);
        }  **/
    }


    public function render()
    {
        return view('livewire.settings.index');
    }
    public function updateSetting($key, $value)
    {
        $this->settings[$key] = $value;
    }
    public function save()
    {
        foreach ($this->settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        session()->flash('success', __('Saved'));
        return redirect()->route('settings.index');
    }


}
