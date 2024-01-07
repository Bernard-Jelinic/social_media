<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use App\Livewire\TopPages;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopPagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function top_pages_component_exists_on_dashboard_page()
    {
        // // Create two user
        $user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);
        
        $this->get('/dashboard')
            ->assertSeeLivewire(TopPages::class);
    }
}
