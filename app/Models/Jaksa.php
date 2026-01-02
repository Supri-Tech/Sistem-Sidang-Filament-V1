<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaksa extends Model
{
    use HasFactory;

    protected $table = "jaksa";

    protected $fillable = [
        'nama',
        'jabatan',
        'NIP',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_jaksa');
    }

    public function sidang()
    {
        return $this->hasMany(Sidang::class, 'id_jaksa');
    }
}
