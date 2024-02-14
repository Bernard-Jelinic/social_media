<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_global_scope_is_page_is_true()
    {
        // Create pages with is_page=true and is_page=false
        $validPage = User::factory()->create(['is_page' => true]);
        $invalidPage = User::factory()->create(['is_page' => false]);

        // Apply the scope
        $pages = Page::all();

        // Assert that only the valid page is included
        $this->assertCount(1, $pages);
        $this->assertTrue($pages->first()->is($validPage));
    }
}
