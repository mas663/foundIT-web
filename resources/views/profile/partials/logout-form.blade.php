<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Logout') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Klik tombol di bawah ini untuk keluar dari sesi Anda saat ini.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" 
                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            {{ __('Logout') }}
        </button>
        
    </form>
</section>