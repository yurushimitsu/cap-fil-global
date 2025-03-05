<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FullypaidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fullypaid')->insert([
            'batchNo'=> '1',
            'subscriber'=> 'Jeddy Manalili',
            'accountNo'=> '202220041',
            'amount'=> '2000.00',
            'schedule'=> date('Y-m-d H:i:s'),
            'office'=> 'Manila',
        ]);
    }
}
