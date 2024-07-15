<?php

namespace App\Livewire;

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
    public $selectedCountry;

    public $is_profile_of_logged_in_user;

    public function saveAbout()
    {
        $this->user->about = $this->about;

        $this->user->save();
    }

    public function savePersonalInformation()
    {
        $this->user->first_name = $this->first_name;
        $this->user->last_name = $this->last_name;
        $this->user->headline = $this->headline;

        $this->user->save();
    }

    public function saveLocation()
    {
        $this->user->country_id = $this->country_id;
        $this->user->city_id = $this->city_id;

        $this->user->save();
    }

    public function mount(object $user, bool $is_profile_of_logged_in_user): void
    {
        $this->get($user);
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
    }

    public function get($user): void
    {
        $this->user = $user;
        $this->countries = Country::all();
        $this->selectedCountry = Country::find($this->user->country_id);

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->headline = $user->headline;

        $this->about = $user->about;

        $this->country_id = $this->user->country_id;
        $this->city_id = $this->user->city_id;
    }

    public function render()
    {
        return view('livewire.profile-info');
    }
}
