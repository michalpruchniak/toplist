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
            'name' => 'Actress',
            'slug' => 'actress',
            'cover' => 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Gal_Gadot_by_Gage_Skidmore_2.jpg'
        ]);
    }
}
