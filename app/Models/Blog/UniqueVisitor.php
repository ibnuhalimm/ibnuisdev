<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class UniqueVisitor extends Model
{
    use HasFactory;

    /**
     * Define table name.
     */
    protected $table = 'unique_visitor';

    /**
     * Disabled timestamps
     * `created_at` and `updated_at` columns.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mass fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address',
        'hit',
        'device',
        'os',
        'date',
        'time_start',
        'time_end',
    ];

    /**
     * Booted event.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($unique_visitor) {
            $unique_visitor->date = date('Y-m-d');
            $unique_visitor->time_start = date('H:i:s');
            $unique_visitor->hit = 0;

            Cookie::queue(Cookie::make('_dgtid', $unique_visitor->id));
        });

        static::saving(function ($unique_visitor) {
            $unique_visitor->time_end = date('H:i:s');
            $unique_visitor->hit++;

            Cookie::queue(Cookie::make('_dgtid', $unique_visitor->id));
        });
    }

    /**
     * Storing / updating data when visitor arrive or hitting links.
     *
     * @param string $ip_address
     * @param string $user_agent
     * @return void
     */
    public static function storingVisitor($ip_address)
    {
        $agent = new Agent();

        $device = 'desktop';
        if ($agent->isMobile()) {
            $device = 'mobile';
        }

        if ($agent->isTablet()) {
            $device = 'tablet';
        }

        self::firstOrCreate([
            'ip_address' => $ip_address,
            'device' => $device,
            'os' => $agent->platform(),
            'date' => date('Y-m-d'),
        ])->save();
    }

    /**
     * Count datetime range visitor.
     *
     * @param datetime $start_datetime
     * @param datetime $end_datetime
     *
     * @return int
     */
    public static function countRangeDayVisitor($start_datetime, $end_datetime)
    {
        $query = DB::select(
                    DB::raw("SELECT COUNT(*) AS total
                            FROM unique_visitor
                            WHERE CONCAT(date, ' ', time_start) BETWEEN '$start_datetime' AND '$end_datetime'")
                );

        return collect($query)->first()->total;
    }
}
