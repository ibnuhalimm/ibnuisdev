<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
