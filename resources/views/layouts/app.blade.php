<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kejaksaan Tinggi Negeri Tanjung Perak')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-800">
    <header class="bg-green-700 text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-lg font-bold tracking-wide">
                <img src="<?= asset('logo.png') ?>" class="w-50" />
            </a>

            <!-- Menu -->
            <nav class="space-x-4">
                <a href="{{ route('home') }}"
                    class="hover:text-gray-200 transition">Beranda</a>
                <a href="{{ route('perkara.index') }}"
                    class="hover:text-gray-200 transition">Cari Perkara</a>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="bg-green-800 text-gray-100 mt-8">
        <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8">

            <!-- Tentang -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Tentang Kami</h3>
                <p class="text-sm leading-relaxed">
                    Kejaksaan Negeri berkomitmen untuk mewujudkan pelayanan hukum
                    yang profesional, proporsional, dan akuntabel.
                </p>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Kontak</h3>
                <ul class="space-y-2 text-sm">
                    <li>📍 Jl. Kemayoran Baru No.1, Krembangan Sel., Kec. Krembangan, Surabaya, Jawa Timur 60175</li>
                    <li>📞 (031) 3521019</li>
                    <li>✉️ kejariperak@gmail.com</li>
                </ul>
            </div>

            <!-- Link Cepat -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Link Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
                    <li><a href="{{ route('perkara.index') }}" class="hover:underline">Cari Perkara</a></li>
                    <li><a href="#" class="hover:underline">Informasi Publik</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-green-600 text-center py-4 text-sm">
            &copy; {{ date('Y') }} Kejaksaan Negeri. All Rights Reserved.
        </div>
    </footer>
</body>

</html>
