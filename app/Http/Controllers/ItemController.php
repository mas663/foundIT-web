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

    /**
     * Menampilkan katalog barang berdasarkan kategori.
     */
    public function katalog(Request $request)
    {
        $categories = Item::query()->distinct()->pluck('category')->filter()->unique()->values();
        $query = Item::query();
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }
        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }
        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }
        $items = $query->orderByDesc('created_at')->paginate(12);
        return view('items.katalog', compact('items', 'categories'));
    }
}
