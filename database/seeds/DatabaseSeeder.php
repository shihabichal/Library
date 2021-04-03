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
        DB::table('admin')->insert([
            [
                'nama_admin' => 'Lintang',
                'email' => 'lintang@gmail.com',
                'username' => 'admin1',
                'nohp' => '08121212',
                'password' => Hash::make('admin1'),
            ],
            [
                'nama_admin' => 'Shihab',
                'email' => 'shi@gmail.com',
                'username' => 'admin2',
                'nohp' => '1212',
                'password' => Hash::make('admin2'),
            ]
        ]);
        DB::table('member')->insert([
            [
                'nama_member' => 'Member',
                'alamat' => 'Gresik',
                'nope' => '0877543',
                'gender' => 'L',
                'email' => 'member@perpustakaan.com',
                'password' => Hash::make('member'),
            ],

        ]);
    }
}
