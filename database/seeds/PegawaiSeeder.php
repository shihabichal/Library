<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            'nama'=>'lintang',
            'alamat'=>'lintang',
            'nope'=>'0823123',
            'jabatan'=>'HRD',
            'gaji'=>300000,
        ]);
    }
}
