<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->truncate();
        $updatedAt = \Illuminate\Support\Carbon::now();

        DB::table('currencies')->insert([
            [
                'code' => 'RUB',
                'symbol' => '₽',
                'is_main' => 0,
                'rate' => 0,
                'updated_at' => $updatedAt,
            ],
            [
                'code' => 'USD',
                'symbol' => '$',
                'is_main' => 0,
                'rate' => 0,
                'updated_at' => $updatedAt,
            ],
            [
                'code' => 'EUR',
                'symbol' => '€',
                'is_main' => 1,
                'rate' => 1,
                'updated_at' => $updatedAt,
            ],
        ]);
    }
}
