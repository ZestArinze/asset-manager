<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Note that the order matters due to dependencies
            AssetTypeTableSeeder::class,
            UserGroupTableSeeder::class,
            UserTableSeeder::class,
            AssetTableSeeder::class,
        ]);
    }
}
