<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable = [
        'shipping_name', 'company_name', 'email', 'password', 'phone',
        'address', 'city', 'country', 'zip_code',
    ];

    
}
