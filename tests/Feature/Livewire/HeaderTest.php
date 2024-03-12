<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\Person;
use App\Livewire\Header;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HeaderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function header_livewire_component_exists_on_dashboard_page()
    {
        // // Create two users
        $person = Person::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($person);

        $this->get('/dashboard')
            ->assertSeeLivewire(Header::class);

    }
}
