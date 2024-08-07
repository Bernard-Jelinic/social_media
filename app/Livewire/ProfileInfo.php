<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class ProfileInfo extends Component
{
    public $user;

    public $first_name;
    public $last_name;
    public $headline;

    public $about;

    public $country_id;
    public $city_id;

    public $countries;
    public $cities;
    public $selectedCountry;
    public $selectedCity;

    public $is_profile_of_logged_in_user;

    public function savePersonalInformation()
    {
        $this->user->first_name = $this->first_name;
        $this->user->last_name = $this->last_name;
        $this->user->headline = $this->headline;

        $this->user->save();
    }

    public function saveAbout()
    {
        $this->user->about = $this->about;

        $this->user->save();
    }

    public function saveLocation()
    {
        $this->user->country_id = $this->selectedCountry;
        $this->user->city_id = $this->selectedCity;

        $this->user->save();
    }

    public function mount(object $user, bool $is_profile_of_logged_in_user): void
    {
        $this->refreshComponent($user);
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
    }

    public function refreshComponent($user): void
    {
        $this->user = $user;
        $this->selectedCountry = $this->user->country_id;
        $this->selectedCity = $this->user->city_id;
        $this->countries = Country::all();
        $this->cities = City::where('country_id', Country::find($this->user->country_id)->id)->get();

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->headline = $user->headline;

        $this->about = $user->about;

        $this->country_id = $this->user->country_id;
        $this->city_id = $this->user->city_id;
    }

    public function updatedSelectedCountry()
    {
        $this->cities = City::where('country_id', $this->selectedCountry)->get();
    }

    public function render()
    {
        return view('livewire.profile-info');
    }
}
