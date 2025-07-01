<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
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
        $item->load('category');

        return view('items.show', compact('item'));
    }

    /**
     * Pencarian barang hilang dan ditemukan.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $items = Item::with('category')
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('location', 'like', "%$query%")
                  ->orWhere('description', 'like', "%$query%")
                  ->orWhere('status', 'like', "%$query%")
                  ->orWhereHas('category', function ($q2) use ($query) {
                    $q2->where('name', 'like', "%$query%");
                });
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
        $categories = Category::all();

        $query = Item::with('category');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'kontak' => 'required|url|starts_with:https://wa.me/',
            'category_id' => 'nullable|exists:categories,id',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:lost,found',
        ]);

        $item = new Item();
        $item->fill($validated);
        $item->user_id = auth()->id() ?? 1;
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $item->image = '/storage/' . $path;
        }

        $item->save();

        return redirect()->route('items.katalog')->with('success', 'Barang berhasil dilaporkan!');
    }
}
