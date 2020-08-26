<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Brand;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        



    }
}
