<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItemsImage extends Model
{
    protected $guarded=[];
    public function image()
    {
        return $this->belongsTo(SaleItems::class, 'sale_items_id', 'id');
    }
}
