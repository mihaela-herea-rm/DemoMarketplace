<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\County;
use Livewire\Component;

class Locationdropdown extends Component
{
    public $counties;
    public $cities = [];

    public $selectedCounty = 0;
    public $selectedCity = 0;

    public function render()
    {
        return view('livewire.locationdropdown');
    }

    public function mount()
    {
        $this->counties = County::all();
        if (!empty($this->selectedCounty)) {
            $this->cities = City::where('county_id', $this->selectedCounty)
                ->without('county')
                ->orderBy('name')
                ->get();
        }
    }

    public function updatedSelectedCounty($county)
    {
        if (!is_null($county)) {
            $this->cities = City::where('county_id', $county)
                ->without('county')
                ->orderBy('name')
                ->get();
            $this->selectedCity = $this->cities[0]->id;
        } else {
            $this->cities = [];
        }
    }

    public function updatedSelectedCity($city)
    {
        $this->selectedCity = $city;
        $this->selectedCounty = City::where('id', $city)->first()->county_id;
    }

}
