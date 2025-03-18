<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class MarketPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {

    //     // Creating Roles
    //     $adminRole = Role::create(['name' => 'admin']);
    //     $customerRole = Role::create(['name' => 'customer']);
    //     $tradepersonRole = Role::create(['name' => 'tradeperson']);

    //     // Creating Permissions
    //     $viewAdmin = Permission::create(['name' => 'view admin']);
    //     $viewCustomer = Permission::create(['name' => 'view customer']);
    //     $viewTradeperson = Permission::create(['name' => 'view tradeperson']);

    //     // Assign Permissions to Roles
    //     $adminRole->givePermissionTo($viewAdmin);
    //     $customerRole->givePermissionTo($viewCustomer);
    //     $tradepersonRole->givePermissionTo($viewTradeperson);

    //     // Creating Users and Assigning Roles     
    //     $admin = User::create([
    //         'name' => 'Admin',
    //         'email' => 'admin@mailinator.com',
    //         'password' => Hash::make('password'),
    //     ]);
    //     $admin->assignRole($adminRole);

    //     $customer = User::create([
    //         'name' => 'Customer',
    //         'email' => 'customer@mailinator.com',
    //         'password' => Hash::make('password'),
    //     ]);
    //     $customer->assignRole($customerRole);

    //     $tradeperson = User::create([
    //         'name' => 'Tradeperson',
    //         'email' => 'tradeperson@mailinator.com',
    //         'password' => Hash::make('password'),
    //     ]);
    //     $tradeperson->assignRole($tradepersonRole);



    

  
  
    //  Customer  

    // $users = [
    //     [
    //         'id' => 34,
    //         'name' => 'Michael Jordan',
    //         'email' => 'micheal-jordan@mailinator.com',
    //         'password' => Hash::make('password'), // Securely hash password
    //         'user_approved' => 1,
    //         'avatar' => 'avatar-1.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 35,
    //         'name' => 'Selena Ray',
    //         'email' => 'selena-ray@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 1,
    //         'avatar' => 'avatar-2.png',
    //         'remember_token' => null,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 36,
    //         'name' => 'Louisa Marin',
    //         'email' => 'louisa-marin@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 1,
    //         'avatar' => 'avatar-3.png',
    //         'remember_token' => null,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    // ];

    // foreach( $users as $user ) {
    //     $user = User::create($user);
    //     $user->assignRole('customer');
    // }
    // Customer  End



    // Traderperson User

    $users = [
        [
            'id' => 37,
            'name' => 'Brian Simmons',
            'email' => 'brian-simmons@mailinator.com',
            'password' => Hash::make('password'), // Securely hash password
            'user_approved' => 1,
            'avatar' => 'avatar-1.png',
            'remember_token' => str()->random(60),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 38,
            'name' => 'Danny Drywaller',
            'email' => 'danny-drywaller@mailinator.com',
            'password' => Hash::make('password'),
            'user_approved' => 1,
            'avatar' => 'avatar-1.png',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 39,
            'name' => 'Lars Eriksen',
            'email' => 'lars-eriksen@mailinator.com',
            'password' => Hash::make('password'),
            'user_approved' => 1,
            'avatar' => 'avatar-1.png',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 40,
            'name' => 'Tobias Andersen',
            'email' => 'tobias-andersen@mailinator.com',
            'password' => Hash::make('password'),
            'user_approved' => 1,
            'avatar' => 'avatar-1.png',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'id' => 41,
            'name' => 'Øyvind Karlsen',
            'email' => 'Øyvind-karlsen@mailinator.com',
            'password' => Hash::make('password'),
            'user_approved' => 1,
            'avatar' => 'avatar-1.png',
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    ];

    foreach( $users as $user ) {
        $user = User::create($user);
        $user->assignRole('tradeperson');
    }
    // tradeperson user End



        
    }
}