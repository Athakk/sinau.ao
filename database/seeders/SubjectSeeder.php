<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'id' => 1, 
                'judul' => 'Belajar Laravel 11 (WPU)', 
                'deskripsi' => 'Seri tutorial lengkap belajar Framework Laravel 11 untuk pemula dari channel Web Programming Unpas.', 
                'isReady' => '1',
                'harga' => '99000'
            ],
        ];

        $materials = [
            [
                'judul' => '1. Intro Laravel 11',
                'deskripsi' => 'Pengenalan apa itu Laravel 11 dan fitur-fitur barunya.',
                'link_video' => 'https://www.youtube.com/watch?v=T1TR-RGf2Pw',
                'subject_id' => 1
            ],
            [
                'judul' => '2. Installation & Configuration',
                'deskripsi' => 'Cara instalasi Laravel 11 dan konfigurasi awal di komputer lokal.',
                'link_video' => 'https://www.youtube.com/watch?v=nW60yGRoUrs',
                'subject_id' => 1
            ],
            [
                'judul' => '3. Folder Structure',
                'deskripsi' => 'Memahami struktur folder baru pada Laravel 11 yang lebih ringkas.',
                'link_video' => 'https://www.youtube.com/watch?v=x55ndgkD2QI',
                'subject_id' => 1
            ],
            [
                'judul' => '6. View Data',
                'deskripsi' => 'Cara mengirimkan data dari Controller ke View.',
                'link_video' => 'https://www.youtube.com/watch?v=76YsC4EjGE4',
                'subject_id' => 1
            ],
            [
                'judul' => '9. Eloquent ORM & Post Model',
                'deskripsi' => 'Belajar menggunakan Eloquent ORM untuk interaksi database.',
                'link_video' => 'https://www.youtube.com/watch?v=dW3-33iMYkk',
                'subject_id' => 1
            ],
            [
                'judul' => '10. Model Factories',
                'deskripsi' => 'Membuat data dummy otomatis menggunakan Model Factories.',
                'link_video' => 'https://www.youtube.com/watch?v=1wWXyO4iuBA',
                'subject_id' => 1
            ],
            [
                'judul' => '12. Post Category',
                'deskripsi' => 'Membuat fitur kategori postingan dengan relasi database.',
                'link_video' => 'https://www.youtube.com/watch?v=jineNX34OYE',
                'subject_id' => 1
            ],
            [
                'judul' => '14. N + 1 Problem',
                'deskripsi' => 'Memahami dan memperbaiki masalah performa N+1 Query.',
                'link_video' => 'https://www.youtube.com/watch?v=K2p6Mtz5P20',
                'subject_id' => 1
            ],
            [
                'judul' => '15. Redesign UI',
                'deskripsi' => 'Mempercantik tampilan aplikasi menggunakan Tailwind CSS / Flowbite.',
                'link_video' => 'https://www.youtube.com/watch?v=uVRN9DzUAU8',
                'subject_id' => 1
            ],
            [
                'judul' => '17. Pagination',
                'deskripsi' => 'Membuat fitur halaman (pagination) otomatis.',
                'link_video' => 'https://www.youtube.com/watch?v=HP3CdxX9oak',
                'subject_id' => 1
            ],
        ];

        foreach ($subjects as $value) {
            Subject::create($value);
        }

        foreach ($materials as $value) {
            Material::create($value);
        }
    }
}