<x-guest-layout>
    {{-- Container Kartu dengan Background Solid agar Teks Terbaca Jelas --}}
    <div class="p-2 sm:p-4 rounded-xl shadow-none">
        
        {{-- Header dengan Ikon --}}
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 dark:bg-green-900 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Lupa Password?</h2>
            <p class="text-sm text-gray-800 dark:text-white mt-2">Jangan khawatir, kami akan membantu Anda.</p>
        </div>

        {{-- Pesan Instruksi --}}
        <div class="mb-6 text-sm text-gray-600 dark:text-white leading-relaxed bg-blue-50 dark:bg-gray-700/50 p-4 rounded-lg border border-blue-100 dark:border-gray-600">
            {{ __('Masukkan alamat email yang Anda gunakan saat mendaftar. Kami akan mengirimkan tautan untuk membuat password baru.') }}
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Alamat Email')" class="font-semibold" />
                <x-text-input id="email" 
                    class="block mt-1 w-full px-4 py-3 rounded-lg border-gray-300 dark:text-black dark:bg-white dark:border-gray-600 focus:border-green-500 focus:ring-green-500 transition duration-200" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required autofocus 
                    placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-primary-button class="w-full justify-center py-3 text-base font-bold bg-green-600 hover:bg-green-700 active:bg-green-800 focus:ring-green-500 transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg">
                    {{ __('Kirim Tautan Reset') }}
                </x-primary-button>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center text-sm text-white hover:text-red-600 transition-colors duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke halaman Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>