<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    protected $fillable = ['name'];


    /**
     *  that for Categories has many posts
     *  @return HasMany Blog
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
