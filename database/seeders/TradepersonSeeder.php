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
        $tradepersons = [
          [
              'user_id' => 37,
              'first_name' => 'Brian',
              'last_name' => 'Simmons',
              'nick_name' => 'B S',
              'gender' => 'Male',
              'phone' => '+47 401 23 456',
              'city' => 'Juterudåsen',
              'postal_code' => 'NOR 2489',
              'latitude' => 42.49970110525192,
              'longitude' => -71.07384474698021,
              'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
              'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
              'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
              'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
              'certificate' => json_encode(['certificate-image-1.jpg']),
              'banner'     => 'tradeperson-banner-1.jpg',
              'featured' => 0,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
            'user_id' => 38,
            'first_name' => 'Danny',
            'last_name' => 'Drywaller',
            'nick_name' => 'Danny Drywaller',
            'gender' => 'Male',
            'phone' => '+47 401 25 456',
            'city' => 'Bergen',
            'postal_code' => '5004',
            'latitude' => 42.49970110525192,
            'longitude' => -71.07384474698021,
            'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
            'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
            'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
            'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
            'certificate' => json_encode(['certificate-image-1.jpg']),
            'banner'     => 'tradeperson-banner-1.jpg',
            'featured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 39,
            'first_name' => 'Lars',
            'last_name' => 'Eriksen',
            'nick_name' => 'Lars Eriksen',
            'gender' => 'Male',
            'phone' => '+47 920 97 654',
            'city' => 'Oslo',
            'postal_code' => '1164',
            'latitude' => 42.49970110525192,
            'longitude' => -71.07384474698021,
            'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
            'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
            'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
            'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
            'certificate' => json_encode(['certificate-image-1.jpg']),
            'banner'     => 'tradeperson-banner-1.jpg',
            'featured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 40,
            'first_name' => 'Tobias',
            'last_name' => 'Andersen',
            'nick_name' => 'Tobias Andersen',
            'gender' => 'Male',
            'phone' => '+47 731 45 678',
            'city' => 'Elverum',
            'postal_code' => '2406',
            'latitude' => 42.49970110525192,
            'longitude' => -71.07384474698021,
            'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
            'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
            'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
            'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
            'certificate' => json_encode(['certificate-image-1.jpg']),
            'banner'     => 'tradeperson-banner-1.jpg',
            'featured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 41,
            'first_name' => 'Øyvind',
            'last_name' => 'Karlsen',
            'nick_name' => 'Øyvind Karlsen',
            'gender' => 'Male',
            'phone' => '+47 980 12 345',
            'city' => 'Kristiansand',
            'postal_code' => '4632',
            'latitude' => 42.49970110525192,
            'longitude' => -71.07384474698021,
            'about_me' => 'Company number - 08900980 Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.',
            'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
            'address' => 'Juterudåsen 11, Slependen, NOR 1341,Norway.',
            'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
            'certificate' => json_encode(['certificate-image-1.jpg']),
            'banner'     => 'tradeperson-banner-1.jpg',
            'featured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        
      ];

      DB::table('tradepersons')->insert($tradepersons);
      // Tradepersons Close


    // Tradepersons category open
    // $tradepersonCategories = [
    //     ['tradeperson_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 2, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 3, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 4, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    //     ['tradeperson_id' => 5, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
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
}

}
