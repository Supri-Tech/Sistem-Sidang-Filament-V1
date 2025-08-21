<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerkaraController extends Controller
{
    public function index()
    {
        return view("perkara.index");
    }

    public function show()
    {
        return view("perkara.show");
    }
}
