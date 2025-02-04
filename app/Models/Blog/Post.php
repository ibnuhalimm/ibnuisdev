<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes, Sluggable, HasFactory;

    const STATUS_DRAFT = 1;
    const STATUS_PUBLISH = 2;

    /**
     * Define table name.
     *
     * @var string
     */
    protected $table = 'post';

    /**
     * Mass fillable columns.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'slug',
        'gbr',
        'image_credits',
        'brief_text',
        'isi',
        'status',
        'tag',
        'user_create',
        'user_update',
    ];

    /**
     * Append custom fields.
     *
     * @var array
     */
    protected $appends = [
        'str_status',
        'str_status_color',
        'gbr_url',
        'post_url',
    ];

    /**
     * Inverse relationship to `users` table.
     *
     * @return mixed
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_create', 'username');
    }

    /**
     * Inverse relationship to `users` table.
     *
     * @return mixed
     */
    public function updated_by()
    {
        return $this->belongsTo(User::class, 'user_update', 'username');
    }

    /**
     * Relationship to `post_visitors` table.
     *
     * @return mixed
     */
    public function post_visitors()
    {
        return $this->hasMany(PostVisitor::class);
    }

    /**
     * Accessor for `str_status`.
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
     * Accessor for `str_status_color`.
     *
     * @return string
     */
    public function getStrStatusColorAttribute()
    {
        if ($this->status == self::STATUS_DRAFT) {
            return 'red';
        }

        if ($this->status == self::STATUS_PUBLISH) {
            return 'green';
        }

        return 'gray';
    }

    /**
     * Accessor for `gbr_url`.
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
     * Accessor for `gbr_url`.
     *
     * @return string
     */
    public function getPostUrlAttribute()
    {
        return route('blog.post.read', ['slug' => $this->slug]);
    }

    /**
     * Query to filter only published post.
     *
     * @param \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISH);
    }

    /**
     * Query to filter by `status`.
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

    }

    /**
     * Query to search from datatable.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchTable($query, $search = null)
    {
        if (! empty($search)) {
            $search = str_replace(',', '.', $search);
            $search_term = '%'.$search.'%';

            return $query->where(function ($query) use ($search_term) {
                return $query->where('judul', 'like', $search_term);
            });
        }

    }

    /**
     * Main post on home page.
     *
     * @return array
     */
    public static function mainPostOnHome()
    {
        return collect(self::orderBy('created_at', 'desc')->published()->take(4)->get())->toArray();
    }

    /**
     * Query related posts.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $tags
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeRelatedPosts($query, $current_post_id, $tags = null)
    {
        $arr_tags = explode(',', $tags);

        $where_tags = '';

        if (! empty($tags)) {
            $where_tags = ' (';
            foreach ($arr_tags as $idx_tag => $tag) {
                if ($idx_tag === 0) {
                    $where_tags .= " tag LIKE '%$tag%'";
                } else {
                    $where_tags .= " OR tag LIKE '%$tag%'";
                }
            }
            $where_tags .= ' )';
        }

        return $query->whereNotIn('id', [$current_post_id])
                    ->whereRaw($where_tags)
                    ->published();
    }

    /**
     * Query to search posts.
     *
     * @param \Illuminate\Database\Query\Builder $
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, $search = null)
    {
        if (! empty($search)) {
            $search_term = '%'.$search.'%';

            return $query->where(function ($post) use ($search_term) {
                $post->where('judul', 'like', $search_term)
                    ->orWhere('tag', 'like', $search_term);
            });
        }

    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
            ],
        ];
    }
}
