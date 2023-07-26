<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name' => 'CHELSEA 3RD 2018-2019',
            'liga_id' => 2,
            'image' => 'chelsea.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'LEICESTER CITY HOME 2018-2019',
            'liga_id' => 2,
            'image' => 'leicester.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'MAN. UNITED AWAY 2018-2019',
            'liga_id' => 2,
            'image' => 'mu.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'LIVERPOOL AWAY 2018-2019',
            'liga_id' => 2,
            'image' => 'liverpool.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'TOTTENHAM 3RD 2018-2019',
            'liga_id' => 2,
            'image' => 'tottenham.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'DORTMUND AWAY 2018-2019',
            'liga_id' => 1,
            'image' => 'dortmund.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'BAYERN MUNCHEN 3RD 2018 2019',
            'liga_id' => 1,
            'image' => 'munchen.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'JUVENTUS AWAY 2018-2019',
            'liga_id' => 4,
            'image' => 'juve.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'AS ROMA HOME 2018-2019',
            'liga_id' => 4,
            'image' => 'asroma.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'AC MILAN HOME 2018 2019',
            'liga_id' => 4,
            'image' => 'acmilan.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'LAZIO HOME 2018-2019',
            'liga_id' => 4,
            'image' => 'lazio.png'
        ]);

        DB::table('products')->insert([
        	'name' => 'REAL MADRID 3RD 2018-2019',
            'liga_id' => 3,
            'image' => 'madrid.png'
        ]);
    }
}
