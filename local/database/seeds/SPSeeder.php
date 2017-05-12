<?php

use Illuminate\Database\Seeder;

class SPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_provider')->insert([
        	'spID' => 'dsvn',
        	'name' => 'TONG CONG TY DUONG SAT VIET NAM',
            'token' => 'dsvn111111'
        ]);
    }
}
