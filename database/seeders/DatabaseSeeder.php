<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pehle roles create karte hain
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);
        $contractorRole = Role::create(['name' => 'contractor']);

        // Permissions create karte hain
        $viewAdmin = Permission::create(['name' => 'view admin']);
        $viewCustomer = Permission::create(['name' => 'view customer']);
        $viewContractor = Permission::create(['name' => 'view contractor']);

        // Har role ko sirf uski permission assign karte hain
        $adminRole->givePermissionTo($viewAdmin);
        $customerRole->givePermissionTo($viewCustomer);
        $contractorRole->givePermissionTo($viewContractor);

        // Teen users create karte hain aur unko roles assign karte hain
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $customer->assignRole($customerRole);

        $contractor = User::create([
            'name' => 'Contractor',
            'email' => 'contractor@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $contractor->assignRole($contractorRole);
    }
}
