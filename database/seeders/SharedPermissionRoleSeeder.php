<?php

namespace Database\Seeders;

use App\Models\SharedPermissionRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SharedPermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SharedPermissionRole::factory(10)->create();
    }
}
