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
}
