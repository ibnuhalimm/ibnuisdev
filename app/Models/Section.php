<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * Define `section` field.
     *
     * @var mixed
     */
    const SECTION_TOP = 'top';
    const SECTION_PORTFOLIO = 'portfolio';
    const SECTION_SKILLS = 'skills';
    const SECTION_CONTACT = 'contact';

    /**
     * Mass fillable field.
     *
     * @var array
     */
    protected $fillable = [
        'section', 'description',
    ];
}
