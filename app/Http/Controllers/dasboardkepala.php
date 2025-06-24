<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dasboardkepala extends Controller
{

    public function index()
    {
        return view('dasboardkpl'); // Ganti sesuai nama view dashboard kepala
    }

}
