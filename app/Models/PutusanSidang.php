<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PutusanSidang extends Model
{
    use HasFactory;

    protected $table = "putusan_sidang";

    protected $fillable = [
        'id_sidang', 'isi_putusan', 'tanggal_putusan', 'file_putusan', 'status'
    ];

    protected $casts = [
        'tanggal_putusan' => 'datetime',
    ];

    public function sidang()
    {
        return $this->belongsTo(Sidang::class, 'id_sidang');
    }
}
