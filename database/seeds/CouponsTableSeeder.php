<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    private $coupons = [
        'none' => '0',
        'low' => '5',
        'medium' => '7',
        'hight' => '10',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->coupons as $key=>$coupon) {
            DB::table('coupons')->insert([
                'coupon_name'=> $key,
                'coupon_val' => $coupon,
            ]);
        }
    }
}
