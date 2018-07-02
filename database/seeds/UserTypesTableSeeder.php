<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    private $user_types = ['user','admin'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->user_types as $user_type) {
            DB::table('user_types')->insert([
                'user_type_name' => $user_type
            ]);
        }
    }
}
