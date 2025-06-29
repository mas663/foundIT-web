<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporController extends Controller
{
    public function index()
    {
        return view('lapor.index');
    }

    public function kehilangan()
    {
        return view('lapor.kehilangan');
    }

    public function penemuan()
    {
        return view('lapor.penemuan');
    }
}
