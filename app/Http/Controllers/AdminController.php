<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gamme;
use App\Models\Product;
use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // je récupère toutes les données nécessaires
        $gammes = Gamme::all();
        $products = Product::all();
        $commandes = Commande::all();
        $users = User::with('role')->get();
        
        // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
        return view('admin/index', [
            'gammes' => $gammes,
            'products' => $products,
            'commandes' => $commandes,
            'users' => $users,
        ]);
    }

    // public function __construct()
    // {
    //     return $this->middlware('admin');
    // }
}
