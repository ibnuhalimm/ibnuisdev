<?php

namespace App;

use App\Notifications\ContactMeNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use SoftDeletes, Notifiable;

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'message', 'is_replied'
    ];

    /**
     * Append some custom field
     *
     * @var array
     */
    protected $appends = [
        'str_replied', 'str_replied_color'
    ];

    /**
     * Casts field
     *
     * @var array
     */
    protected $casts = [
        'is_replied' => 'boolean'
    ];

    /**
     * Model event
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function($message) {
            $message->notify(new ContactMeNotification($message));
        });
    }

    /**
     * ACcessor for `str_replied`
     *
     * @return string
     */
    public function getstrRepliedAttribute()
    {
        if ($this->is_replied == true) {
            return 'Replied';
        }

        return 'Unreply';
    }

    /**
     * ACcessor for `str_replied_color`
     *
     * @return string
     */
    public function getstrRepliedColorAttribute()
    {
        if ($this->is_replied == true) {
            return 'green';
        }

        return 'red';
    }

    /**
     * Query to filter/searching from table
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearchTable($query, $search = null)
    {
        if (!empty($search)) {
            $search = str_replace(',', '.', $search);
            $search_term = '%' . $search . '%';

            return $query->where(function($query) use ($search_term) {
                return $query->where('name', 'like', $search_term)
                            ->orWhere('email', 'like', $search_term);
            });
        }

        return;
    }
}
