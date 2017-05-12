<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(SPSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
