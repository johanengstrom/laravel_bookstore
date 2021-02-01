<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(array(                 //Aktiverad iom Heroku
            'title' => '1984',
            'isbn' => '9745587686',
            'price' => '12.50',
            'author_id' => 2,
        ));

        // Book::factory()->count(10)->create();    //Inaktiverad iom Heroku
    }
}
