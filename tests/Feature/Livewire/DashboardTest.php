<?php

namespace Tests\Feature\Livewire;

use Tests\TestCase;
use App\Models\User;
use App\Livewire\TopPages;
use App\Livewire\PagesMostViewThisWeek;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function top_pages_component_exists_on_dashboard_page()
    {
        // // Create one user
        $user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);
        
        $this->get('/dashboard')
            ->assertSeeLivewire(TopPages::class);
    }

    /** @test */
    public function most_view_this_week_component_exists_on_dashboard_page()
    {
        // // Create one user
        $user = User::factory()->create();

        // // Acting as the authenticated user
        $this->actingAs($user);
        
        $this->get('/dashboard')
            ->assertSeeLivewire(PagesMostViewThisWeek::class);
    }
}
