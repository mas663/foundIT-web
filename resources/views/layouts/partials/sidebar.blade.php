<aside class="w-32 bg-gray-900 p-6 border-r border-gray-700 h-screen sticky top-0">
    <div class="flex flex-col items-center mb-10">
        <a class="flex items-center space-x-4 px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <img src="{{ asset('images/menu.png') }}" alt="Beranda" class="w-10 h-10">
        </a>
    </div>

    <nav class="space-y-4 flex flex-col items-center">
        {{-- Menu Beranda --}}
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <img src="{{ asset('images/beranda.png') }}" alt="Beranda" class="w-10 h-10 mb-1">
            <span>Beranda</span>
        </a>

        {{-- Menu Katalog --}}
        <a href="{{ route('items.katalog') }}" class="flex flex-col items-center px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            <img src="{{ asset('images/katalog.png') }}" alt="Katalog" class="w-10 h-10 mb-1">
            <span>Katalog</span>
        </a>

        {{-- Menu Lapor --}}
        <a href="{{ route('lapor.index') }}" class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('lapor.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <img src="{{ asset('images/lapor.png') }}" alt="Lapor" class="w-10 h-10 mb-1">
            <span>Lapor</span>
        </a>


        {{-- Menu Komplain --}}
        <a href="{{ route('complaint.create') }}" class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('complaint.create') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <img src="{{ asset('images/komplain.png') }}" alt="Lapor" class="w-10 h-10 mb-1">
            <span>Komplain</span>
        </a>

        {{-- Menu FAQ --}}
        <a href="/faq" class="flex flex-col items-center px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            <img src="{{ asset('images/faq.png') }}" alt="Chat FAQ" class="w-10 h-10 mb-1">
            <span>FAQ</span>
        </a>

        {{-- Menu Donasi --}}
        <a href="{{ route('donation.index') }}" class="flex flex-col items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('donation.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <img src="{{ asset('images/donasi.png') }}" alt="Donasi" class="w-20 h-17 mb-1">
            <span>Donasi</span>
        </a>
    </nav>
</aside>
