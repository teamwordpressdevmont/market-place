<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\OrderStatus;
use App\Models\PaymentStatus;
use App\Models\ProposalStatus;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        
        // $adminRole = Role::create(['name' => 'admin']);
        // $customerRole = Role::create(['name' => 'customer']);
        // $tradepersonRole = Role::create(['name' => 'tradeperson']);

        
        // $viewAdmin = Permission::create(['name' => 'view admin']);
        // $viewCustomer = Permission::create(['name' => 'view customer']);
        // $viewTradeperson = Permission::create(['name' => 'view tradeperson']);

        
        // $adminRole->givePermissionTo($viewAdmin);
        // $customerRole->givePermissionTo($viewCustomer);
        // $tradepersonRole->givePermissionTo($viewTradeperson);

        
        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mailinator.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $admin->assignRole($adminRole);

        // $customer = User::create([
        //     'name' => 'Customer',
        //     'email' => 'customer@mailinator.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $customer->assignRole($customerRole);

        // $tradeperson = User::create([
        //     'name' => 'Tradeperson',
        //     'email' => 'tradeperson@mailinator.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $tradeperson->assignRole($tradepersonRole);
        
        // //create order status
        // $statuses = ['Processing', 'In Progress', 'Pending', 'Completed', 'Cancelled'];

        // foreach ($statuses as $status) {
        //     OrderStatus::create(['status' => $status]);
        // }
        
        
        // //create payment status
        // $statuses = ['Accepted', 'Failed', 'Refund', 'Rejected', 'In-Compelete'];

        // foreach ($statuses as $status) {
        //     PaymentStatus::create(['status' => $status]);
        // }
        
        // //create proposal status
        // $statuses = ['Accepted', 'Rejected', 'Pending'];

        // foreach ($statuses as $status) {
        //     ProposalStatus::create(['status' => $status]);
        // }
        
    }
}
