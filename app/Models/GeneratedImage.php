<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneratedImage extends Model
{
    protected $fillable = ['image_base64','user_id','is_approved','price','is_paid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
