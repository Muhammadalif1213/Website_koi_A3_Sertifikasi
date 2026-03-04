<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>A3 KOI Farm - Jual Ikan Hias Berkualitas</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* LANGKAH 1: Membuat scroll menjadi halus */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">

    {{-- Header tidak berubah --}}
    <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img src="{{ asset('/images/logo.png') }}" alt="Logo A3 KOI Farm" class="h-10 w-auto">
                    </a>
                    <span class="ml-3 font-bold text-xl text-gray-800 dark:text-gray-200">A3 KOI Farm</span>
                </div>

                <div>
                    <a href="{{ route('login') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition-colors duration-300">
                        Login
                    </a>
                </div>
            </div>
        </nav>
    </header>


    <main>
        {{-- ======================= --}}
        {{--       HERO SECTION      --}}
        {{-- ======================= --}}
        {{-- LANGKAH 3: Menambahkan class untuk membuat section full-screen dan center --}}
        <section class="bg-blue-50 dark:bg-blue-900/20 min-h-screen flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="text-center md:text-left">
                        <h1 data-aos="fade-right" data-aos-delay="200"
                            class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">A3 KOI
                            Farm</h1>
                        <p data-aos="fade-right" data-aos-delay="300"
                            class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                            Toko A3 Koi adalah sebuah toko yang bergerak pada bidang penjualan ikan hias yang berlokasi
                            di Kota Semarang, Jawa Tengah.
                        </p>
                        <div data-aos="fade-up" data-aos-delay="400">
                            {{-- LANGKAH 4: Menghubungkan tombol ke section "Tentang Kami" --}}
                            <a href="#tentang-kami"
                                class="mt-8 inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300 shadow-lg">
                                Tentang Kami
                            </a>
                        </div>
                    </div>
                    <div>
                        <img data-aos="fade-left" data-aos-delay="200" src="{{ asset('/images/kolam.png') }}"
                            alt="Kolam Ikan Koi" class="rounded-lg shadow-2xl w-full h-auto">
                    </div>
                </div>
            </div>
        </section>

        {{-- ======================= --}}
        {{--     TENTANG KAMI SECTION --}}
        {{-- ======================= --}}
        {{-- LANGKAH 2: Memberi id pada section ini --}}
        <section id="tentang-kami" class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div data-aos="zoom-in-right" class="order-last md:order-first">
                        <img src="{{ asset('/images/ikanPlastik.png') }}" alt="Ikan Koi dalam Kemasan"
                            class="rounded-lg shadow-2xl w-full h-auto">
                    </div>
                    <div data-aos="fade-left" class="text-center md:text-left">
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white">Tentang Kami</h2>
                        <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                            Toko A3 Koi adalah toko ikan hias yang berlokasi di Semarang, Jawa Tengah, yang fokus pada
                            penjualan dan budidaya ikan koi grade A seperti Kohaku, Tancho, Showa, dan lainnya.
                        </p>
                        <p class="mt-4 text-gray-600 dark:text-gray-300 leading-relaxed">
                            Kami menyediakan berbagai ukuran ikan koi dan melayani pemesanan serta pengiriman hingga ke
                            rumah. Melalui website ini, kami menghadirkan layanan penjualan berbasis digital dengan
                            fitur chat, keranjang dan kelola stok ikan terkini, agar pelanggan lebih mudah mengakses
                            informasi dan berbelanja kapan saja, di mana saja.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- ======================= --}}
        {{--  TENTANG APLIKASI KAMI  --}}
        {{-- ======================= --}}
        <section class="bg-blue-50 dark:bg-blue-900/20 py-20 min-h-screen flex flex-col items-center justify-center text-center">
            
            {{-- Judul Section --}}
            <div data-aos="fade-down" class="mb-10 px-4">
                <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    Tentang Aplikasi Kami
                </h3>
                <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Simak video singkat berikut untuk mengenal fitur-fitur unggulan aplikasi A3 KOI Farm.
                </p>
            </div>

            {{-- Container Video --}}
            <div data-aos="zoom-in" class="w-full max-w-5xl px-4 md:px-8">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-700">
                    
                    {{-- Video Player --}}
                    <video class="w-full h-auto" controls autoplay muted loop playsinline>
                        <source src="{{ asset('/videos/tutor.webm') }}" type="video/webm">
                        Browser Anda tidak mendukung tag video.
                    </video>

                </div>
            </div>

        </section>
    </main>

    <footer class="bg-gray-800 dark:bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo A3 KOI Farm" class="h-10 w-auto">
                    <span class="ml-3 font-bold text-xl text-white">A3 KOI Farm</span>
                </div>

                <div class="flex items-center space-x-6 md:justify-center">
                    <a href="https://www.instagram.com/sakakoijogja/" target="_blank" aria-label="Instagram">
                        <x-fab-instagram class="w-8 h-8 text-gray-400 hover:text-pink-600 transition-colors duration-300" />
                    </a>

                    <a href="https://wa.me/6289604639862" target="_blank" aria-label="WhatsApp">
                        <x-fab-whatsapp class="w-8 h-8 text-gray-400 hover:text-green-500 transition-colors duration-300" />
                    </a>

                    <a href="https://www.tiktok.com/discover/ikan-koi" target="_blank" aria-label="TikTok">
                        <x-fab-tiktok class="w-8 h-8 text-gray-400 hover:text-black hover:dark:text-white transition-colors duration-300" />
                    </a>
                </div>

                <div class="flex items-center justify-center md:justify-end">
                    <a href="https://maps.app.goo.gl/UXNFkckjbg4KmpEB8"
                       target="_blank"
                       rel="noopener noreferrer"
                       title="Lihat Lokasi di Google Maps"
                       class="transform transition duration-300 hover:scale-110">

                       <div class="grid place-items-center">
                        <p class="font-bold">Ini lokasi kami</p>
                        <x-heroicon-s-map-pin class="w-8 h-8 text-red-500 hover:text-red-400 transform transition duration-300 hover:scale-110" />
                       </div>
                    </a>
                </div>
            </div>
        </div>
    </footer>   


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

</body>

</html>
