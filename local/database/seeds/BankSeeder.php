<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
        	'bankID' => 'vib',
        	'name' => 'VietinBank'
        ]);

        DB::table('bank')->insert([
        	'bankID' => 'vcb',
        	'name' => 'Vietcombank'
        ]);

        DB::table('bank')->insert([
        	'bankID' => 'acb',
        	'name' => 'ACB'
        ]);

        DB::table('bank')->insert([
        	'bankID' => 'agb',
        	'name' => 'Agribank'
        ]);
    }
}
