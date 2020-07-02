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

   
}
