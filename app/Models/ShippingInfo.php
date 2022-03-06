<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    protected $table = "shipping_infos";
    protected $fillable = [
        "emailNumber",
        "firstName",
        "lastName",
        "address",
        "apartment",
        "city",
        "country",
        "postalCode",
        "user_id",
    ];
}
