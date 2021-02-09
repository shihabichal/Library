<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'nama' => 'Lintang',
                'email' => 'lintang@gmail.com',
                'nohp' => '08121212',
                'password' => Hash::make('123456'),
            ],
            [
                'nama' => 'Shihab',
                'email' => 'shi@gmail.com',
                'nohp' => '1212',
                'password' => Hash::make('123456'),
            ]
        ]);

    }
}
