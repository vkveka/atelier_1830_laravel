<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
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
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'firstname' => 'required|max:40',
            'lastname' => 'nullable|string',
            'email' => 'string',
            'password' => [
                'nullable', 'confirmed',
                Password::min(8)
                    ->mixedCase()
            ],

        ]);

        // //On modifie les infos de l'utilisateur
        // $user->firstname = $request->input('firstname');
        // $user->lastname = $request->input('lastname');
        // $user->save();

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
        ]);

        if ($request->password) {
            if ($request->oldPassword && Hash::check($request->oldPassword, User::find($user->id)->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return redirect()->back()->withErrors(['erreur' => 'L\'ancien mot de passe est incorrect']);
            }
        }

        return redirect()->route('users.edit', $user)->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if (Auth::user()->id == $user->id) {
            $user->delete();
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'suppression du compte impossible']);
        }
    }
}
