<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareButton extends Model
{
    use HasFactory;

    /**
     * Define table name.
     *
     * @var string
     */
    protected $table = 'share_button';

    /**
     * Mass fillable columns.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'ikon',
        'url',
        'nomor_urut',
    ];
}
