@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
        <p class="text-sm text-gray-500 mb-6">
            Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}
        </p>
        <div class="prose max-w-none text-gray-800">
            {!! nl2br(e($berita->isi_berita)) !!}
        </div>
        <div class="mt-10">
            <a href="{{ url()->previous() }}" class="text-green-700 font-semibold">&larr; Kembali</a>
        </div>
    </div>
</section>
@endsection