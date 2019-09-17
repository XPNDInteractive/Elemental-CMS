<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;
use App\Field;


class Page extends Model
{
    public function media(){
        return $this->belongsToMany(Media::class);
    }

    public function fields(){
        return $this->hasMany(Field::class);
    }
}
