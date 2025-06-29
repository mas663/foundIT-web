<header class="w-full flex items-center p-6 bg-gray-900 border-b border-gray-700 sticky top-0 z-10">
    <div class="flex items-center space-x-4 flex-1 min-w-0">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="FOUNDit Logo" class="w-auto h-10 mr-2">
        </a>
        <svg class="w-8 h-8 text-white lg:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>

        <div class="relative hidden lg:block flex-1 min-w-0">
            <form action="{{ route('items.search') }}" method="GET">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </span>
                <input type="text" name="q" placeholder="Cari barang hilang" class="w-full bg-gray-800 border border-gray-700 rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </form>
        </div>
    </div>

    <div class="flex items-center space-x-4 ml-6 flex-shrink-0">
        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            <img src="{{ asset('images/akun.png') }}" alt="Akun" class="w-10 h-10 mb-1">
        </a>
    </div>
</header>
