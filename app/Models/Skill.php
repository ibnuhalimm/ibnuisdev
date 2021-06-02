<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * Define flag type field.
     *
     * @var mixed
     */
    const FLAG_TYPE_DAY_TO_DAY = 'D';
    const FLAG_TYPE_EXPERIENCE = 'E';

    /**
     * Mass fillable field.
     *
     * @var array
     */
    protected $fillable = [
        'flag_type',
        'name',
        'order_number',
    ];

    /**
     * Query to filter/searching from table.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchTable($query, $search = null)
    {
        if (! empty($search)) {
            $search = str_replace(',', '.', $search);
            $search_term = '%'.$search.'%';

            return $query->where(function ($query) use ($search_term) {
                return $query->where('name', 'like', $search_term)
                            ->orWhere('order_number', 'like', $search_term);
            });
        }

    }

    /**
     * Query to filter by flag_type.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $flag_type
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeFlagType($query, $flag_type)
    {
        $query->where('flag_type', $flag_type);
    }
}
