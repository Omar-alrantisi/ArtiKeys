<?php

namespace Database\Seeders;

use App\Domains\Page\Models\Page;
use App\Domains\WebsiteSetting\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
            ['logo' => 1, 'favicon' => 1, 'main_color' => "#2C1376", 'created_by_id' => 1,'updated_by_id'=>1],
        ];

        // Create City records
        foreach ($pages as $page) {
            WebsiteSetting::create($page);
        }
    }
}
