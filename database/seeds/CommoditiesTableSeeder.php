<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('commodities')->count() == 0) {
            DB::table('commodities')->insert([
                [
                    'nama'   => 'Cumi-Cumi',
                    'slug'   => 'cumi-cumi'
                ],
                [
                    'nama'   => 'Ikan Segar',
                    'slug'   => 'ikan-segar'
                ],
                [
                    'nama'   => 'Udang',
                    'slug'   => 'udang'
                ],
                [
                    'nama'   => 'Lobster',
                    'slug'   => 'lobster'
                ],
                [
                    'nama'   => 'Ikan Kering',
                    'slug'   => 'ikan-kering'
                ]
            ]);
        }
    }
}
