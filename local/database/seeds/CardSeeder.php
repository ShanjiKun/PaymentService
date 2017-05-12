<?php

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card')->insert([
        	'cardID' => '11111111',
        	'accountHolder' => 'HUYNH TON VINH',
        	'balance' => 10000000,
        	'bankID' => 'vib'
        ]);

        DB::table('card')->insert([
        	'cardID' => '22222222',
        	'accountHolder' => 'BUI THI HUYEN',
        	'balance' => 10000000,
        	'bankID' => 'vcb'
        ]);

        DB::table('card')->insert([
        	'cardID' => '33333333',
        	'accountHolder' => 'HUYNH TON VINH',
        	'balance' => 100000,
        	'bankID' => 'acb'
        ]);

        DB::table('card')->insert([
        	'cardID' => '44444444',
        	'accountHolder' => 'BUI THI HUYEN',
        	'balance' => 100000,
        	'bankID' => 'agb'
        ]);
    }
}
