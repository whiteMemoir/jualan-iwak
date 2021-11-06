<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('items')->count() == 0) {
            DB::table('items')->insert([
                [
                    'nama'   => 'Ikan Patin',
                    'commodity_id' => 2,
                    'slug'   => 'ikan-patin',

                ],

            ]);
        }
    }
}
