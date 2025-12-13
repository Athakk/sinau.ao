<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function embedUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                $url = $this->link_video;

                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);

                if (isset($matches[1])) {
                    return 'https://www.youtube.com/embed/' . $matches[1];
                }

                return $url; 
            }
        );
    }

    public function subject()
    {
        return $this->belongsTo(subject::class, 'subject_id', 'id');
    }
}
