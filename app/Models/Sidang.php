<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    use HasFactory;

    protected $table = "sidang";

    protected $fillable = [
        'nama',
        'id_perkara',
        'id_hakim_ketua',
        'id_hakim_anggota_1',
        'id_hakim_anggota_2',
        'id_panitera',
        'ruang_sidang',
        'waktu_sidang',
        'status',
    ];

    protected $casts = [
        'waktu_sidang' => 'datetime',
    ];

    public function perkara()
    {
        return $this->belongsTo(Perkara::class, 'id_perkara');
    }

    public function hakim()
    {
        return $this->belongsTo(Hakim::class, 'id_hakim_ketua');
    }

    public function hakimAnggota1()
    {
        return $this->belongsTo(Hakim::class, 'id_hakim_anggota_1');
    }

    public function hakimAnggota2()
    {
        return $this->belongsTo(Hakim::class, 'id_hakim_anggota_2');
    }

    public function hakimPanitera()
    {
        return $this->belongsTo(Hakim::class, 'id_panitera');
    }

    public function agendaSidangs()
    {
        return $this->hasMany(AgendaSidang::class, 'id_sidang');
    }

    public function putusan()
    {
        return $this->hasOne(PutusanSidang::class, 'id_sidang');
    }

    public function dokumenSidang()
    {
        return $this->hasMany(DokumenSidang::class, 'id_sidang');
    }
}
