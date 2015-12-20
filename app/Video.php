<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'url', 'description', 'slug'];

    /**
     * Video category relationship
     */
    public function category()
    {
        return $this->belongsTo('YouLearn\Category');
    }

    /**
     * Video user relationship
     */
    public function user()
    {
        return $this->belongsTo('YouLearn\User');
    }
}
