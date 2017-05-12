<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert([
        	'tranID' => 'sk'.time(),
        	'cardID' => '11111111',
        	'spID' => 'dsvn',
        	'billID' => '1',
        	'charges' => 100000
        ]);
    }
}
