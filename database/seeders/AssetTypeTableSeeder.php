<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Throwable;

class AssetTypeTableSeeder extends Seeder
{
    private $failures = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        
        $faker = Factory::create();

        try {
            
            if(AssetType::count() >= 10) {
                dump(['AssetType Count' => AssetType::count()]);
            } else {
                AssetType::factory(5)->create();
            }

        } catch(Throwable $e) {

            if($this->failures > 5) {
                print_r("error: " . $e->getMessage() . " Seeder Error. Failure count for current entity: " . $this->failures);
                return;
            }
            
            $this->failures++;
            $this->run();
        }
    }
}
