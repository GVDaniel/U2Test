<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo('App\Models\Orders');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }
}
