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

class TradepersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tradepersons Open
    //     $tradepersons = [
    //       [
    //           'user_id' => 37,
    //           'first_name' => 'Brian',
    //           'last_name' => 'Simmons',
    //           'nick_name' => 'B S',
    //           'gender' => 'Male',
    //           'phone' => '+47 401 23 456',
    //           'city' => 'Juterudåsen',
    //           'postal_code' => 'NOR 2489',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-1.jpg',
    //           'featured' => 0,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //         'user_id' => 38,
    //         'first_name' => 'Danny',
    //         'last_name' => 'Drywaller',
    //         'nick_name' => 'Danny Drywaller',
    //         'gender' => 'Male',
    //         'phone' => '+47 401 25 456',
    //         'city' => 'Bergen',
    //         'postal_code' => '5004',
    //         'latitude' => 42.49970110525192,
    //         'longitude' => -71.07384474698021,
    //         'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
    //         'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //         'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
    //         'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //         'certificate' => json_encode(['certificate-image-1.jpg']),
    //         'banner'     => 'tradeperson-banner-1.jpg',
    //         'featured' => 0,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'user_id' => 39,
    //         'first_name' => 'Lars',
    //         'last_name' => 'Eriksen',
    //         'nick_name' => 'Lars Eriksen',
    //         'gender' => 'Male',
    //         'phone' => '+47 920 97 654',
    //         'city' => 'Oslo',
    //         'postal_code' => '1164',
    //         'latitude' => 42.49970110525192,
    //         'longitude' => -71.07384474698021,
    //         'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
    //         'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //         'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
    //         'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //         'certificate' => json_encode(['certificate-image-1.jpg']),
    //         'banner'     => 'tradeperson-banner-1.jpg',
    //         'featured' => 0,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'user_id' => 40,
    //         'first_name' => 'Tobias',
    //         'last_name' => 'Andersen',
    //         'nick_name' => 'Tobias Andersen',
    //         'gender' => 'Male',
    //         'phone' => '+47 731 45 678',
    //         'city' => 'Elverum',
    //         'postal_code' => '2406',
    //         'latitude' => 42.49970110525192,
    //         'longitude' => -71.07384474698021,
    //         'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
    //         'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //         'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
    //         'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //         'certificate' => json_encode(['certificate-image-1.jpg']),
    //         'banner'     => 'tradeperson-banner-1.jpg',
    //         'featured' => 0,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
    //     [
    //         'user_id' => 41,
    //         'first_name' => 'Øyvind',
    //         'last_name' => 'Karlsen',
    //         'nick_name' => 'Øyvind Karlsen',
    //         'gender' => 'Male',
    //         'phone' => '+47 980 12 345',
    //         'city' => 'Kristiansand',
    //         'postal_code' => '4632',
    //         'latitude' => 42.49970110525192,
    //         'longitude' => -71.07384474698021,
    //         'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
    //         'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //         'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
    //         'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //         'certificate' => json_encode(['certificate-image-1.jpg']),
    //         'banner'     => 'tradeperson-banner-1.jpg',
    //         'featured' => 0,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ],
        
    //   ];

    //   DB::table('tradepersons')->insert($tradepersons);
      // Tradepersons Close


    // Tradepersons category open
    // $tradepersonCategories = [
    //     ['tradeperson_id' => 31, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 32, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 33, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 34, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 35, 'category_id' => 6, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 36, 'category_id' => 8, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 37, 'category_id' => 9, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 38, 'category_id' => 10, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 39, 'category_id' => 11, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 40, 'category_id' => 12, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 41, 'category_id' => 13, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 42, 'category_id' => 15, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 31, 'category_id' => 16, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 32, 'category_id' => 17, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 33, 'category_id' => 19, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 34, 'category_id' => 20, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 35, 'category_id' => 21, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 36, 'category_id' => 22, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 37, 'category_id' => 24, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 38, 'category_id' => 25, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 39, 'category_id' => 26, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 40, 'category_id' => 28, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 41, 'category_id' => 29, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 42, 'category_id' => 30, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 31, 'category_id' => 32, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 32, 'category_id' => 33, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 33, 'category_id' => 34, 'created_at' => now(), 'updated_at' => now()],

    // ];

    // DB::table('tradeperson_categories')->insert($tradepersonCategories);
    // Tradepersons category close


    // trade Person Reviews Open
    // $tradepersonReviews = [
    //     ['customer_id' => 1, 'tradeperson_id' => 1, 'order_id' => 1, 'review' => 'Alba Plumbing did an excellent job with my end-of-lease clean. The team was thorough, professional, and made sure everything was spotless. I got my full deposit back—highly recommend!', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    //     ['customer_id' => 2, 'tradeperson_id' => 1, 'order_id' => 2, 'review' => 'My gutters were clogged and sagging, but they fixed them perfectly. The team was knowledgeable, explained everything clearly, and completed the job efficiently.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    //     ['customer_id' => 3, 'tradeperson_id' => 1, 'order_id' => 3, 'review' => 'Reliable and efficient repair. The plumber was knowledgeable and got my heater working perfectly.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    // ];

    // DB::table('tradeperson_reviews')->insert($tradepersonReviews);
    //  trade Person Reviews Close


    // trade Person clip usages open 
    $tradepersonClipUsages = [
        [
            'tradeperson_id'  => 1,
            'total_clips'     => 70,
            'available_clips' => 40,
            'used_clips'      => 30,
            'reset_date'      => '2025-03-19',
            'last_reset_date' => '2025-03-19',
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ],
        [
            'tradeperson_id'  => 2,
            'total_clips'     => 100,
            'available_clips' => 50,
            'used_clips'      => 50,
            'reset_date'      => '2025-03-19',
            'last_reset_date' => '2025-03-19',
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ],
        [
            'tradeperson_id'  => 3,
            'total_clips'     => 129,
            'available_clips' => 50,
            'used_clips'      => 79,
            'reset_date'      => '2025-03-19',
            'last_reset_date' => '2025-03-19',
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ],
        [
            'tradeperson_id'  => 4,
            'total_clips'     => 200,
            'available_clips' => 80,
            'used_clips'      => 120,
            'reset_date'      => '2025-03-19',
            'last_reset_date' => '2025-03-19',
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ],
    ];

    DB::table('tradeperson_clip_usages')->insert($tradepersonClipUsages);
    //  trade Person clip usages Close


    // trade Person contract usages open 
    $tradepersonContractUsages = [
        [
            'tradeperson_id'      => 31,
            'total_contracts'     => 100,
            'available_contracts' => 60,
            'used_contracts'      => 40,
            'reset_date'          => '2025-03-19',
            'last_reset_date'     => '2025-03-19',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now(),
        ],
        [
            'tradeperson_id'      => 32,
            'total_contracts'     => 130,
            'available_contracts' => 70,
            'used_contracts'      => 60,
            'reset_date'          => '2025-03-19',
            'last_reset_date'     => '2025-03-19',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now(),
        ],
        [
            'tradeperson_id'      => 33,
            'total_contracts'     => 120,
            'available_contracts' => 90,
            'used_contracts'      => 30,
            'reset_date'          => '2025-03-19',
            'last_reset_date'     => '2025-03-19',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now(),
        ],
        [
            'tradeperson_id'      => 34,
            'total_contracts'     => 60,
            'available_contracts' => 30,
            'used_contracts'      => 30,
            'reset_date'          => '2025-03-19',
            'last_reset_date'     => '2025-03-19',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now(),
        ],
    ];

    DB::table('tradeperson_contract_usages')->insert($tradepersonContractUsages);
    // trade Person contract usages close 

    // trade Person services open 
    $tradepersonServices = [
        [
            'title'                   => 'Additional Services',
            'description'             => 'Unleash the power of automation.',
            'features'                => json_encode([
                "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                "features_1" => ["heading" => "More tradespeople see the job"],
                "features_2" => ["heading" => "Faster response time"]
            ]),
            'price'                   => 299.00,
            'binding_period'          => '1 Month',
            'search_visibility'       => 'Medium',
            'recommended_tradeperson' => 1,
            'appear_homepage'         => 1,
            'access_premium_tender'   => NULL,
            'extra_clip'              => 20,
            'google_visibility'       => 1,
            'contract_creation'       => NULL,
            'free_contract'           => NULL,
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(),
        ],
        [
            'title'                   => 'Premium Listing',
            'description'             => 'Increase your visibility in search results.',
            'features'                => json_encode([
                "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                "features_1" => ["heading" => "More tradespeople see the job"],
                "features_2" => ["heading" => "Faster response time"]
            ]),
            'price'                   => 499.00,
            'binding_period'          => '3 Months',
            'search_visibility'       => 'High',
            'recommended_tradeperson' => 1,
            'appear_homepage'         => 1,
            'access_premium_tender'   => 1,
            'extra_clip'              => 50,
            'google_visibility'       => 1,
            'contract_creation'       => 1,
            'free_contract'           => 1,
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(),
        ],
        [
            'title'                   => 'Basic Plan',
            'description'             => 'A simple plan for getting started.',
            'features'                => json_encode([
                "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                "features_1" => ["heading" => "More tradespeople see the job"],
                "features_2" => ["heading" => "Faster response time"]
            ]),
            'price'                   => 99.00,
            'binding_period'          => '1 Month',
            'search_visibility'       => 'Premium',
            'recommended_tradeperson' => 0,
            'appear_homepage'         => 0,
            'access_premium_tender'   => NULL,
            'extra_clip'              => 5,
            'google_visibility'       => 0,
            'contract_creation'       => NULL,
            'free_contract'           => NULL,
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(),
        ],
        [
            'title'                   => 'Enterprise Solution',
            'description'             => 'Best for large businesses.',
            'features'                => json_encode([
                "features_0" => ["heading" => "Job marked as 'Urgent' and displayed at the top"],
                "features_1" => ["heading" => "More tradespeople see the job"],
                "features_2" => ["heading" => "Faster response time"]
            ]),
            'price'                   => 999.00,
            'binding_period'          => '12 Months',
            'search_visibility'       => 'Medium',
            'recommended_tradeperson' => 1,
            'appear_homepage'         => 1,
            'access_premium_tender'   => 1,
            'extra_clip'              => 100,
            'google_visibility'       => 1,
            'contract_creation'       => 1,
            'free_contract'           => 1,
            'created_at'              => Carbon::now(),
            'updated_at'              => Carbon::now(),
        ]
    ];
    
    DB::table('tradeperson_services')->insert($tradepersonServices);
    // trade Person services close 


    // tradeperson subscription open
    $subscriptions = [
        [
            'tradeperson_id'  => 31,
            'subscription_id' => 1,
            'start_date'      => '2025-03-20',
            'end_date'        => '2025-03-20',
            'status_id'       => 1,
            'created_at'      => Carbon::parse('2025-03-20 14:10:50'),
            'updated_at'      => Carbon::parse('2025-03-20 14:10:50'),
        ],
        [
            'tradeperson_id'  => 32,
            'subscription_id' => 2,
            'start_date'      => '2025-03-20',
            'end_date'        => '2025-03-20',
            'status_id'       => 2,
            'created_at'      => Carbon::parse('2025-03-20 14:10:50'),
            'updated_at'      => Carbon::parse('2025-03-20 14:10:50'),
        ]
    ];

    DB::table('tradeperson_subscriptions')->insert($subscriptions);
    // tradeperson subscription close


}

}
