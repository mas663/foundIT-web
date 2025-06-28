@extends('layouts.app')

@section('content')
@php
    // Menentukan kelas warna berdasarkan status barang
    $isFound = $item->status == 'found';
    $mainBoxColor = $isFound ? 'bg-yellow-500 bg-opacity-20 text-yellow-300' : 'bg-green-500 bg-opacity-20 text-green-300';
    $descBoxColor = $isFound ? 'bg-yellow-500 bg-opacity-20' : 'bg-green-500 bg-opacity-20';
    $userBoxColor = $isFound ? 'bg-green-500 bg-opacity-20 text-green-300' : 'bg-yellow-500 bg-opacity-20 text-yellow-300';
    $categoryTagColor = 'bg-yellow-500 bg-opacity-20 text-yellow-300'; // Warna kategori tetap sama di kedua desain
@endphp

<div class="text-white">
    {{-- Judul Halaman Dinamis --}}
    <h1 class="text-2xl font-bold mb-6">
        @if($isFound)
            Detail penemuan barang
        @else
            Detail laporan kehilangan
        @endif
    </h1>

    <div class="flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-1/3">
            <div class="bg-gray-700 rounded-lg overflow-hidden mb-6">
                <img src="{{ $item->image ?? 'https://via.placeholder.com/400x300.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $item->name }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-lg text-center">{{ $item->name }}</h2>
                </div>
            </div>

            {{-- Kotak Info Utama dengan Warna Dinamis --}}
            <div class="{{ $mainBoxColor }} p-6 rounded-lg space-y-4 text-black">
                <div>
                    {{-- Label Dinamis: Penemu / Pemilik --}}
                    <h3 class="font-semibold text-black mb-1">
                        @if($isFound) Penemu @else Pemilik @endif
                    </h3>
                    <div class="flex items-center justify-between {{ $userBoxColor }} p-2 rounded text-black">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            <span class="text-black">{{ $item->user->name ?? 'Tidak diketahui' }}</span>
                        </span>
                        <button title="Salin Username">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h6a2 2 0 00-2-2H5z"></path></svg>
                        </button>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-black mb-1">Lokasi</h3>
                    <p class="text-black">{{ $item->location }}</p>
                </div>
                <div>
                    {{-- Label Dinamis: Tanggal Ditemukan / Kehilangan --}}
                    <h3 class="font-semibold text-black mb-1">
                        @if($isFound) Tanggal ditemukan @else Tanggal kehilangan @endif
                    </h3>
                    <p class="text-black">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-black mb-1">Kategori</h3>
                    <span class="{{ $categoryTagColor }} px-3 py-1 text-sm rounded-full text-black">{{ $item->category }}</span>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-2/3 {{ $descBoxColor }} p-6 rounded-lg">
            <h2 class="font-bold text-black text-xl mb-4">Deskripsi</h2>
            <p class="text-black leading-relaxed whitespace-pre-wrap">
                {{ $item->description }}
            </p>
        </div>
    </div>
</div>
@endsection
