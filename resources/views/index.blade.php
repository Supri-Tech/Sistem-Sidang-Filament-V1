@extends('layouts.app')

@section('title', 'Welcome to Concertly')

@section('content')
<section class="relative bg-green-700 text-white">
    <div class="max-w-7xl mx-auto px-6 py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Website Kejaksaan Negeri</h1>
        <p class="text-lg md:text-xl mb-6">Transparansi perkara untuk masyarakat</p>
        <a href="{{ route('perkara.index') }}"
            class="px-6 py-3 bg-white text-green-700 font-semibold rounded-lg shadow hover:bg-gray-100">
            Cari Perkara
        </a>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center">
        <div class="p-6 shadow rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Visi</h3>
            <p>Mewujudkan Kejaksaan yang Profesional, Proporsional, dan Akuntabel.</p>
        </div>
        <div class="p-6 shadow rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Misi</h3>
            <p>Memberikan pelayanan hukum yang transparan dan cepat kepada masyarakat.</p>
        </div>
        <div class="p-6 shadow rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Layanan</h3>
            <p>Pencarian data perkara, pengaduan masyarakat, dan informasi publik.</p>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-center">
        <div>
            <h3 class="text-4xl font-bold text-green-700">250+</h3>
            <p class="mt-2 text-gray-600">Perkara Ditangani</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-green-700">50+</h3>
            <p class="mt-2 text-gray-600">Jaksa Aktif</p>
        </div>
        <div>
            <h3 class="text-4xl font-bold text-green-700">10+</h3>
            <p class="mt-2 text-gray-600">Layanan Publik</p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center mb-10">Berita Terbaru</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse ($berita as $item)
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h3 class="font-semibold mb-2">{{ $item->judul }}</h3>
                <p class="text-sm text-gray-600">
                    {{ Str::limit($item->isi_berita, 50, '...') }}
                </p>
                <a href="{{ route('berita.show', $item->id) }}" class="text-green-700 font-semibold text-sm mt-3 inline-block">Baca selengkapnya →</a>
            </div>
            @empty
            <p class="text-xl font-bold text-center">
                Belum ada berita
            </p>
            @endforelse
        </div>
    </div>
</section>
@endsection