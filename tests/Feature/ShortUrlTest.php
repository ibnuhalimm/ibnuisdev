<?php

namespace Tests\Feature;

use App\Models\ShortUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShortUrlTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_redirect_to_origin_url()
    {
        $shortUrl = ShortUrl::factory()->create();

        $this->get(route('redirect-long-url', [ 'short_id' => $shortUrl->short_id ]))
            ->assertRedirect($shortUrl->origin);
    }

    /** @test */
    public function it_should_be_respond_not_found_if_short_id_is_not_found()
    {
        $this->get(route('redirect-long-url', [ 'short_id' => 'not-found' ]))
            ->assertNotFound();
    }
}
