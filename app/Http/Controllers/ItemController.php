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

    /**
     * Pencarian barang hilang dan ditemukan.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $items = Item::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('location', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%")
                  ->orWhere('category', 'like', "%$query%")
                  ->orWhere('status', 'like', "%$query%")
                ;
            })
            ->orderByDesc('created_at')
            ->paginate(12);
        return view('items.search', compact('items'));
    }
}
