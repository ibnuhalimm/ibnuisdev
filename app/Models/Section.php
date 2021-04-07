<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * Define `section` field
     *
     * @var mixed
     */
    CONST SECTION_TOP = 'top';
    CONST SECTION_PORTFOLIO = 'portfolio';
    CONST SECTION_SKILLS = 'skills';
    CONST SECTION_CONTACT = 'contact';

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'section', 'description'
    ];
}
