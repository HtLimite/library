<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //添加一个测试管理员账号
        DB::table('admin')->insert([
            'account' => '1445919044',
            'password' => 'w1445919044',
            'is_login' => 0
        ]);
    }
}
