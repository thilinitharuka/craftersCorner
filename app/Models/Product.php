<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category'];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
