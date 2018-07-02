<?php

use Illuminate\Database\Seeder;

class StoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert([
            'storage_name' => 'Главный склад',
        ]);
    }
}
