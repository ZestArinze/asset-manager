<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\User;
use App\Models\UserGroup;
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
            
            if(Asset::count() >= 1000) {
                dump(['Asset Count' => Asset::count()]);
            } else {

                $assetTypes = AssetType::all();
                $users = User::all();
                $userGroups = UserGroup::all();

                for($i = 0; $i < 100; $i++) {
                    
                    $assignToUser = $faker->randomElement([0, 1]);

                    Asset::factory()->create([
                        'asset_type_id' => $faker->randomElement($assetTypes)->id,
                        'user_id' => $assignToUser ? $faker->randomElement($users)->id : null,
                        'user_group_id' => $assignToUser ? null : $faker->randomElement($userGroups)->id,
                    ]);
                }
            }

        } catch(Throwable $e) {

            if($this->failures > 10) {
                print_r("error: " . $e->getMessage() . " Seeder Error. Failure count for current entity: " . $this->failures);
                return;
            }
            
            $this->failures++;
            $this->run();
        }
    }
}
