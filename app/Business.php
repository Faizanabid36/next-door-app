<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $guarded = [];

    public function business_owner()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

    public function category()
    {
        return $this->hasOne(BusinessCategory::class,'id','business_category_id');
    }

}
