<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserGroup;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Throwable;

class UserTableSeeder extends Seeder
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
            
            if(User::count() >= 10) {
                dump(['User Count' => User::count()]);
            } else {

                $userGroups = UserGroup::all();

                for($i = 0; $i < 10; $i++) {
                    User::factory(2)->create([
                        'user_group_id' => $faker->randomElement($userGroups)->id,
                    ]);
                }
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
