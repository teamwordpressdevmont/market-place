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
                'id'         => 9,
                'user_id'    => 34,
                'first_name' => 'Michael',
                'last_name'  => 'Jordan',
                'phone'      => '+62 847 1723 1123',
                'gender'     => 'male',
                'city'       => 'Juterudåsen',
                'country'    => 'Norway',
                'post_code'  => 'NOR 2489',
                'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 10,
                'user_id'    => 35,
                'first_name' => 'Selena',
                'last_name'  => 'Ray',
                'phone'      => '+62 847 1723 1123',
                'gender'     => 'female',
                'city'       => 'Juterudåsen',
                'country'    => 'Norway',
                'post_code'  => 'NOR 2489',
                'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'         => 11,
                'user_id'    => 36,
                'first_name' => 'Louisa',
                'last_name'  => 'Marin',
                'phone'      => '+62 847 1723 1123',
                'gender'     => 'female',
                'city'       => 'Juterudåsen',
                'country'    => 'Norway',
                'post_code'  => 'NOR 2489',
                'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert into database
        DB::table('customers')->insert($customers);
        // // Customer Close
    }
}
