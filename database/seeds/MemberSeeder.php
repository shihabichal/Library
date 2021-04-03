<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
