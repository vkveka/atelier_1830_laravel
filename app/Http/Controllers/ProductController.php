<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:40',
            'desc' => 'required',
            'full_desc' => 'required',
            'image' => 'required',
            'price' => 'required',
            'dispo' => 'required',
            'gamme_id' => 'required',
        ]);

        $product->create([
            'name' => $request->name,
            'image' => $request->image,
            'desc' => $request->desc,
            'full_desc' => $request->full_desc,
            'price' => $request->price,
            'dispo' => $request->dispo,
            'gamme_id' => $request->gamme_id,
        ]);


        return redirect()->route('admin')->with('message', 'Un produit a été ajoutée');
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
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:40',
            'desc' => 'required',
            'full_desc' => 'required|max:1000',
            'image' => 'required|max:50',
            'price' => 'required',
            'dispo' => 'required',
            'gamme_id' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'full_desc' => $request->full_desc,
            'image' => $request->image,
            'price' => $request->price,
            'dispo' => $request->dispo,
            'gamme_id' => $request->gamme_id,
        ]);


        return redirect()->route('admin')->with('message', 'Modification du produit réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin')->with('message', 'L\'article a bien été supprimé');
    }
}
