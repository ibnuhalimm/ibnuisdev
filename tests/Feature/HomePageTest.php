<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * Status code of home page should 200
     *
     * @return void
     */
    public function test_visitor_can_view_landing_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                ->assertViewIs('index');
    }
}
