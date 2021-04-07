<?php

namespace Tests\Unit\Dashboard;

use App\Http\Livewire\Dashboard\Blog\MostVisitedPages;
use Livewire\Livewire;
use Tests\TestCase;

class MostVisitedPagesTest extends TestCase
{
    /**
     * Can set initial days
     *
     * @return void
     */
    public function test_can_set_initial_days()
    {
        Livewire::test(MostVisitedPages::class, [
            'days' => 7
        ])
        ->assertSet('days', 7);
    }
}
