<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hakim extends Model
{
    use HasFactory;

    protected $table = "hakim";

    protected $fillable = [
        'nama',
        'jabatan',
        'NIP',
    ];

    public function sidangKetua()
    {
        return $this->hasMany(Sidang::class, 'id_hakim_ketua');
    }

    public function sidangAnggota1()
    {
        return $this->hasMany(Sidang::class, 'id_hakim_anggota_1');
    }

    public function sidangAnggota2()
    {
        return $this->hasMany(Sidang::class, 'id_hakim_anggota_2');
    }

    public function sidangPanitera()
    {
        return $this->hasMany(Sidang::class, 'id_panitera');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_hakim');
    }
}
