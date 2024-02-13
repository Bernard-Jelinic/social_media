<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Country;
use Database\Seeders\UserSeeder;
use Database\Seeders\CountrySeeder;
use App\Livewire\RegisterUserPage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_user_business_component_exists_on_register_page()
    {
        $this->get('/register')
            ->assertSeeLivewire(RegisterUserPage::class);
    }

    /** @test */
    public function new_user_can_be_registered()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $users = $this->assertEquals(0, User::count());
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerUserForm.first_name', 'Bernard')
            ->set('registerUserForm.last_name', 'Jelinić')
            ->set('registerUserForm.headline', 'Ja sam glavni developer')
            ->set('registerUserForm.country_id', '1')
            ->set('registerUserForm.email', 'jelinic.bernard@gmail.com')
            ->set('registerUserForm.password', '123456789')
            ->set('registerUserForm.password_confirmation', '123456789')
            ->call('registerUser');
    
        $this->assertEquals(1, User::count());
    }

    /** @test */
    public function is_all_necessary_parameters_required_when_registering_user()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->call('registerUser')
            ->assertHasErrors(
                'registerUserForm.first_name',
                'registerUserForm.last_name',
                'registerUserForm.headline',
                'registerUserForm.email',
                'registerUserForm.password',
                'registerUserForm.password_confirmation'
            );
    }

    /** @test */
    public function does_email_must_be_unique_when_registering_user()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $user = User::create([
            'first_name' => 'Bernard',
            'last_name' => 'Jelinić',
            'country_id' => Country::where('name', 'Croatia')->first()->id,
            'headline' => 'Software Developer',
            'email' => 'jelinic.bernard@gmail.com',
            'password' => '123456789'
        ]);
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerUserForm.first_name', 'Bernard_1')
            ->set('registerUserForm.last_name', 'Jelinić_1')
            ->set('registerUserForm.headline', 'Ja sam glavni developer')
            ->set('registerUserForm.country_id', '1')
            ->set('registerUserForm.email', 'jelinic.bernard@gmail.com')
            ->set('registerUserForm.password', '123456789_1')
            ->set('registerUserForm.password_confirmation', '123456789_1')
            ->call('registerUser')
            ->assertHasErrors(
                ['registerUserForm.email' => ['The email has already been taken.']]
            );
    }

    /** @test */
    public function does_password_must_be_confirmed_when_registering_user()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $user = User::create([
            'first_name' => 'Bernard',
            'last_name' => 'Jelinić',
            'country_id' => Country::where('name', 'Croatia')->first()->id,
            'headline' => 'Software Developer',
            'email' => 'jelinic.bernard@gmail.com',
            'password' => '123456789'
        ]);
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerUserForm.first_name', 'Bernard_1')
            ->set('registerUserForm.last_name', 'Jelinić_1')
            ->set('registerUserForm.headline', 'Ja sam glavni developer')
            ->set('registerUserForm.country_id', '1')
            ->set('registerUserForm.email', 'jelinic.bernard_1@gmail.com')
            ->set('registerUserForm.password', '123456789_1')
            ->set('registerUserForm.password_confirmation', '123456789')
            ->call('registerUser')
            ->assertHasErrors(
                ['registerUserForm.password' => ['The password field confirmation does not match.']]
            );
    }

    /** @test */
    public function redirected_to_dashboard_page_after_registering_a_user()
    {

        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $users = $this->assertEquals(0, User::count());
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerUserForm.first_name', 'Bernard')
            ->set('registerUserForm.last_name', 'Jelinić')
            ->set('registerUserForm.headline', 'Ja sam glavni developer')
            ->set('registerUserForm.country_id', '1')
            ->set('registerUserForm.email', 'jelinic.bernard@gmail.com')
            ->set('registerUserForm.password', '123456789')
            ->set('registerUserForm.password_confirmation', '123456789')
            ->call('registerUser')
            ->assertRedirect('/dashboard');
    
        $this->assertEquals(1, User::count());
    }

    /** @test */
    public function new_business_can_be_registered()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $users = $this->assertEquals(0, User::count());
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerBusinessForm.first_name', 'Google LLC')
            ->set('registerBusinessForm.headline', 'Our mission is to organize the world’s information and make it universally accessible and useful.')
            ->set('registerBusinessForm.country_id', '1')
            ->set('registerBusinessForm.email', 'google@gmail.com')
            ->set('registerBusinessForm.password', '123456789')
            ->set('registerBusinessForm.password_confirmation', '123456789')
            ->call('registerBusiness');
    
        $this->assertEquals(1, User::count());
    }

    /** @test */
    public function is_all_necessary_parameters_required_when_registering_business()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->call('registerBusiness')
            ->assertHasErrors(
                'registerBusinessForm.first_name',
                'registerBusinessForm.headline',
                'registerBusinessForm.email',
                'registerBusinessForm.password',
                'registerBusinessForm.password_confirmation'
            );
    }

        /** @test */
        public function does_email_must_be_unique_when_registering_business()
        {
            $this->seed(CountrySeeder::class);
            $countries = Country::all();
    
            $user = User::create([
                'first_name' => 'Google LLC',
                'headline' => 'Our mission is to organize the world’s information and make it universally accessible and useful.',
                'email' => 'google@gmail.com',
                'password' => '123456789'
            ]);
        
            Livewire::test(RegisterUserPage::class, ['countries' => $countries])
                ->set('registerBusinessForm.first_name', 'Google LLC_1')
                ->set('registerBusinessForm.headline', 'Our mission is to organize the world’s information and make it universally accessible and useful._1')
                ->set('registerBusinessForm.email', 'google@gmail.com')
                ->set('registerBusinessForm.password', '123456789_1')
                ->set('registerBusinessForm.password_confirmation', '123456789_1')
                ->call('registerBusiness')
                ->assertHasErrors(
                    ['registerBusinessForm.email' => ['The email has already been taken.']]
                );
        }
    
    /** @test */
    public function does_password_must_be_confirmed_when_registering_business()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $user = User::create([
            'first_name' => 'Google LLC',
            'headline' => 'Our mission is to organize the world’s information and make it universally accessible and useful.',
            'email' => 'google@gmail.com',
            'password' => '123456789'
        ]);
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerBusinessForm.first_name', 'Google LLC_1')
            ->set('registerBusinessForm.headline', 'Our mission is to organize the world’s information and make it universally accessible and useful._1')
            ->set('registerBusinessForm.email', 'google_1@gmail.com')
            ->set('registerBusinessForm.password', '123456789_1')
            ->set('registerBusinessForm.password_confirmation', '123456789')
            ->call('registerBusiness')
            ->assertHasErrors(
                ['registerBusinessForm.password' => ['The password field confirmation does not match.']]
            );
    }

    /** @test */
    public function redirected_to_dashboard_page_after_registering_a_business()
    {
        $this->seed(CountrySeeder::class);
        $countries = Country::all();

        $users = $this->assertEquals(0, User::count());
    
        Livewire::test(RegisterUserPage::class, ['countries' => $countries])
            ->set('registerBusinessForm.first_name', 'Google LLC')
            ->set('registerBusinessForm.headline', 'Our mission is to organize the world’s information and make it universally accessible and useful.')
            ->set('registerBusinessForm.country_id', '1')
            ->set('registerBusinessForm.email', 'google@gmail.com')
            ->set('registerBusinessForm.password', '123456789')
            ->set('registerBusinessForm.password_confirmation', '123456789')
            ->call('registerBusiness')
            ->assertRedirect('/dashboard');
    
        $this->assertEquals(1, User::count());
    }
}
