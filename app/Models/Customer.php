<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'user_id','firstName','lastName', 'email', 'password', 'address', 'phone_number', 'customer_status','city','zip_code'
    ];

    // Optionally define relationships with other models
}
