<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class PostVisitor extends Model
{
    /**
     * Define table name
     *
     * @var string
     */
    protected $table = 'post_visitor';

    /**
     * Mass fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'unique_visitor_id', 'post_id'
    ];

    /**
     * Store post visitor
     *
     * @param int $post_id
     * @return void
     */
    public static function storePostVisitor($post_id)
    {
        $exists_unique_visitor = UniqueVisitor::find(Cookie::get('_dgtid'));

        if (!empty($exists_unique_visitor)) {
            self::firstOrCreate([
                'unique_visitor_id' => Cookie::get('_dgtid'),
                'post_id' => $post_id
            ]);
        }
    }
}
