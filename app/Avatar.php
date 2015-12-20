<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['user_id', 'avatarURL'];

    /**
     * Avatar user relationship
     */
    public function user()
    {
        return $this->belongsTo('YouLearn\User');
    }
}
