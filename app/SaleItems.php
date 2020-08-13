<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{
    protected $guarded=['_token'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(SaleItemsImage::class,'sale_items_id');
    }
    public function main_image() {
        return $this->hasOne(SaleItemsImage::class,'sale_items_id')->oldest();
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','cat_id');
    }

}
