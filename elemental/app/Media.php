<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;
use App\Post;

class Media extends Model
{
    public function pages(){
        return $this->belongsToMany(Page::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
