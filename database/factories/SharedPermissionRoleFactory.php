<?php

namespace Database\Factories;

use App\Models\SharedPermission;
use App\Models\SharedRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SharedPermissionRole>
 */
class SharedPermissionRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shared_role_id' => SharedRole::pluck('id')->random(),
            'shared_permission_id' => SharedPermission::pluck('id')->random()
        ];
    }
}
