<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tax_rates')->insert([
            ['rate' => 0.1, 'remarks' => '通常の税率'],
            ['rate' => 0.08, 'remarks' => '軽減税率'],
        ]);
    }
}
