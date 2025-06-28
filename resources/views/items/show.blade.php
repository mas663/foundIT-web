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
    <h1 class="text-3xl font-bold mb-8">
        @if($isFound)
            Detail Penemuan Barang
        @else
            Detail Laporan Kehilangan
        @endif
    </h1>

    {{-- Grid 2x2 --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- KIRI ATAS: Foto Barang --}}
        <div class="bg-gray-700 rounded-lg overflow-hidden">
            <img src="{{ $item->image ?? 'https://via.placeholder.com/400x300.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $item->name }}" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="font-bold text-xl text-center text-white">{{ $item->name }}</h2>
            </div>
        </div>

        {{-- KANAN ATAS: Deskripsi Barang --}}
        <div class="{{ $descBoxColor }} p-6 rounded-lg">
            <h2 class="font-bold text-black text-2xl mb-4">Deskripsi</h2>
            <p class="text-black text-lg leading-relaxed whitespace-pre-wrap">
                {{ $item->description }}
            </p>
        </div>

        {{-- KIRI BAWAH: Lokasi, Tanggal, Kategori --}}
        <div class="{{ $mainBoxColor }} p-6 rounded-xl shadow-md text-black text-lg space-y-4 border border-opacity-10 border-black">
            {{-- Lokasi --}}
            <div class="flex items-start gap-4">
                <div class="bg-white bg-opacity-20 p-2 rounded-full shadow">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5 14.5 7.6 14.5 9 13.4 11.5 12 11.5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-xl mb-1 text-black">Lokasi</h3>
                    <p class="text-black">{{ $item->location }}</p>
                </div>
            </div>

            <hr class="border-t border-black border-opacity-20" />

            {{-- Tanggal --}}
            <div class="flex items-start gap-4">
                <div class="bg-white bg-opacity-20 p-2 rounded-full shadow">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 10h5v5H7z" opacity=".3"/><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2
                        2v14c0 1.1.9 2 2 2h14c1.1 0
                        2-.9 2-2V6c0-1.1-.9-2-2-2zm0
                        16H5V9h14v11zm0-13H5V6h14v1z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-xl mb-1 text-black">
                        @if($isFound) Tanggal ditemukan @else Tanggal kehilangan @endif
                    </h3>
                    <p class="text-black">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            <hr class="border-t border-black border-opacity-20" />

            {{-- Kategori --}}
            <div class="flex items-start gap-4">
                <div class="bg-white bg-opacity-20 p-2 rounded-full shadow">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.5 9.5l-8.5 6-8.5-6v-5l8.5 6
                        8.5-6zM3 19.5v-9l8.5 6
                        8.5-6v9l-8.5 6z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-xl mb-1 text-black">Kategori</h3>
                    <span class="px-4 py-2 text-base rounded-full font-medium text-black shadow inline-block {{ $isFound ? 'bg-green-400' : 'bg-yellow-400' }}">
                        {{ $item->category }}
                    </span>
                </div>
            </div>
        </div>

        {{-- KANAN BAWAH: Info Penemu / Pemilik --}}
<div class="{{ $mainBoxColor }} p-6 rounded-xl shadow-md text-black space-y-6 border border-black border-opacity-10">
    <h3 class="font-bold text-2xl flex items-center gap-2 text-black">
        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
        @if($isFound) Kontak dan Informasi @else Kontak dan Informasi @endif
    </h3>

    {{-- Status --}}
    <div class="flex items-start gap-4">
        <div class="bg-white bg-opacity-10 p-2 rounded-full shadow">
            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11h-2v4h2V7zm0 6h-2v2h2v-2z"/>
            </svg>
        </div>
        <div>
            <p class="text-base font-semibold text-black">Status</p>
            <p class="text-lg text-black">
                @if($isFound)
                    Penemu Barang
                @else
                    Pelapor Kehilangan
                @endif
            </p>
        </div>
    </div>

    {{-- WhatsApp --}}
    @if(!empty($item->user->phone))
        <div class="flex items-start gap-4">
            <div class="bg-white bg-opacity-10 p-2 rounded-full shadow">
                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.52 3.48A11.76 11.76 0 0012.02 0C5.39 0 .01 5.35.01 11.95a11.9 11.9 0 001.61 5.97L0 24l6.27-1.64a11.95 11.95 0 005.75 1.47h.01c6.63 0 12.01-5.35 12.01-11.95a11.77 11.77 0 00-3.52-8.4zM12.03 21.8c-1.78 0-3.52-.47-5.06-1.36l-.36-.21-3.73.98.99-3.63-.24-.37a9.8 9.8 0 01-1.51-5.24c0-5.43 4.46-9.85 9.95-9.85a9.91 9.91 0 019.94 9.85c0 5.43-4.45 9.84-9.98 9.84zm5.49-7.38c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.66.15-.2.3-.76.97-.93 1.17-.17.2-.34.23-.63.08-.3-.15-1.25-.46-2.37-1.47-.87-.77-1.46-1.7-1.63-2-.17-.3-.02-.46.13-.61.13-.13.3-.34.45-.5.15-.17.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.66-1.58-.9-2.17-.24-.6-.48-.5-.66-.5h-.56c-.2 0-.5.08-.76.38s-1 1-1 2.46 1.02 2.84 1.16 3.03c.14.2 2.02 3.08 4.9 4.32.68.29 1.22.46 1.64.6.69.22 1.31.19 1.8.11.55-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.18-1.41-.07-.11-.27-.18-.57-.33z"/>
                </svg>
            </div>
            <div>
                <p class="text-base font-semibold text-black">Hubungi via WhatsApp</p>
                <a
                    href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->user->phone) }}"
                    target="_blank"
                    class="text-blue-600 underline hover:text-blue-800 transition">
                    Klik untuk menghubungi
                </a>
            </div>
        </div>
    @else
        <p class="text-black italic">Nomor WhatsApp tidak tersedia</p>
    @endif
</div>



    </div>
</div>

@endsection
