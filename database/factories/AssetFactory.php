<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $assignToUser = $this->faker->randomElement([0, 1]);

        return [
            'name' => $this->faker->unique()->words(3, true),
            'asset_type_id' => AssetType::factory(),
            'user_id' => $assignToUser ? User::factory() : null,
            'user_group_id' => $assignToUser ? null : UserGroup::factory(),
        ];
    }
}
