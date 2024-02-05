<?php

namespace Database\Seeders;

use App\Domains\Lookups\Models\City;
use App\Domains\Page\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ['title' => 'Help&Support', 'description' => 'Help&Support description', 'slug' => "help-support", 'created_by_id' => 1,'updated_by_id'=>1],
            ['title' => 'Terms&Conditions', 'description' => 'Terms&Conditions description', 'slug' => "terms-conditions", 'created_by_id' => 1,'updated_by_id'=>1],
        ];

        // Create City records
        foreach ($pages as $page) {
            Page::create($page);
        }

    }
}
