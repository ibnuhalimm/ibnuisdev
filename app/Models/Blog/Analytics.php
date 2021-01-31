<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    /**
     * Define name
     *
     * @var mixed
     */
    CONST LAST_DAY_TOTAL_VISITOR = 'last-day-total-visitor';
    CONST LAST_MONTH_TOTAL_VISITOR = 'last-month-total-visitor';
    CONST MOST_VISITED_PAGES = 'most-visited-pages';

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'name', 'data'
    ];
}
