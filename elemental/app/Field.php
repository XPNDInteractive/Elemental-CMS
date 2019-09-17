<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;
use App\FieldType;

class Field extends Model
{
    public function pages(){
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function fieldTypes(){
        return $this->belongsTo(FieldType::class, 'field_type_id', 'id');
    }
}
