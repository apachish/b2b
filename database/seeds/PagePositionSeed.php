<?php

use App\PagePosition;
use Illuminate\Database\Seeder;

class PagePositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
            ['id' => 1, 'name' => 'Home'],
            ['id' => 2, 'name' => 'Main Category'],
            ['id' => 3, 'name' => 'Category'],
            ['id' => 4, 'name' => 'Sub Category'],
            ['id' => 5, 'name' => 'Sub Sub Category'],
            ['id' => 6, 'name' => 'Lead'],
            ['id' => 7, 'name' => 'Search'],
            ['id' => 8, 'name' => 'Articles'],
            ['id' => 9, 'name' => 'Testimonial'],
            ['id' => 10, 'name' => 'in help'],
            ['id' => 11, 'name' => 'in contactUs'],
            ['id' => 12, 'name' => 'pages'],
        ];
        foreach (array_chunk($pages, 250) as $set) {
            PagePosition::insert($set);
        }
    }
}

