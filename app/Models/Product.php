<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "product_name",
        "product_price",
        "product_old_price",
        "product_description",
        "product_image1",
        "product_image2",
        "product_image3",
        "product_image4",
        "featured",
        "brand_id",
        "category_id",
    ];
}
