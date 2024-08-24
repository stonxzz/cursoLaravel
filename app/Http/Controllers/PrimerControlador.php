<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    function index() {
        return view('contact', ['name' => 'Stonxz']);
    }

    function otro($post = 40, $otro = 50) {
        echo $post;
        echo $otro;
    }
}
