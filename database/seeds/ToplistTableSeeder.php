<?php

use Illuminate\Database\Seeder;
use App\Toplist;

class ToplistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toplist::create([
            'name' => 'Actress'
        ]);
    }
}
