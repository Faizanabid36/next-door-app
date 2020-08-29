<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    //
    protected $table = 'business_categories';

    protected $guarded = [];

    protected $with = ['parent'];

    public function children()
    {
        return $this->hasMany(BusinessCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }

}
