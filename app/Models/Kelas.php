<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'image', 
        'isReady',
        'harga'
    ];

    public function materis()
    {
        return $this->hasMany(Materi::class, 'kelas_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_kelas');
    }

}
