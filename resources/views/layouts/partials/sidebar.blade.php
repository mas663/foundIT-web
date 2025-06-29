<aside class="w-64 bg-gray-900 p-6 border-r border-gray-700 h-screen sticky top-0">
    <div class="flex items-center space-x-2 mb-10">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold focus:outline-none">
            <img src="{{ asset('images/logo.png') }}" alt="FOUNDit Logo" class="w-auto h-8">
        </a>
    </div>

    <nav class="space-y-4">
        {{-- Menu Beranda --}}
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <span>Beranda</span>
        </a>

        {{-- Menu Katalog --}}
        <a href="#" class="flex items-center space-x-4 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM5 11a1 1 0 100 2h4a1 1 0 100-2H5z"></path></svg>
            <span>Katalog</span>
        </a>

        {{-- Menu Lapor --}}
        <a href="{{ route('complaint.create') }}" class="flex items-center space-x-4 px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('complaint.create') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
            <span>Lapor</span>
        </a>

        {{-- Menu Pesan --}}
        <a href="/faq" class="flex items-center space-x-4 px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
            <span>Chat FAQ</span>
        </a>

        {{-- Menu Donasi --}}
        <a href="{{ route('donation.index') }}" class="flex items-center space-x-4 px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('donation.index') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            <span>Donasi</span>
        </a>
    </nav>
</aside>
