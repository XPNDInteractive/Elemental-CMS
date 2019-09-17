<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;

class Event extends Model
{
    public function media(){
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
