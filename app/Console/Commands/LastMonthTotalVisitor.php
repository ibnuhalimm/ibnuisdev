<?php

namespace App\Console\Commands;

use Analytics;
use App\Models\Blog\Analytics as AppAnalytics;
use Illuminate\Console\Command;
use Spatie\Analytics\Period;

class LastMonthTotalVisitor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analytics:last-month-total-visitor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and count total visitor in last 30 days';

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
        $datas = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));

        $total = 0;
        if (!empty($datas)) {
            foreach ($datas as $data) {
                $total += $data['visitors'];
            }
        }

        AppAnalytics::updateOrCreate(
            [
                'name' => AppAnalytics::LAST_MONTH_TOTAL_VISITOR
            ],
            [
                'name' => AppAnalytics::LAST_MONTH_TOTAL_VISITOR,
                'data' => $total
            ]
        );
    }
}
