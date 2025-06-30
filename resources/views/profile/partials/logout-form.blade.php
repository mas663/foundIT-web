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
        <x-danger-button class="ms-3">
            {{ __('Logout') }}
        </x-danger-button>

    </form>
</section>
