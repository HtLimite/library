<?php

use App\Model\Seat;
use Illuminate\Database\Seeder;

class SeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //保存
        $seat = factory(Seat::class,1000)->create();
    }
}
