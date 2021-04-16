<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'William Jhosua',
            'email' => 'william11@gmail.com',
            'password' => Hash::make('william'),
        ]);

        DB::table('students')->insert([
            'NISN'      => '1289182',
            'nama'      => 'Rendi firmansyah',
            'kelas'     => 'X',
            'jurusan'   => 'RPL',
            'email'     => 'Renfir@gmail.com',
            'alamat'    => '',
            'no_telp'   => '',
            'gambar'    => 'NULL'
        ]);

        DB::table('students')->insert([
            'NISN'      => '1829381',
            'nama'      => 'Sanjaya Putra',
            'kelas'     => 'XI',
            'jurusan'   => 'TKJ',
            'email'     => 'Sanjaya@gmail.com',
            'alamat'    => '',
            'no_telp'   => '',
            'gambar'    => 'NULL'
        ]);

        DB::table('students')->insert([
            'NISN'      => '1289391',
            'nama'      => 'Hilman alamsyah',
            'kelas'     => 'XII',
            'jurusan'   => 'BDP',
            'email'     => 'helman@gmail.com',
            'alamat'    => '',
            'no_telp'   => '',
            'gambar'    => 'NULL'
        ]);
        // $this->call(UserSeeder::class);
    }
}
