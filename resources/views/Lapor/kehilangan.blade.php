@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white flex justify-center px-4 py-10">
        <div class="w-full max-w-3xl bg-gray-800 rounded-xl shadow-lg p-8">
            <h1 class="text-2xl font-bold mb-8 text-yellow-400">Formulir Laporan Kehilangan Barang</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-600 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-2">Nama barang</label>
                    <input type="text" name="name" placeholder="Masukkan nama barang"
                           class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Tanggal kehilangan</label>
                    <input type="date" name="date"
                           class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Lokasi kehilangan</label>
                    <input type="text" name="location" placeholder="Masukkan lokasi kehilangan"
                           class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Deskripsi</label>
                    <textarea name="description" placeholder="Deskripsikan barang atau kasus kehilangan"
                              class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Link WhatsApp (contoh: https://wa.me/6281234567890)</label>
                    <input type="url" name="kontak" placeholder="https://wa.me/6281234567890"
                           class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required>
                </div>


                <div class="mb-4">
                    <label class="block mb-2">Kategori</label>
                    <input type="text" name="category" placeholder="Kategori barang"
                           class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Detail tambahan</label>
                    <textarea name="details" placeholder="Detail tambahan jika ada"
                              class="w-full px-4 py-2 rounded-md text-gray-900 focus:outline-none"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Upload gambar <span class="text-sm">(maksimal 2 MB)</span></label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-4 py-2 bg-yellow-400 text-gray-900 rounded-md font-semibold cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-gray-900 file:bg-yellow-400 hover:file:bg-yellow-500 transition">
                    @error('image')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="status" value="lost">

                <button type="submit"
                        class="w-full bg-green-500 text-gray-900 font-bold py-3 rounded-md hover:bg-green-600 transition">
                    Submit
                </button>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const fileInput = document.querySelector('input[name="image"]');
                    fileInput.addEventListener('change', function () {
                        const file = this.files[0];
                        if (file && file.size > 2 * 1024 * 1024) {
                            alert("Ukuran file melebihi 2 MB. Silakan pilih file yang lebih kecil!");
                            this.value = "";
                        }
                    });
                });
            </script>
        </div>
    </div>
@endsection
