<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'title',
        'note',
    ];

    // je charge automatiquement l'utilisateur à chaque fois que je récupère un message
    protected $with = ['user'];


    // nom de la fonction au singulier car 1 seul message en relation
    // cardinalité 1,1

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // idem
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
