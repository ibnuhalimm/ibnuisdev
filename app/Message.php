<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'message', 'is_replied'
    ];
}
