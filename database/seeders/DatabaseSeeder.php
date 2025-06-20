<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        // User::factory()->withPersonalTeam()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     RolePermissionSeeder::class,
        // ]);
        // $user = User::find(1);
        // $user->assignRole('admin');
        //   $user = User::find(1);
        //  $user->syncPermissions(Permission::all());

        // $user = User::find(2);
        // $user->assignRole('staff');
        // $user->syncPermissions([
        //     'view inventory',
        //     'create purchase',
        // ]);
    }
}
