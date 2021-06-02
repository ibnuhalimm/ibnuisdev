<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    /**
     * Define name.
     *
     * @var mixed
     */
    const LAST_DAY_TOTAL_VISITOR = 'last-day-total-visitor';
    const LAST_MONTH_TOTAL_VISITOR = 'last-month-total-visitor';
    const MOST_VISITED_PAGES = 'most-visited-pages';

    /**
     * Mass fillable field.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'data',
    ];
}
