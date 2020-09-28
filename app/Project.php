<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Project extends Model
{
    use SoftDeletes;

    /**
     * Define `status` field
     *
     * @var mixed
     */
    CONST STATUS_DRAFT = 'draft';
    CONST STATUS_PUBLISH = 'publish';

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'month', 'year', 'name', 'image', 'description', 'link', 'status'
    ];

    /**
     * Append custom fields
     *
     * @var array
     */
    protected $appends = [
        'image_url'
    ];

    /**
     * Accessor for `image_url`
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        if (Storage::disk('public')->exists($this->image)) {
            return URL::asset(Storage::url($this->image));
        }

        return URL::asset('img/no_image.jpg');
    }

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
                return $query->where('name', 'like', $search_term);
            });
        }

        return;
    }

    /**
     * Query to filter by status
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $status
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeStatus($query, $status = null)
    {
        if (!empty($status)) {
            return $query->where('status', $status);
        }

        return;
    }
}
