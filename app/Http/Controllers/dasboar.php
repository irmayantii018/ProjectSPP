<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dasboar extends Controller
{
    public function index()
    {
        return view('dashboard'); // pastikan view dashboard.blade.php ada
    }
}
