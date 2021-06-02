<?php

namespace App\Console\Commands;

use Analytics;
use App\Models\Blog\Analytics as AppAnalytics;
use Illuminate\Console\Command;
use Spatie\Analytics\Period;

class MostVisitedPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analytics:most-visited-pages {days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch most visited pages in certain days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $days = intval($this->argument('days'));
        $datas = Analytics::fetchMostVisitedPages(Period::days($days), 10);

        AppAnalytics::updateOrCreate(
            [
                'name' => AppAnalytics::MOST_VISITED_PAGES.'-'.$days.'-'.'days',
            ],
            [
                'name' => AppAnalytics::MOST_VISITED_PAGES.'-'.$days.'-'.'days',
                'data' => json_encode($datas),
            ]
        );
    }
}
