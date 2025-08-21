
@extends('layouts.app')

@section('title', 'Welcome to Concertly')

@section('content')
<section class="relative bg-green-700 text-white">
    <div class="max-w-7xl mx-auto px-6 py-12 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Pencarian Data Perkara</h1>
        <p class="text-lg">Masukkan nomor perkara untuk melihat detail</p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6">
        <form action="" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf
            <label for="nomor_perkara" class="block mb-2 font-medium">Nomor Perkara</label>
            <input
                type="text"
                id="nomor_perkara"
                name="nomor_perkara"
                class="w-full p-3 border rounded-lg mb-4"
                placeholder="Contoh: 123/Pid.B/2025/PN.JKT"
                required
            >
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
                    <p><span class="font-semibold">Nomor Perkara:</span> {{ $perkara->nomor_perkara }}</p>
                    <p><span class="font-semibold">Nama Terdakwa:</span> {{ $perkara->tersangka }}</p>
                    <p><span class="font-semibold">Jenis Perkara:</span> {{ $perkara->jenis_perkara }}</p>
                    <p><span class="font-semibold">Status:</span> {{ $perkara->status }}</p>
                @else
                    <p class="text-red-600">Data perkara tidak ditemukan.</p>
                @endif
            </div>
        @endisset
    </div>
</section>
@endsection
