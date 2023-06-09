<?php

namespace App\Http\Controllers;

use App\Models\Gamme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //EAGER LOADING
        $gammes = Gamme::with('products')->get();
        //renvoie une vue et injecte une variable dedans
        return view('gammes/index', ['gammes' => $gammes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gamme $gamme)
    {
        $request->validate([
            'name' => 'required|max:40',
            'image' => 'nullable|string',
        ]);

        $gamme->create([
            'name' => $request->name,
            'image' => $request->image,
        ]);


        return redirect()->route('admin')->with('message', 'Une gamme a été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'name' => 'required|max:40',
            'image' => 'nullable|string',
        ]);

        // //On modifie les infos de l'utilisateur
        // $user->firstname = $request->input('firstname');
        // $user->lastname = $request->input('lastname');
        // $user->save();

        $gamme->update([
            'name' => $request->name,
            'image' => $request->image,
        ]);


        return redirect()->route('admin')->with('message', 'La gamme a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->load('products');

        foreach ($gamme->products as $product) {
            $product->delete();
        }
        $gamme->delete();
        
        return redirect()->route('admin.index')->with('message', 'La gamme a bien été supprimée');
    }
}
