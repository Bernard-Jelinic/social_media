<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\RegisterUserForm;
use App\Livewire\Forms\RegisterBusinessForm;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RegisterUserPage extends Component
{
    public RegisterUserForm $registerUserForm;
    public RegisterBusinessForm $registerBusinessForm;
    public $countries = array();
    public $isRegisterUserForm = false;

    public function differentTab(): void
    {
        $this->isRegisterUserForm = !$this->isRegisterUserForm;
    }

    public function registerUser(): void
    {
        $user = $this->registerUserForm->store();

        Auth::login($user);

        redirect(RouteServiceProvider::HOME);
    }

    public function registerBusiness(): void
    {
        $user = $this->registerBusinessForm->store();

        Auth::login($user);

        redirect(RouteServiceProvider::HOME);
    }

    public function mount(object $countries): void
    {
        $this->countries = $countries;
    }

    public function render()
    {
        return view('livewire.register-user-page');
    }
}
