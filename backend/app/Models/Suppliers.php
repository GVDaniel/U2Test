<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'product_id');
    }

}
