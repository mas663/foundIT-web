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

        // Mengambil 4 item terbaru yang ditemukan
        $foundItems = Item::where('status', 'found')->latest()->take(4)->get();

        // Mengambil 4 item terbaru yang hilang
        $lostItems = Item::where('status', 'lost')->latest()->take(4)->get();

        return view('home', [
            'announcement' => $announcement,
            'foundItems' => $foundItems,
            'lostItems' => $lostItems,
        ]);
    }
}
