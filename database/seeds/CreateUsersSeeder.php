<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@kominfo.go.id',
                'phone' => '0',
                'is_admin' => '1',
                'address' => 'Karangayu RT 06 RW 03',
                'nim' => 'A12.2016.05622',
                'jenis_kelamin' => 'L',
                'asal_sekolah' => 'Universitas Dian Nuswantoro',
                'jurusan' => 'Sistem Informasi',
                'semester' => '6',
                'created_by' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Ilham Efo Hernanda',
                'email' => 'user@kominfo.go.id',
                'is_admin' => '0',
                'address' => 'Karangayu RT 06 RW 03',
                'nim' => 'A12.2016.05622',
                'jenis_kelamin' => 'L',
                'asal_sekolah' => 'Universitas Dian Nuswantoro',
                'jurusan' => 'Sistem Informasi',
                'semester' => '6',
                'phone' => '0',
                'created_by' => '1',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
