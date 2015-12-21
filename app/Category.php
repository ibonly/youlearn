<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    protected $fillable = ['name'];

    /**
     * Category Video relationship
     *
     * @param  none
     */
    public function videos()
    {
        return $this->hasMany('YouLearn\Video');
    }
}
