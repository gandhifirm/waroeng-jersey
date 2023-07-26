<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('ligas')->insert([
        	'name' => 'Bundes Liga',
        	'country' => 'Jerman',
        	'image' => 'bundesliga.png',
        ]);

        DB::table('ligas')->insert([
        	'name' => 'Premier League',
        	'country' => 'Inggris',
        	'image' => 'premierleague.png',
        ]);

        DB::table('ligas')->insert([
        	'name' => 'La Liga',
        	'country' => 'Spanyol',
        	'image' => 'laliga.png',
        ]);

        DB::table('ligas')->insert([
        	'name' => 'Serie A',
        	'country' => 'Itali',
        	'image' => 'seriea.png',
        ]);
    }
}
