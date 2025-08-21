<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perkara',
        'nama_dokumen',
        'tipe',
        'file_path',
        'uploaded_at'
    ];

    public function sidang()
    {
        return $this->belongsTo(Sidang::class, 'id_sidang');
    }
}
