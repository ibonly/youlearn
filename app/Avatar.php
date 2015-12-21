<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'avatarURL'];

    /**
     * Avatar user relationship
     *
     * @param  none
     */
    public function user()
    {
        return $this->belongsTo('YouLearn\User');
    }
}
