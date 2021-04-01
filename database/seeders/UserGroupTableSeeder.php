<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Throwable;

class UserGroupTableSeeder extends Seeder
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
            
            if(UserGroup::count() >= 4) {
                dump(['UserGroup Count' => UserGroup::count()]);
            } else {
                UserGroup::factory(1)->create();
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
