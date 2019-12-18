<?php

use Illuminate\Database\Seeder;
use App\ToplistElements;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToplistElements::create([
            'toplist_id' => 1,
            'name' => 'Angelina Jolie',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Angelina_Jolie_%2848462859552%29.jpg/800px-Angelina_Jolie_%2848462859552%29.jpg'
        ]);
        ToplistElements::create([
            'toplist_id' => 1,
            'name' => 'Gal Gadot',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Gal_Gadot_by_Gage_Skidmore_2.jpg'
        ]);
        ToplistElements::create([
            'toplist_id' => 1,
            'name' => 'Keira Knightley',
            'photo' => 'https://www.rmf.fm/_files/Upload/Images/wenecja1307.jpg'
        ]);
        ToplistElements::create([
            'toplist_id' => 1,
            'name' => 'Emma Watson',
            'photo' => 'https://vignette.wikia.nocookie.net/harrypotter/images/3/38/Emma-watson-photo.jpg/revision/latest?cb=20160311110514&path-prefix=pl'
        ]);
    }
}
