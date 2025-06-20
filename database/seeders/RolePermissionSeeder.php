<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'view inventory',
            'create purchase',
            'delete supplier',
            'manage users',
            'assign roles',
        ];


        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $staff = Role::firstOrCreate(['name' => 'staff']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $admin->syncPermissions(Permission::all());
        $staff->syncPermissions([
            'view inventory',
            'create purchase',
        ]);
        $manager->syncPermissions([
            'view inventory',
            'manage users',
        ]);
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
