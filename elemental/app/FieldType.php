<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Field;

class FieldType extends Model
{
    public function fields(){
        return $this->hasMany(Field::class);
    }
}
