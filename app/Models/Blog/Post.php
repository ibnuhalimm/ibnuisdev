<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    CONST STATUS_DRAFT = 1;
    CONST STATUS_PUBLISH = 2;

    /**
     * Define table name
     *
     * @var string
     */
    protected $table = 'post';

    /**
     * Mass fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'slug', 'gbr', 'isi', 'status', 'tag', 'user_create', 'user_update'
    ];

    /**
     * Append custom fields
     *
     * @var array
     */
    protected $appends = [
        'str_status', 'gbr_url', 'post_url'
    ];

    /**
     * Inverse relationship to `users` table
     *
     * @return mixed
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_create', 'username');
    }

    /**
     * Inverse relationship to `users` table
     *
     * @return mixed
     */
    public function updated_by()
    {
        return $this->belongsTo(User::class, 'user_update', 'username');
    }

    /**
     * Accessor for `str_status`
     *
     * @return string
     */
    public function getStrStatusAttribute()
    {
        if ($this->status == self::STATUS_DRAFT) {
            return 'Draft';
        }

        if ($this->status == self::STATUS_PUBLISH) {
            return 'Publish';
        }

        return 'Unknown';
    }

    /**
     * Accessor for `gbr_url`
     *
     * @return string
     */
    public function getGbrUrlAttribute()
    {
        if (Storage::disk('public')->exists($this->gbr)) {
            return URL::asset(Storage::url($this->gbr));
        }

        return url('img/no_image.jpg');
    }

    /**
     * Accessor for `gbr_url`
     *
     * @return string
     */
    public function getPostUrlAttribute()
    {
        return url($this->slug);
    }

    /**
     * Query to filter by `status`
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $status
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeStatus($query, $status = null)
    {
        if ($status > 0) {
            return $query->where('status', $status);
        }

        return;
    }

    /**
     * Query to search from datatable
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchTable($query, $search = null)
    {
        if (!empty($search)) {
            $search = str_replace(',', '.', $search);
            $search_term = '%' . $search . '%';

            return $query->where(function($query) use ($search_term) {
                return $query->where('judul', 'like', $search_term);
            });
        }

        return;
    }

    /**
     * Main post on home page
     *
     * @return array
     */
    public static function mainPostOnHome()
    {
        return collect(self::orderBy('created_at', 'desc')->status(self::STATUS_PUBLISH)->take(4)->get())->toArray();
    }

    /**
     * Top top post on home page
     * ordering by most visited in lates 14 days
     *
     * @param array $main_post_ids
     * @return mixed
     */
    public static function getTopPostNotInMain($main_post_ids = [])
    {
        $start_day = Carbon::now()->subDays(14)->format('Y-m-d') . ' 00:00:00';
        $end_day = Carbon::now()->format('Y-m-d') . ' 23:59:59';

        return self::orderBy(
                    PostVisitor::selectRaw('COUNT(*)')
                        ->whereColumn('post_id', 'post.id')
                        ->whereBetween('created_at', [$start_day, $end_day])
                        ->groupBy('post_id')
                , 'desc')
                ->status(self::STATUS_PUBLISH)
                ->whereNotIn('id', $main_post_ids)
                ->take(3)
                ->get();
    }

    /**
     * Query related posts
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $tags
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeRelatedPosts($query, $tags = null)
    {
        $start_date = Carbon::now()->subYear()->format('Y-m-d') . ' 00:00:00';
        $end_date = Carbon::now()->format('Y-m-d') . ' 23:59.59';

        if (!empty($tags)) {
            $arr_tags = Str::of($tags)->explode(',');

            return $query->whereBetween('created_at', [$start_date, $end_date])
                        ->where(function($post) use ($arr_tags) {
                            foreach ($arr_tags as $tag) {
                                $post->orWhere('tag', 'like', '%' . trim($tag) . '%');
                            }
                        })
                        ->status(self::STATUS_PUBLISH)
                        ->inRandomOrder();
        }

        return $query->whereBetween('created_at', [$start_date, $end_date])
                    ->status(self::STATUS_PUBLISH)
                    ->inRandomOrder();
    }

    /**
     * Query to search posts
     *
     * @param \Illuminate\Database\Query\Builder $
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, $search = null)
    {
        if (!empty($search)) {
            $search_term = '%' . $search . '%';

            return $query->where(function($post) use ($search_term) {
                $post->where('judul', 'like', $search_term)
                    ->orWhere('tag', 'like', $search_term);
            });
        }

        return;
    }
}
