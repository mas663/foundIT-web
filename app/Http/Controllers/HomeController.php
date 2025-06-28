<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda (homepage).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Perubahan: Mengambil item yang ditandai sebagai 'featured' untuk pengumuman
        $announcement = Item::where('is_featured', true)->first();

        // Jika tidak ada yang featured, ambil saja item hilang terbaru sebagai fallback
        if (!$announcement) {
            $announcement = Item::where('status', 'lost')->latest()->first();
        }

        // Mengambil semua item ditemukan
        $foundItems = Item::where('status', 'found')->latest()->get();

        // Mengambil semua item hilang
        $lostItems = Item::where('status', 'lost')->latest()->get();

        return view('home', [
            'announcement' => $announcement,
            'foundItems' => $foundItems,
            'lostItems' => $lostItems,
        ]);
    }
}
