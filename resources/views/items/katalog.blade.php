@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
    <h1 class="text-2xl font-bold mb-6">Katalog Barang</h1>
    <div class="mb-6">
        <form method="GET" action="{{ route('items.katalog') }}" class="flex flex-wrap gap-2 w-full">
            <select name="category" onchange="this.form.submit()" class="flex-1 min-w-[180px] rounded shadow bg-gray-700 bg-opacity-70 px-4 py-2">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <select name="status" onchange="this.form.submit()" class="flex-1 min-w-[150px] rounded shadow bg-gray-700 bg-opacity-70 px-4 py-2">
                <option value="">Semua Status</option>
                <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Hilang</option>
                <option value="found" {{ request('status') == 'found' ? 'selected' : '' }}>Ditemukan</option>
            </select>
            <input type="date" name="date" value="{{ request('date') }}" onchange="this.form.submit()" class="flex-1 min-w-[150px] rounded shadow bg-gray-700 bg-opacity-70 px-4 py-2" placeholder="Tanggal">
            <select name="month" onchange="this.form.submit()" class="flex-1 min-w-[150px] rounded shadow bg-gray-700 bg-opacity-70 px-4 py-2">
                <option value="">Semua Bulan</option>
                @for($m=1; $m<=12; $m++)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>{{ \DateTime::createFromFormat('!m', $m)->format('F') }}</option>
                @endfor
            </select>
            <select name="year" onchange="this.form.submit()" class="flex-1 min-w-[150px] rounded shadow bg-gray-700 bg-opacity-70 px-4 py-2">
                <option value="">Semua Tahun</option>
                @for($y = now()->year; $y >= 2020; $y--)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </form>
    </div>
    @if($items->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                <a href="{{ route('items.show', $item->id) }}" class="block rounded shadow p-4 bg-gray-700 bg-opacity-70 hover:scale-105 transition-transform">
                    <img src="{{ $item->image ?? 'https://via.placeholder.com/400x300.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded mb-2">
                    <h2 class="font-bold text-lg mb-1">{{ $item->name }}</h2>
                    <p class="text-sm mb-1">Status: <span class="font-semibold">{{ $item->status == 'found' ? 'Ditemukan' : 'Hilang' }}</span></p>
                    <p class="text-sm mb-1">Kategori: {{ $item->category ? $item->category->name : '-' }}</p>
                    <p class="text-sm mb-1">
                        @if($item->status == 'found')
                            <span class="font-semibold">Tanggal ditemukan:</span>
                        @else
                            <span class="font-semibold">Tanggal hilang:</span>
                        @endif
                        {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}
                    </p>
                    <span class="hover:underline {{ $item->status == 'found' ? 'text-yellow-500 hover:text-yellow-600' : 'text-green-500 hover:text-green-600' }}">
                       Lihat Detail
                    </span>
                </a>
            @endforeach
        </div>
        <div class="mt-6">{{ $items->withQueryString()->links() }}</div>
    @else
        <p class="text-gray-600">Tidak ada barang pada kategori ini.</p>
    @endif
</div>
@endsection