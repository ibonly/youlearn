<?php

namespace YouLearn;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Category Video relationship
     */
    public function videos()
    {
        return $this->hasMany('YouLearn\Video');
    }
}
