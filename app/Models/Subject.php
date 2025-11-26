<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
        protected $fillable = [
        'judul',
        'deskripsi',
        'image', 
        'isReady',
        'harga'
    ];

    public function materials()
    {
        return $this->hasMany(Material::class, 'subject_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subject');
    }

}
