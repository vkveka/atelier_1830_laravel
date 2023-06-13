<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function gamme()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
