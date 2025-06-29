@extends('layouts.app')

@section('content')
{{-- Kontainer utama dibuat menjadi flexbox untuk memposisikan konten di tengah secara vertikal dan horizontal --}}
<div class="h-full flex items-center justify-center p-4">

    {{-- Kotak konten --}}
    <div class="max-w-4xl w-full mx-auto text-center bg-gray-800 border border-gray-700/50 rounded-2xl shadow-2xl p-8 md:p-12">
        
        {{-- Ikon Bintang dengan animasi --}}
        <div class="mb-6 animate-pulse">
            <svg class="w-20 h-20 mx-auto text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
            </svg>
        </div>

        {{-- Judul dan Teks --}}
        <h1 class="text-4xl font-bold text-white mb-4">Dukung Kami di Found It!</h1>
        <p class="text-gray-300 text-lg max-w-2xl mx-auto mb-10">
            Setiap donasi yang Anda berikan sangat berarti dan membantu kami untuk terus beroperasi, mengembangkan fitur baru, dan menjangkau lebih banyak orang yang membutuhkan bantuan.
        </p>

        <!-- Kartu Pilihan Donasi (Sekarang Interaktif) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            
            {{-- Kartu 1 --}}
            {{-- PERUBAHAN: Menambahkan class 'donation-card' dan 'cursor-pointer' --}}
            <div class="donation-card cursor-pointer bg-gray-700/50 p-6 rounded-lg border border-gray-600 transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-yellow-500 mb-3">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Operasional</h3>
                <p class="text-gray-400 mt-2 text-sm">Membantu biaya server dan pemeliharaan.</p>
            </div>

            {{-- Kartu 2 (Highlight) --}}
            {{-- PERUBAHAN: Menghapus kelas statis dan menambahkan 'donation-card' --}}
            <div class="donation-card cursor-pointer active-card bg-yellow-500/10 p-6 rounded-lg border border-yellow-500 ring-2 ring-yellow-500/50 transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-yellow-500 mb-3">
                     <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Fitur Baru</h3>
                <p class="text-gray-400 mt-2 text-sm">Mendukung riset dan pengembangan inovasi.</p>
            </div>

            {{-- Kartu 3 --}}
            <div class="donation-card cursor-pointer bg-gray-700/50 p-6 rounded-lg border border-gray-600 transform hover:-translate-y-2 transition-all duration-300">
                <div class="text-yellow-500 mb-3">
                    <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-semibold text-white">Komunitas</h3>
                <p class="text-gray-400 mt-2 text-sm">Menjangkau lebih banyak pengguna.</p>
            </div>
        </div>

        {{-- Tombol Donasi --}}
        <a href="https://saweria.co/MASart" target="_blank" class="inline-flex items-center gap-x-3 px-10 py-4 bg-green-500 text-white font-bold text-lg rounded-lg hover:bg-green-600 transition-all transform hover:scale-105 shadow-lg shadow-green-500/20">
            Donasi Sekarang
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const donationCards = document.querySelectorAll('.donation-card');

        const activeClasses = ['bg-yellow-500/10', 'border-yellow-500', 'ring-2', 'ring-yellow-500/50'];
        const inactiveClasses = ['bg-gray-700/50', 'border-gray-600'];

        donationCards.forEach(card => {
            card.addEventListener('click', function () {
                // Hapus status aktif dari semua kartu
                donationCards.forEach(c => {
                    c.classList.remove(...activeClasses);
                    // Pastikan semua kartu punya style non-aktif
                    if (!c.classList.contains(inactiveClasses[0])) {
                         c.classList.add(...inactiveClasses);
                    }
                });

                // Tambahkan status aktif ke kartu yang diklik
                this.classList.add(...activeClasses);
                this.classList.remove(...inactiveClasses);
            });
        });
    });
</script>
@endpush