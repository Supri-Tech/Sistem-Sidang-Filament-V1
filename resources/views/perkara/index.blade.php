@extends('layouts.app')

@section('title', 'Cari Perkara')

@section('content')
<section class="relative bg-green-700 text-white">
    <div class="max-w-7xl mx-auto px-6 py-12 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Pencarian Data Perkara</h1>
        <p class="text-lg">Masukkan nomor perkara untuk melihat detail</p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6">
        <form action="{{ route('perkara.search') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            <label for="nomor_perkara" class="block mb-2 font-medium">Nomor Perkara</label>
            <input
                type="text"
                id="nomor_perkara"
                name="no_perkara"
                class="w-full p-3 border rounded-lg mb-4"
                value="{{ old('no_perkara', $search ?? '') }}"
                placeholder="Contoh: 123/Pid.B/2025/PN.JKT"
                required>
            <button
                type="submit"
                class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800">
                Cari
            </button>
        </form>

        @isset($perkara)
        <div class="mt-6 bg-white p-6 rounded-lg shadow">
            @if($perkara)
            <h2 class="text-xl font-bold mb-4">Detail Perkara</h2>
            <p><span class="font-semibold">Nomor Perkara:</span> {{ $perkara->no_perkara }}</p>
            <p><span class="font-semibold">Nama Terdakwa:</span> {{ $perkara->terdakwa }}</p>
            <p><span class="font-semibold">Nama Korban:</span> {{ $perkara->korban }}</p>
            <p><span class="font-semibold">Jenis Perkara:</span> {{ $perkara->jenis_perkara }}</p>
            <p><span class="font-semibold">Status:</span> {{ $perkara->status }}</p>

            <div class="mt-4">
                <a href="{{ route('perkara.show', $perkara->id) }}"
                    class="bg-green-700 text-white p-3 rounded-lg font-semibold hover:bg-green-800">
                    Lihat Detail Lengkap
                </a>
            </div>
            @else
            <p class="text-red-600">Data perkara tidak ditemukan.</p>
            @if(isset($search))
            <p class="text-gray-600 mt-2">Nomor yang dicari: {{ $search_term }}</p>
            @endif
            @endif
        </div>
        @endisset
    </div>
</section>
@endsection