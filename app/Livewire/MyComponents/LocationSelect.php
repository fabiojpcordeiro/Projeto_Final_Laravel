<?php

namespace App\Livewire\MyComponents;

use Livewire\Component;
use App\Models\State;
use App\Models\City;

class LocationSelect extends Component
{
    public $states;
    public $selectedState = null;

    public $cityInput = '';
    public $citySuggestions = [];
    public $selectedCity = null;

    public $stateFieldName = 'state';
    public $cityFieldName = 'city';

    public function mount($selectedState = null, $selectedCity = null )
    {
        $this->states = State::orderBy('name')->get();
        if($selectedState){
            $state = State::find($selectedState);
            if($state){
                $this->selectedState = $state->id;
            }
        }
        if($selectedCity){
            $city = City::find($selectedCity);
                if($city){
                    $this->selectedCity = $city->id;
                    $this->cityInput = $city->name;
                }
            }
        }

    public function updatedSelectedState()
    {
        $this->cityInput = '';
        $this->citySuggestions = [];
        $this->selectedCity = null;
    }
    public function updatedCityInput()
    {
        if ($this->cityInput && $this->selectedState) {
            $this->citySuggestions = City::where('state_id', $this->selectedState)
                ->where('name', 'like', '%' . $this->cityInput . '%')
                ->orderBy('name')
                ->take(10)
                ->get();
        } else {
            $this->citySuggestions = null;
        }
        $this->selectedCity = null;
    }

    public function selectCity($cityId)
    {
        $this->selectedCity = $cityId;
        $city = City::find($cityId);
        $this->cityInput = $city->name;
        $this->citySuggestions = [];
    }

    public function render()
    {
        return view('livewire.location-select');
    }
}
