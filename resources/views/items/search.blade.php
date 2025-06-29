@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    @if($items->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="rounded shadow p-4 bg-gray-700 bg-opacity-70">
                    <img src="{{ $item->image ?? 'https://via.placeholder.com/400x300.png/1a202c/FFFFFF?text=Gambar+Tidak+Tersedia' }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded mb-2">
                    <h2 class="font-bold text-lg mb-1">{{ $item->name }}</h2>
                    <p class="text-sm mb-1">Status: <span class="font-semibold">{{ $item->status == 'found' ? 'Ditemukan' : 'Hilang' }}</span></p>
                    <p class="text-sm mb-1">Lokasi: {{ $item->location }}</p>
                    <p class="text-sm mb-1">Tanggal: {{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                    <a href="{{ route('items.show', $item->id) }}"
                       class="hover:underline {{ $item->status == 'found' ? 'text-yellow-500 hover:text-yellow-600' : 'text-green-500 hover:text-green-600' }}">
                       Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $items->withQueryString()->links() }}</div>
    @else
        <p class="text-gray-600">Tidak ada barang yang cocok dengan pencarian Anda.</p>
    @endif
</div>
@endsection
