<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    public function index()
    {
        return view('lapor.index');
    }

    public function kehilangan()
    {
        $categories = Category::all();

        return view('lapor.kehilangan', compact('categories'));
    }

    public function penemuan()
    {
        $categories = Category::all();

        return view('lapor.penemuan', compact('categories'));
    }
}
