<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'title', 'url', 'description', 'slug'];

    /**
     * Video category relationship
     *
     * @param  none
     */
    public function category()
    {
        return $this->belongsTo('YouLearn\Category');
    }

    /**
     * Video user relationship
     *
     * @param  none
     */
    public function user()
    {
        return $this->belongsTo('YouLearn\User');
    }
}
