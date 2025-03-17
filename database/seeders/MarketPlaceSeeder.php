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



    // //     // User Open
    //     $users = [
    //       [
    //           'id' => 4,
    //           'name' => 'Kane',
    //           'email' => 'kane@mailinator.com',
    //           'password' => Hash::make('password'), // Securely hash password
    //           'user_approved' => 0,
    //           'avatar' => 'avatar.png',
    //           'remember_token' => str()->random(60),
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'id' => 5,
    //           'name' => 'Smith',
    //           'email' => 'smith@mailinator.com',
    //           'password' => Hash::make('password'),
    //           'user_approved' => 0,
    //           'avatar' => 'avatar.png',
    //           'remember_token' => null,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'id' => 6,
    //           'name' => 'David',
    //           'email' => 'david@mailinator.com',
    //           'password' => Hash::make('password'),
    //           'user_approved' => 0,
    //           'avatar' => 'avatar.png',
    //           'remember_token' => null,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'id' => 7,
    //           'name' => 'John',
    //           'email' => 'john@mailinator.com',
    //           'password' => Hash::make('password'),
    //           'user_approved' => 0,
    //           'avatar' => 'avatar.png',                 
    //           'remember_token' => str()->random(60),
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'id' => 8,
    //           'name' => 'Dan',
    //           'email' => 'dan@mailinator.com',
    //           'password' => Hash::make('password'),
    //           'user_approved' => 0, 
    //           'avatar' => 'avatar.png',
    //           'remember_token' => str()->random(60),
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //   ];

    //   foreach( $users as $user ) {
    //     $user = User::create($user);
    //     $user->assignRole($customerRole);
    //   }
    //  // User Close

    // //  Tradeperson Users 

    // $users = [
    //     [
    //         'id' => 9,
    //         'name' => 'East Sami',
    //         'email' => 'east.sami@mailinator.com',
    //         'password' => Hash::make('password'), // Securely hash password
    //         'user_approved' => 0,
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 10,
    //         'name' => 'DM Service',
    //         'email' => 'dm.service@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0,
    //         'avatar' => 'avatar.png',
    //         'remember_token' => null,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 11,
    //         'name' => 'Alba Plumbing',
    //         'email' => 'alba@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0,
    //         'avatar' => 'avatar.png',
    //         'remember_token' => null,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 12,
    //         'name' => 'Carl Plumbing',
    //         'email' => 'carl@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0,
    //         'avatar' => 'avatar.png',                 
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 13,
    //         'name' => 'Nick Plumbing',
    //         'email' => 'nick@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0, 
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 14,
    //         'name' => 'Kim & Sarah Ltd',
    //         'email' => 'kim.sarah@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0, 
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 15,
    //         'name' => 'East Sami',
    //         'email' => 'east.sami.2@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0, 
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 16,
    //         'name' => 'DM Service',
    //         'email' => 'dm.2@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0, 
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'id' => 17,
    //         'name' => 'Alba Plumbing',
    //         'email' => 'alba2@mailinator.com',
    //         'password' => Hash::make('password'),
    //         'user_approved' => 0, 
    //         'avatar' => 'avatar.png',
    //         'remember_token' => str()->random(60),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    // ];

    // foreach( $users as $user ) {
    //     $user = User::create($user);
    //     $user->assignRole($tradepersonRole);
    // }
    // // TradePersons users End


        
    }
}