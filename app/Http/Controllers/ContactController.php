<?php

namespace App\Http\Controllers;


class ContactController extends Controller
{
    public function get()
    {
        return view('contact.form');
    }
}
