<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'category_id',
        'product_name',
        'brand_id',
        'product_decs',
        'product_content',
        'product_price',
        'product_image',
        'product_status',

    ];
    


}
