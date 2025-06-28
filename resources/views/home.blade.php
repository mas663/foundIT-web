@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Pengumuman</h2>
        @if($announcement)
        <div class="bg-gray-800 rounded-lg overflow-hidden relative">
            {{-- Perubahan: Menggunakan gambar dinamis dari database --}}
            <img src="{{ $announcement->image ?? 'https://via.placeholder.com/800x400.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $announcement->name }}" class="w-full h-64 object-cover">
            <div class="absolute bottom-0 left-0 p-6 bg-gradient-to-t from-black to-transparent w-full">
                <h3 class="text-xl font-bold">Dicari {{ $announcement->name }}</h3>
                {{-- Perubahan: Mengambil plat nomor dari kolom 'details' (jika ada) --}}
                @if(isset($announcement->details) && isset(json_decode($announcement->details)->plat_nomor))
                    <p class="text-gray-400">Plat nomor: {{ json_decode($announcement->details)->plat_nomor }}</p>
                @endif
            </div>
        </div>
        @else
        <div class="bg-gray-800 rounded-lg p-6 text-center">
            <p>Tidak ada pengumuman saat ini.</p>
        </div>
        @endif
    </div>

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Baru saja ditemukan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($foundItems as $item)
            {{-- Perubahan: Menambahkan tag <a> --}}
            <a href="{{ route('item.show', $item) }}" class="block bg-gray-800 rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="{{ $item->image ?? 'https://via.placeholder.com/300x200.png/1a202c/FFFFFF?text=' . urlencode($item->name) }}" alt="{{ $item->name }}" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold truncate">{{ $item->name }}</h3>
                </div>
            </a>
            @empty
            <p class="col-span-full text-center text-gray-400">Tidak ada barang yang baru ditemukan.</p>
            @endforelse
        </div>
    </div>

    <div>
        <h2 class="text-xl font-semibold mb-4">Baru saja hilang</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($lostItems as $item)
            {{-- Perubahan: Menambahkan tag <a> --}}
            <a href="{{ route('item.show', $item) }}" class="block bg-gray-800 rounded-lg overflow-hidden transform transition-transform hover:scale-105">
                <img src="{{ $item->image ?? 'https://via.placeholder.com/300x200.png/1a202c/FFFFFF?text=' . urlencode($item->name) }}" alt="{{ $item->name }}" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold truncate">{{ $item->name }}</h3>
                </div>
            </a>
             @empty
            <p class="col-span-full text-center text-gray-400">Tidak ada barang yang baru hilang.</p>
            @endforelse
        </div>
    </div>
@endsection
