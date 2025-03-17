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
        //   [
        //       'user_id' => 9,
        //       'first_name' => 'East',
        //       'last_name' => 'Sami',
        //       'nick_name' => 'E S',
        //       'gender' => 'Male',
        //       'phone' => '555123456',
        //       'city' => 'Oslo',
        //       'postal_code' => '0561',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '12 Greenway Street, Oslo, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-1.jpg',
        //       'featured' => 0,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 10,
        //       'first_name' => 'DM',
        //       'last_name' => 'Service',
        //       'nick_name' => 'D M',
        //       'gender' => 'Male',
        //       'phone' => '555987654',
        //       'city' => 'Bergen',
        //       'postal_code' => '5017',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '34 Blueway Road, Bergen, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-2.jpg',
        //       'featured' => 0,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 11,
        //       'first_name' => 'Alba',
        //       'last_name' => 'Plumbing',
        //       'nick_name' => 'A P',
        //       'gender' => 'Male',
        //       'phone' => '555223344',
        //       'city' => 'Trondheim',
        //       'postal_code' => '7011',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '78 Redhill Drive, Trondheim, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //        'banner'     => 'tradeperson-banner-3.jpg',
        //        'featured' => 0,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 12,
        //       'first_name' => 'Carl',
        //       'last_name' => 'Plumbing Ltd.',
        //       'nick_name' => 'C P L',
        //       'gender' => 'Male',
        //       'phone' => '555445566',
        //       'city' => 'Stavanger',
        //       'postal_code' => '4006',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '90 Waterfall Lane, Stavanger, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //        'banner'     => 'tradeperson-banner-4.jpg',
        //        'featured' => 0,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 13,
        //       'first_name' => 'Nick',
        //       'last_name' => 'Plumbing',
        //       'nick_name' => 'N K',
        //       'gender' => 'Male',
        //       'phone' => '555667788',
        //       'city' => 'Drammen',
        //       'postal_code' => '3045',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '45 Silverline Street, Drammen, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-5.jpg',
        //       'featured' => 1,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 14,
        //       'first_name' => 'Kim',
        //       'last_name' => 'Sarah LTD',
        //       'nick_name' => 'K P & S L T D',
        //       'gender' => 'Male',
        //       'phone' => '555889900',
        //       'city' => 'Kristiansand',
        //       'postal_code' => '4601',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '67 Maple Avenue, Kristiansand, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-6.jpg',
        //       'featured' => 1,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 15,
        //       'first_name' => 'East',
        //       'last_name' => 'Sami',
        //       'nick_name' => 'E S',
        //       'gender' => 'Male',
        //       'phone' => '555999111',
        //       'city' => 'Tromsø',
        //       'postal_code' => '9008',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '10 Pine Road, Tromsø, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-7.jpg',
        //       'featured' => 1,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 16,
        //       'first_name' => 'DM',
        //       'last_name' => 'Service',
        //       'nick_name' => 'D M',
        //       'gender' => 'Female',
        //       'phone' => '555222333',
        //       'city' => 'Haugesund',
        //       'postal_code' => '5525',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '5 Brook Lane, Haugesund, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-8.jpg',
        //       'featured' => 1,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        //   [
        //       'user_id' => 17,
        //       'first_name' => 'Alba',
        //       'last_name' => 'Plumbing',
        //       'nick_name' => 'A P',
        //       'gender' => 'Male',
        //       'phone' => '555777888',
        //       'city' => 'Fredrikstad',
        //       'postal_code' => '1608',
        //       'latitude' => 42.49970110525192,
        //       'longitude' => -71.07384474698021,
        //       'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
        //                      We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
        //       'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
        //       'address' => '23 Riverside Drive, Fredrikstad, Norway',
        //       'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
        //       'certificate' => json_encode(['certificate-image-1.jpg']),
        //       'banner'     => 'tradeperson-banner-9.jpg',
        //       'featured' => 1,
        //       'created_at' => Carbon::now(),
        //       'updated_at' => Carbon::now(),
        //   ],
        
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
