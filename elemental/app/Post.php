<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;
use App\User;

class Post extends Model
{
    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
