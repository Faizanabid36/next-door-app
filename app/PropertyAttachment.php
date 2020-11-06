<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAttachment extends Model
{
    public $guarded = [];

    public function property()
    {
        return $this->belongsTo(Properties::class,'property_id','id');
    }
}
