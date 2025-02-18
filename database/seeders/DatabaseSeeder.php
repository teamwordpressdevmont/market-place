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
        $tradepersonRole = Role::create(['name' => 'tradeperson']);

        // Permissions create karte hain
        $viewAdmin = Permission::create(['name' => 'view admin']);
        $viewCustomer = Permission::create(['name' => 'view customer']);
        $viewTradeperson = Permission::create(['name' => 'view tradeperson']);

        // Har role ko sirf uski permission assign karte hain
        $adminRole->givePermissionTo($viewAdmin);
        $customerRole->givePermissionTo($viewCustomer);
        $tradepersonRole->givePermissionTo($viewTradeperson);

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

        $tradeperson = User::create([
            'name' => 'Tradeperson',
            'email' => 'tradeperson@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $tradeperson->assignRole($tradepersonRole);
    }
}
