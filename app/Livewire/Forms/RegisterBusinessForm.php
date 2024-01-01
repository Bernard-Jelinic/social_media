<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Rule;
use Illuminate\Validation\Rules;

class RegisterBusinessForm extends Form
{
    public ?User $user;

    public $first_name;
    public $is_business = true;
    public $headline;
    public $country_id;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'headline' => [
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ];
    }

    public function store()
    {
        $this->validate();
 
        $user = User::create($this->all());
 
        $this->reset();

        return $user;
    }
}
