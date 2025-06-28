<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan halaman detail untuk item tertentu.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View
     */
    public function show(Item $item)
    {
        // Laravel's route model binding akan otomatis mencari item berdasarkan ID.
        // Jika tidak ditemukan, akan menampilkan halaman 404.
        return view('items.show', compact('item'));
    }
}
