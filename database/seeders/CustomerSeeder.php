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
        // $customers = [
        //     [
        //         'id'         => 9,
        //         'user_id'    => 34,
        //         'first_name' => 'Michael',
        //         'last_name'  => 'Jordan',
        //         'phone'      => '+62 847 1723 1123',
        //         'gender'     => 'male',
        //         'city'       => 'Juterudåsen',
        //         'country'    => 'Norway',
        //         'postal_code'  => 'NOR 2489',
        //         'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 10,
        //         'user_id'    => 35,
        //         'first_name' => 'Selena',
        //         'last_name'  => 'Ray',
        //         'phone'      => '+62 847 1723 1123',
        //         'gender'     => 'female',
        //         'city'       => 'Juterudåsen',
        //         'country'    => 'Norway',
        //         'postal_code'  => 'NOR 2489',
        //         'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 11,
        //         'user_id'    => 36,
        //         'first_name' => 'Louisa',
        //         'last_name'  => 'Marin',
        //         'phone'      => '+62 847 1723 1123',
        //         'gender'     => 'female',
        //         'city'       => 'Juterudåsen',
        //         'country'    => 'Norway',
        //         'postal_code'  => 'NOR 2489',
        //         'address'    => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'address2'   => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     // Tradeperson Customer
        //     [
        //         'id' => 9,
        //         'user_id' => 37,
        //         'first_name' => 'Brian',
        //         'last_name' => 'Simmons',
        //         'phone' => '+47 401 23 456',
        //         'gender' => 'Male',
        //         'city' => 'Juterudåsen',
        //         'country' => 'Norway',
        //         'postal_code' => 'NOR 2489',
        //         'address' => 'Fjordvik 12, 5004 Bergen, Norway',
        //         'address2' => 'Fjordvik 12, 5004 Bergen, Norway',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'id' => 10,
        //         'user_id' => 38,
        //         'first_name' => 'Danny',
        //         'last_name' => 'Drywaller',
        //         'gender' => 'Male',
        //         'phone' => '+47 401 25 456',
        //         'city' => 'Bergen',
        //         'country' => 'Norway',
        //         'postal_code' => '5004',
        //         'address' => 'Fjordvik 12, 5004 Bergen, Norway',
        //         'address2' => 'Fjordvik 12, 5004 Bergen, Norway',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'id' => 11,
        //         'user_id' => 39,
        //         'first_name' => 'Lars',
        //         'last_name' => 'Eriksen',
        //         'gender' => 'Male',
        //         'phone' => '+47 920 97 654',
        //         'city' => 'Oslo',
        //         'country' => 'Norway',
        //         'postal_code' => '1164',
        //         'address' => 'Lørdstrandveien 88, 1164 Oslo, Norway',
        //         'address2' => 'Lørdstrandveien 88, 1164 Oslo, Norway',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'id' => 12,
        //         'user_id' => 40,
        //         'first_name' => 'Tobias',
        //         'last_name' => 'Andersen',
        //         'gender' => 'Male',
        //         'phone' => '+47 731 45 678',
        //         'city' => 'Elverum',
        //         'country' => 'Norway',
        //         'postal_code' => '2406',
        //         'address' => 'Bergfossen 27, 2406 Elverum, Norway',
        //         'address2' => 'Bergfossen 27, 2406 Elverum, Norway',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'id' => 13,
        //         'user_id' => 41,
        //         'first_name' => 'Øyvind',
        //         'last_name' => 'Karlsen',
        //         'phone' => '+47 980 12 345',
        //         'gender' => 'Male',
        //         'phone' => '+47 980 12 345',
        //         'city' => 'Kristiansand',
        //         'country' => 'Norway',
        //         'postal_code' => '4632',
        //         'address' => 'Sanheimsveien 5, 4632 Kristiansand, Norway',
        //         'address2' => 'Sanheimsveien 5, 4632 Kristiansand, Norway',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ];

        // // Insert into database
        // DB::table('customers')->insert($customers);
        // // Customer Close

       // Customer Service Open
       $customerServices = [
            [
                'title'       => 'Starter',
                'description' => 'Unleash the power of automation.',
                'features'    => json_encode([
                    "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                    "features_1" => ["heading" => "More tradespeople see the job"],
                    "features_2" => ["heading" => "Faster response time"]
                ]),
                'price'       => 299.00,
                'options'     => 'service',
                'option_data' => NULL,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Professional',
                'description' => 'Advanced tools to take your work to  the next level.',
                'features'    => json_encode([
                    "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                    "features_1" => ["heading" => "More tradespeople see the job"],
                    "features_2" => ["heading" => "Faster response time"]
                ]),
                'price'       => 499.00,
                'options'     => 'service',
                'option_data' => NULL,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'title'       => 'Company',
                'description' => 'Automation plus enterprise-grade features.',
                'features'    => json_encode([
                    "features_0" => ["heading" => "The platform selects and sends the job to the top 5 tradespeople in the area"],
                    "features_1" => ["heading" => "Tradespeople receive an immediate notification"],
                    "features_2" => ["heading" => "Fewer low-quality bids – only serious professionals"]
                ]),
                'price'       => 399.00,
                'options'     => 'service',
                'option_data' => NULL,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]
        ];
            
        DB::table('customer_services')->insert($customerServices);
        // Customer Service Close


        // Customer Service Purchases Open

        $customerServicePurchases = [
            [
                'order_id'    => 1,
                'customer_id' => 9,
                'service_id'  => 1,
                'start_date'  => '2025-03-19',
                'end_date'    => '2025-03-19',
                'status_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'order_id'    => 2,
                'customer_id' => 10,
                'service_id'  => 2,
                'start_date'  => '2025-03-19',
                'end_date'    => '2025-03-19',
                'status_id'   => 2,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'order_id'    => 3,
                'customer_id' => 11,
                'service_id'  => 3,
                'start_date'  => '2025-03-19',
                'end_date'    => '2025-03-19',
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]
        ];
        
        DB::table('customer_service_purchases')->insert($customerServicePurchases);
        
        // Customer Service Purchases Close
    


    }


   
}
