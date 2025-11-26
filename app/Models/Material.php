<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'link_video',
        'subject_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Kelas::class, 'subject_id', 'id');
    }
}
