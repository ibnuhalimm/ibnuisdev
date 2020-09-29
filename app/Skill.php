<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'name', 'order_number'
    ];

    /**
     * Query to filter/searching from table
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchTable($query, $search = null)
    {
        if (!empty($search)) {
            $search = str_replace(',', '.', $search);
            $search_term = '%' . $search . '%';

            return $query->where(function($query) use ($search_term) {
                return $query->where('name', 'like', $search_term)
                            ->orWhere('order_number', 'like', $search_term);
            });
        }

        return;
    }
}
