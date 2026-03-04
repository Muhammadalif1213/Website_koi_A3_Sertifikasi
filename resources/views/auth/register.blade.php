<x-guest-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex flex-col items-center mb-6">
        <a href="/">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo Toko Koi A3" class="w-20 h-20 object-contain">
        </a>
        <h2 class="text-2xl font-bold text-white mt-2">TOKO KOI A3</h2>
    </div>

    <h3 class="text-xl font-semibold text-white-custom text-center-custom mb-4">Registrasi</h3>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!--username -->
        <div class="mb-custom">
            <label for="name" class="block text-sm font-medium text-white-custom">{{ __('Name') }}</label>
            <x-text-input id="name" class="block mt-1 w-full form-input" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
                <x-input-label for="email" :value="__('Alamat Email')" class="block text-sm font-medium text-white-custom" />
                <x-text-input id="email" class="block mt-1 w-full form-input" 
                type="email" name="email" :value="old('email')" required autocomplete="email"/>
            </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-white-custom" />

            {{-- Tambahkan ID spesifik dan border transition --}}
            <x-text-input id="password" 
                class="block mt-1 w-full form-input transition-colors duration-300 border-2" 
                type="password" name="password" required autocomplete="new-password" />

            {{-- INDIKATOR VALIDASI REAL-TIME --}}
            <div class="mt-2 text-xs bg-black bg-opacity-30 p-2 rounded-md">
                <p class="text-gray-300 mb-1 font-semibold">Syarat Password:</p>
                <ul class="space-y-1">
                    <li id="rule-length" class="text-gray-400 flex items-center transition-colors duration-300">
                        <span class="icon mr-2">⚪</span> Minimal 6 karakter
                    </li>
                    <li id="rule-number" class="text-gray-400 flex items-center transition-colors duration-300">
                        <span class="icon mr-2">⚪</span> Mengandung angka
                    </li>
                </ul>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                class="block text-sm font-medium text-white-custom" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full form-input" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="btn-primary">
            {{ __('Register') }}
        </x-primary-button>


        <div class="mt-8 text-center-custom">
            <p class="text-sm-custom text-white-custom">
                {{ __('Sudah Memiliki Akun?') }}
                <a href="{{ route('login') }}" class="font-bold text-white-custom hover:underline-custom">
                    {{ __('Login di sini') }}
                </a>
            </p>
        </div>
    </form>

    <script>
        // --- 1. LOGIKA VALIDASI PASSWORD ---
        const passwordInput = document.getElementById('password');
        const ruleLength = document.getElementById('rule-length');
        const ruleNumber = document.getElementById('rule-number');

        // Fungsi bantu ubah status (Hijau/Merah/Abu)
        function updateStatus(element, isValid, isTyping) {
            const icon = element.querySelector('.icon');
            
            if (isValid) {
                // Jika Benar: Warna Hijau
                element.classList.remove('text-gray-400', 'text-red-500');
                element.classList.add('text-green-500', 'font-bold');
                icon.innerText = '✅';
            } else if (isTyping && !isValid) {
                // Jika Salah (sedang mengetik tapi belum pas): Warna Merah
                element.classList.remove('text-gray-400', 'text-green-500');
                element.classList.add('text-red-500');
                icon.innerText = '❌';
            } else {
                // Default (Kosong/Belum disentuh): Warna Abu-abu
                element.classList.remove('text-green-500', 'text-red-500', 'font-bold');
                element.classList.add('text-gray-400');
                icon.innerText = '⚪';
            }
        }

        // Listener saat user mengetik
        passwordInput.addEventListener('input', function() {
            const value = this.value;
            const isTyping = value.length > 0;

            // 1. Cek Minimal 6 Karakter
            const isLengthValid = value.length >= 6;
            updateStatus(ruleLength, isLengthValid, isTyping);

            // 2. Cek Mengandung Angka (Regex)
            const isNumberValid = /\d/.test(value); // \d artinya digit (0-9)
            updateStatus(ruleNumber, isNumberValid, isTyping);

            // Ubah Border Input
            if (isLengthValid && isNumberValid) {
                this.classList.remove('border-red-500', 'border-gray-300');
                this.classList.add('border-green-500', 'ring-green-500'); // Hijau jika semua oke
            } else if (isTyping) {
                this.classList.remove('border-gray-300', 'border-green-500');
                this.classList.add('border-red-500'); // Merah jika ada yg salah
            } else {
                this.classList.remove('border-red-500', 'border-green-500');
                this.classList.add('border-gray-300'); // Reset
            }
        });

        // --- 2. LOGIKA POPUP ERROR (SweetAlert) ---
        @if ($errors->any())
            let errorMessage = '';
            @foreach ($errors->all() as $error)
                @if(str_contains($error, 'taken') || str_contains($error, 'terdaftar'))
                    errorMessage += 'Email ini sudah terdaftar! Silakan login atau gunakan email lain.<br>';
                @else
                    errorMessage += '{{ $error }}<br>';
                @endif
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Gagal Mendaftar',
                html: errorMessage,
                confirmButtonText: 'Coba Lagi',
                confirmButtonColor: '#16a34a'
            });
        @endif
    </script>
</x-guest-layout>
