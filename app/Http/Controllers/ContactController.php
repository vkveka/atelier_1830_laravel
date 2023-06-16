<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages/contact');
    }

    public function pasapas()
    {
        return view('pages/pasapas');
    }

    public function info_product()
    {
        return view('pages/info_product');
    }
}
