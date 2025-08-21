<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    use HasFactory;

    protected $table = "perkara";

    protected $fillable = [
        'no_perkara',
        'jenis_perkara',
        'terdakwa',
        'korban',
        'status_perkara',
    ];

    public function sidang()
    {
        return $this->hasMany(Sidang::class, 'id_perkara');
    }
}
