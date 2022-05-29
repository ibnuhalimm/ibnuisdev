<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'short_id'
    ];

    public function scopeSearch($query, ?string $search = null)
    {
        if ( !empty($search) ) {
            return $query->where('origin', 'like', '%'.$search.'%')
                ->orWhere('short_id', 'like', '%'.$search.'%');
        }

        return;
    }


    public static function uniqueShortId(?string $short_id = null)
    {
        if (empty($short_id)) {
            $short_id = Str::random(10);
        }

        if ( self::where('short_id', $short_id)->exists() ) {
            $short_id = Str::random(10);
            return self::uniqueShortId($short_id);
        }

        return $short_id;
    }
}
