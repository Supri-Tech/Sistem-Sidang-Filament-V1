<x-mail::message>
# Pemberitahuan Jadwal Sidang

Halo,
Berikut adalah detail sidang yang telah dijadwalkan:

- **No Perkara:** {{ $sidang->perkara->no_perkara }}
- **Jenis Perkara:** {{ $sidang->perkara->jenis_perkara }}
- **Terdakwa:** {{ $sidang->perkara->terdakwa }}
- **Korban:** {{ $sidang->perkara->korban }}
- **Ruang Sidang:** {{ $sidang->ruang_sidang }}
- **Waktu Sidang:** {{ $sidang->waktu_sidang->format('d M Y H:i') }}

<x-mail::button :url=" route('perkara.show', $sidang->perkara->id) ">
    Lihat Detail di Sistem
</x-mail::button>

Mohon hadir tepat waktu sesuai jadwal.
Jika ada perubahan, kami akan segera menghubungi Anda.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
