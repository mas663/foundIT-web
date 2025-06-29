@extends('layouts.app')

@section('content')

    {{-- Cek apakah ada session 'success' --}}
    @if (session('success'))
        {{-- Tampilan Sukses (Baru: diposisikan di tengah halaman) --}}
        <div class="h-full flex items-center justify-center">
            <div class="text-center p-10 bg-gray-900 rounded-lg shadow-xl max-w-md">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-2">Saran berhasil dikirim!</h2>
                <p class="text-gray-400">
                    Saran yang kamu beri berhasil dikirim, tunggu balasan dari pihak kami ya. Terima kasih atas sarannya!
                </p>
                <a href="{{ route('dashboard') }}" class="mt-8 inline-block px-8 py-3 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 transition-colors">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    @else
        {{-- Tampilan Formulir Komplain --}}
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-6">Komplain</h1>
            <div class="bg-gray-800 p-8 rounded-lg">
                <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-300 mb-1">Subjek</label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Contoh: Masalah pada fitur lapor">
                        @error('subject')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Kritik atau saran</label>
                        <textarea name="message" id="message" rows="5" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Tuliskan detail kritik atau saran Anda di sini...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="screenshot" class="block text-sm font-medium text-gray-300 mb-1">Unggah Screenshot (Opsional)</label>
                        <div id="drop-area" class="relative mt-1 flex flex-col items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-600 border-dashed rounded-md transition-colors duration-300 ease-in-out">
                            <div class="space-y-2 text-center">
                                 <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>

                                <div id="file-info" class="hidden items-center space-x-2">
                                    <span id="file-name" class="text-sm font-medium text-green-400"></span>
                                    <button type="button" id="remove-file" class="text-red-500 hover:text-red-400" title="Hapus file">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>

                                <div id="upload-button-container">
                                    <label for="screenshot" class="relative cursor-pointer bg-yellow-500 text-gray-900 font-semibold rounded-md px-4 py-2 hover:bg-yellow-600 transition-colors">
                                        <span>Pilih file untuk diunggah</span>
                                        <input id="screenshot" name="screenshot" type="file" class="sr-only">
                                    </label>
                                     <p class="text-xs text-gray-500 mt-2">atau seret dan lepas file</p>
                                </div>

                                <p class="text-xs text-gray-500">PNG, JPG, JPEG</p>
                            </div>
                        </div>
                         @error('screenshot')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="px-8 py-3 bg-yellow-500 text-gray-900 font-bold rounded-lg hover:bg-yellow-600 transition-colors">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <script>
        if (document.getElementById('drop-area')) {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('screenshot');
            const fileNameDisplay = document.getElementById('file-name');
            const fileInfo = document.getElementById('file-info');
            const uploadButtonContainer = document.getElementById('upload-button-container');
            const removeFileButton = document.getElementById('remove-file');


            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight(e) {
                dropArea.classList.add('border-yellow-500', 'bg-gray-700');
            }

            function unhighlight(e) {
                dropArea.classList.remove('border-yellow-500', 'bg-gray-700');
            }

            dropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                let dt = e.dataTransfer;
                let files = dt.files;

                handleFiles(files);
            }

            fileInput.addEventListener('change', function(e) {
                handleFiles(this.files);
            });

            function handleFiles(files) {
                if (files.length > 0) {
                    fileInput.files = files;
                    fileNameDisplay.textContent = files[0].name;

                    fileInfo.classList.remove('hidden');
                    fileInfo.classList.add('flex');
                    uploadButtonContainer.classList.add('hidden');
                }
            }

            removeFileButton.addEventListener('click', function() {
                fileInput.value = '';

                fileInfo.classList.add('hidden');
                fileInfo.classList.remove('flex');
                uploadButtonContainer.classList.remove('hidden');
            });
        }
    </script>
@endsection
