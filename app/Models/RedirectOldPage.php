<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectOldPage extends Model
{
    /**
     * Disable timestamps (created_at and updated_at field).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mass fillable field.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'new_url',
    ];

    /**
     * Query to searching data.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, $search = null)
    {
        if (! empty($search)) {
            return $query->where('slug', 'like', '%'.$search.'%')
                ->orWhere('new_url', 'like', '%'.$search.'%');
        }

    }
}
