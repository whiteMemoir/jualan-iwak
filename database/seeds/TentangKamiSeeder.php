<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('tentang_kami')->count() == 0) {
            DB::table('tentang_kami')->insert([
                [
                    'judul' => 'Lautanikan',
                    'deskripsi' => 'LautanIkan.com adalah website penjualan hasil laut secara online maupun offline. Kami juga menjalin kerja sama dengan banyak nelayan sehingga dipastikan komoditas yang kami jual adalah yang terbaik.'
                ],
                [
                    'judul' => 'Legalitas',
                    'deskripsi' => 'Tentunya kami memiliki legalitas atas hasil laut yang kami dapatkan.'
                ],
                [
                    'judul' => 'Cara Kerja',
                    'deskripsi' => 'Kami memberikan perantara antara nelayan dan pembeli.'
                ]
            ]);
        }
    }
}
