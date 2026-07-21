<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view admin dashboard', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage products', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage categories', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage brands', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage orders', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage users', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage media', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage settings', 'guard_name' => 'web']);
        Permission::create(['name' => 'view customer dashboard', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage own orders', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage wishlist', 'guard_name' => 'web']);

        // Create admin role with all permissions
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        // Create customer role with limited permissions
        $customer = Role::create(['name' => 'customer', 'guard_name' => 'web']);
        $customer->givePermissionTo([
            'view customer dashboard',
            'manage own orders',
            'manage wishlist',
        ]);

        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole('admin');

        // Create customer user
        $customerUser = User::create([
            'name' => 'Customer User',
            'email' => 'customer@mail.com',
            'password' => bcrypt('customer123'),
            'email_verified_at' => now(),
        ]);
        $customerUser->assignRole('customer');
    }
}
