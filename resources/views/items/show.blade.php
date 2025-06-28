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
        <div class="w-full lg:w-1/2 flex flex-col gap-6 relative">
            <div class="bg-gray-700 rounded-lg overflow-hidden">
                <img src="{{ $item->image ?? 'https://via.placeholder.com/400x300.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $item->name }}" class="w-full h-80 object-cover">
                <div class="p-6">
                    <h2 class="font-bold text-2xl text-center text-black">{{ $item->name }}</h2>
                </div>
            </div>

            {{-- Kotak Info Utama dengan Warna Dinamis --}}
            <div class="{{ $mainBoxColor }} p-8 rounded-lg space-y-6 text-black">
                <div>
                    <h3 class="font-semibold text-black text-lg mb-2">Lokasi</h3>
                    <p class="text-black text-base">{{ $item->location }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-black text-lg mb-2">
                        @if($isFound) Tanggal ditemukan @else Tanggal kehilangan @endif
                    </h3>
                    <p class="text-black text-base">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-black text-lg mb-2">Kategori</h3>
                    <span class="{{ $categoryTagColor }} px-4 py-2 text-base rounded-full text-black font-semibold">{{ $item->category }}</span>
                </div>
            </div>
            {{-- Kotak Penemu/Pemilik di kanan bawah --}}
            <div class="hidden lg:block absolute right-0 bottom-0 translate-x-1/2 translate-y-1/2 w-[320px] max-w-full z-10">
                <div class="bg-yellow-400/90 shadow-lg rounded-xl p-6 flex flex-col items-center">
                    <h3 class="font-bold text-xl mb-2 text-black">@if($isFound) Penemu @else Pemilik @endif</h3>
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span class="text-black text-lg font-bold">{{ $item->user->name ?? 'Tidak diketahui' }}</span>
                    </div>
                    <button title="Salin Username" class="bg-black/10 hover:bg-black/20 rounded-full p-2">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h6a2 2 0 00-2-2H5z"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 {{ $descBoxColor }} p-8 rounded-lg flex flex-col justify-center min-h-[300px] max-h-[400px]">
            <h2 class="font-bold text-black text-2xl mb-6 text-center">Deskripsi Barang</h2>
            <div class="flex-1 flex items-center justify-center">
                <p class="text-black leading-relaxed whitespace-pre-wrap text-lg lg:text-xl text-center">
                    {{ $item->description }}
                </p>
            </div>
            <div class="mt-8 flex flex-wrap gap-4 justify-center">
                <div class="bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700">ID: {{ $item->id }}</div>
                <div class="bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700">Kategori: {{ $item->category }}</div>
                <div class="bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700">Status: {{ $item->status == 'found' ? 'Ditemukan' : 'Hilang' }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
