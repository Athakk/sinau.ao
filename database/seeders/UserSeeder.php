<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = 
        [
            [ 'id' => 1, 'name' => 'Administrator', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin123'),'whatsapp' => '01234567890','level' => 'admin', 'avatar' => '-']
        ];

        foreach ($data as $value) {
            User::create($value);
        }
    }
}
