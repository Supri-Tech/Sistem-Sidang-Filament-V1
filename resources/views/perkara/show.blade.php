@extends('layouts.app')

@section('title', 'Detail Perkara - ' . $perkara->no_perkara)

@section('content')
<section class="relative bg-green-700 text-white">
    <div class="max-w-7xl mx-auto px-6 py-12 text-center">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Detail Data Perkara</h1>
        <p class="text-lg">Informasi lengkap mengenai perkara</p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('perkara.index') }}"
                class="inline-flex items-center text-green-700 hover:text-green-800 font-semibold">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Pencarian
            </a>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
            <!-- Header -->
            <div class="bg-green-700 text-white px-6 py-4">
                <h2 class="text-2xl font-bold">Perkara: {{ $perkara->no_perkara }}</h2>
                <p class="text-green-100">{{ $perkara->jenis_perkara }}</p>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Basic Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold text-green-800 mb-4">Informasi Dasar</h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-gray-700">Nomor Perkara:</span>
                                <p class="text-gray-900">{{ $perkara->no_perkara }}</p>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Jenis Perkara:</span>
                                <p class="text-gray-900">{{ $perkara->jenis_perkara }}</p>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Status:</span>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                    {{ $perkara->status }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-green-800 mb-4">Pihak yang Terlibat</h3>
                        <div class="space-y-3">
                            <div>
                                <span class="font-medium text-gray-700">Terdakwa:</span>
                                <p class="text-gray-900">{{ $perkara->terdakwa }}</p>
                                <p class="text-sm text-gray-600">Email: {{ $perkara->email_terdakwa }}</p>
                                <p class="text-sm text-gray-600">WA: {{ $perkara->wa_terdakwa }}</p>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Korban:</span>
                                <p class="text-gray-900">{{ $perkara->korban }}</p>
                                <p class="text-sm text-gray-600">Email: {{ $perkara->email_korban }}</p>
                                <p class="text-sm text-gray-600">WA: {{ $perkara->wa_korban }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidang Section -->
        @if($perkara->sidang->count() > 0)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-green-700 text-white px-6 py-4">
                <h2 class="text-2xl font-bold">Jadwal Sidang</h2>
                <p class="text-green-100">Daftar sidang untuk perkara ini</p>
            </div>

            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Ruang Sidang</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Waktu Sidang</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Status</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Hakim Ketua</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Jaksa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($perkara->sidang as $sidang)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $sidang->ruang_sidang }}</td>
                                <td class="px-4 py-3">
                                    {{ $sidang->waktu_sidang->format('d F Y H:i') }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                    $statusColors = [
                                    'terjadwal' => 'bg-blue-100 text-blue-800',
                                    'ditunda' => 'bg-yellow-100 text-yellow-800',
                                    'selesai' => 'bg-green-100 text-green-800',
                                    'batal' => 'bg-red-100 text-red-800'
                                    ];
                                    $color = $statusColors[$sidang->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $color }}">
                                        {{ ucfirst($sidang->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    {{ $sidang->hakim->nama ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $sidang->jaksa->nama ?? 'N/A' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Detailed Sidang Information -->
                @foreach($perkara->sidang as $sidang)
                <div class="mt-8 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800 mb-4">
                        Detail Sidang: {{ $sidang->ruang_sidang }} -
                        {{ $sidang->waktu_sidang->format('d F Y H:i') }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">Majelis Hakim</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium">Ketua:</span> {{ $sidang->hakim->nama ?? 'N/A' }}</p>
                                <p><span class="font-medium">Anggota 1:</span> {{ $sidang->hakimAnggota1->nama ?? 'N/A' }}</p>
                                <p><span class="font-medium">Anggota 2:</span> {{ $sidang->hakimAnggota2->nama ?? 'N/A' }}</p>
                                <p><span class="font-medium">Panitera:</span> {{ $sidang->hakimPanitera->nama ?? 'N/A' }}</p>

                                <p class="pt-2 border-t">
                                    <span class="font-medium">Jaksa Penuntut Umum:</span>
                                    {{ $sidang->jaksa->nama ?? 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700 mb-3">Informasi Sidang</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium">Status:</span>
                                    @php
                                    $color = $statusColors[$sidang->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="px-2 py-1 rounded text-sm {{ $color }}">
                                        {{ ucfirst($sidang->status) }}
                                    </span>
                                </p>
                                <p><span class="font-medium">Waktu:</span> {{ $sidang->waktu_sidang->format('d F Y H:i') }}</p>
                                <p><span class="font-medium">Ruang:</span> {{ $sidang->ruang_sidang }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <p class="text-gray-600">Belum ada jadwal sidang untuk perkara ini.</p>
        </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-wrap gap-4 pt-8">
            <a href="{{ route('perkara.index') }}"
                class="px-6 py-2 border border-green-600 text-green-700 rounded-lg hover:bg-green-50 font-semibold">
                Kembali ke Pencarian
            </a>
            <button onclick="window.print()"
                class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 font-semibold">
                Cetak Detail
            </button>
        </div>
    </div>
</section>

<style>
    @media print {
        .bg-green-700 {
            background-color: #047857 !important;
            -webkit-print-color-adjust: exact;
        }

        .text-white {
            color: white !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>
@endsection
