<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'numero',
        'price',
    ];

    // je charge automatiquement l'utilisateur à chaque fois que je récupère un message
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commande_articles()
    {
        return $this->belongsToMany(User::class, 'commande_articles');
    }
}
