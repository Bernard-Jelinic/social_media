<?php

namespace App\Livewire;

use Livewire\Component;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterPage extends Component
{   
    public $first_name = '';
    public $headline = '';
    public $country_id = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $countries = array();
    public $registerForm = false;

    public function mount(object $countries): void
    {
        $this->countries = $countries;
    }

    public function register(): void
    {
        $registerForm = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'headline' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $this->first_name,
            'is_business' => true,
            'headline' => $this->headline,
            'country_id' => isset($this->country_id) ? $this->country_id : null,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        redirect(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.register-page');
    }
}
