<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'image', 'brand', 'price', 'price_sale', 'category', 'stock'];
}
