@extends('layouts.app')

@section('content')
    <div class="h-screen flex items-center justify-center bg-gray-900 text-white overflow-hidden">
        <div class="w-full max-w-3xl bg-gray-800 rounded-2xl shadow-xl p-10 flex flex-col items-center">
            <h1 class="text-5xl font-extrabold mb-12 tracking-wide text-white-400">LAPOR</h1>

            <a href="{{ route('lapor.kehilangan') }}"
               class="block bg-yellow-400 text-gray-900 text-2xl font-bold px-12 py-6 rounded-xl mb-6 hover:bg-yellow-500 transition-all duration-300 ease-in-out shadow-md w-full text-center">
                Lapor Kehilangan Barang
            </a>

            <a href="{{ route('lapor.penemuan') }}"
               class="block bg-green-500 text-gray-900 text-2xl font-bold px-12 py-6 rounded-xl hover:bg-green-600 transition-all duration-300 ease-in-out shadow-md w-full text-center">
                Lapor Penemuan Barang
            </a>
        </div>
    </div>
@endsection

