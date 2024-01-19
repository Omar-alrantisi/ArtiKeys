<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Domains\Lookups\Models\City;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class CitiesSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $jordanCities = [
            ['name' => 'Amman', 'name_ar' => 'عمان', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Irbid', 'name_ar' => 'إربد', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Zarqa', 'name_ar' => 'الزرقاء', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Aqaba', 'name_ar' => 'العقبة', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Madaba', 'name_ar' => 'مادبا', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Karak', 'name_ar' => 'الكرك', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Balqa(Salt)', 'name_ar' => 'البلقاء (السلط)', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Jerash', 'name_ar' => 'جرش', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Mafraq', 'name_ar' => 'المفرق', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Tafilah', 'name_ar' => 'الطفيلة', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Maan', 'name_ar' => 'معان', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            ['name' => 'Ramtha', 'name_ar' => 'الرمثا', 'country_id' => 1, 'created_by_id' => 1,'updated_by_id'=>1],
            // Add more cities as needed
        ];

        // Create City records
        foreach ($jordanCities as $cityData) {
            City::create($cityData);
        }


    }
}
