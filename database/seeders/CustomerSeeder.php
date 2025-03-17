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

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Customer Open
        $customers = [
            [
                'id'         => 1,
                'user_id'    => 1,
                'first_name' => 'Brian',
                'last_name'  => 'Simmons',
                'phone'      => '03001234567',
                'gender'     => 'male',
                'city'       => 'Lahore',
                'country'    => 'Pakistan',
                'post_code'  => '54000',
                'address'    => 'Main Boulevard, Gulberg',
                'address2'   => 'Near Mall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 2,
                'user_id'    => 2,
                'first_name' => 'Brian',
                'last_name'  => 'Simmons',
                'phone'      => '03211234567',
                'gender'     => 'male',
                'city'       => 'Karachi',
                'country'    => 'Pakistan',
                'post_code'  => '75000',
                'address'    => 'DHA Phase 6',
                'address2'   => 'Street 45',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 3,
                'user_id'    => 3,
                'first_name' => 'Brian',
                'last_name'  => 'Simmons',
                'phone'      => '03111234567',
                'gender'     => 'male',
                'city'       => 'Islamabad',
                'country'    => 'Pakistan',
                'post_code'  => '44000',
                'address'    => 'Blue Area',
                'address2'   => 'Commercial Market',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 4,
                'user_id'    => 4,
                'first_name' => 'Carl',
                'last_name'  => 'Plumbing Ltd.',
                'phone'      => '03451234567',
                'gender'     => 'male',
                'city'       => 'Faisalabad',
                'country'    => 'Pakistan',
                'post_code'  => '38000',
                'address'    => 'Madina Town',
                'address2'   => 'Opposite Park',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 5,
                'user_id'    => 5,
                'first_name' => 'Nick',
                'last_name'  => 'Plumbing',
                'phone'      => '03561234567',
                'gender'     => 'male',
                'city'       => 'Peshawar',
                'country'    => 'Pakistan',
                'post_code'  => '25000',
                'address'    => 'Hayatabad',
                'address2'   => 'Near Hospital',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert into database
        DB::table('customers')->insert($customers);
        // // Customer Close
    }
}
