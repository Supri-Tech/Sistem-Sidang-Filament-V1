<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaSidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sidang',
        'judul_agenda',
        'deskripsi',
        'urutan',
        'waktu_mulai',
        'waktu_selesai',
        'status_agenda'
    ];

    public function sidang()
    {
        return $this->belongsTo(Sidang::class, 'id_sidang');
    }
}
