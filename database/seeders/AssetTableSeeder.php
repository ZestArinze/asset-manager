<?php

namespace Database\Seeders;

use App\Models\Asset;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Throwable;

class AssetTableSeeder extends Seeder
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
            
            if(Asset::count() >= 100) {
                dump(['Asset Count' => Asset::count()]);
            } else {
                Asset::factory(10)->create();
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
