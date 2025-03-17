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
use App\Models\Tradeperson;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Users and Assigning Roles
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $customer->assignRole('customer');

        $tradeperson = User::create([
            'name' => 'Tradeperson',
            'email' => 'tradeperson@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $tradeperson->assignRole('tradeperson');
        
        
        $users = [
            [
                'id' => 4,
                'name' => 'East Sami',
                'email' => 'east.sami@mailinator.com',
                'password' => Hash::make('password'), // Securely hash password
                'user_approved' => 0,
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'DM Service',
                'email' => 'dm.service@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0,
                'avatar' => 'avatar.png',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'Alba Plumbing',
                'email' => 'alba@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0,
                'avatar' => 'avatar.png',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'Carl Plumbing',
                'email' => 'carl@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0,
                'avatar' => 'avatar.png',                 
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'Nick Plumbing',
                'email' => 'nick@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0, 
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'Kim & Sarah Ltd',
                'email' => 'kim.sarah@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0, 
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'name' => 'East Sami',
                'email' => 'east.sami.2@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0, 
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'name' => 'DM Service',
                'email' => 'dm.2@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0, 
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'name' => 'Alba Plumbing',
                'email' => 'alba2@mailinator.com',
                'password' => Hash::make('password'),
                'user_approved' => 0, 
                'avatar' => 'avatar.png',
                'remember_token' => str()->random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach( $users as $user ) {
            $user = User::create($user);
            $user->assignRole('tradeperson');
        }

        // Tradepersons Open
        $tradepersons = [
            [
                'user_id' => 4,
                'first_name' => 'East',
                'last_name' => 'Sami',
                'nick_name' => 'ES',
                'gender' => 'Male',
                'phone' => '555123456',
                'city' => 'Oslo',
                'postal_code' => '0561',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '12 Greenway Street, Oslo, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-1.jpg',
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'first_name' => 'DM',
                'last_name' => 'Service',
                'nick_name' => 'DM',
                'gender' => 'Male',
                'phone' => '555987654',
                'city' => 'Bergen',
                'postal_code' => '5017',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '34 Blueway Road, Bergen, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-2.jpg',
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'first_name' => 'Alba',
                'last_name' => 'Plumbing',
                'nick_name' => 'AP',
                'gender' => 'Male',
                'phone' => '555223344',
                'city' => 'Trondheim',
                'postal_code' => '7011',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '78 Redhill Drive, Trondheim, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-3.jpg',
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 7,
                'first_name' => 'Carl',
                'last_name' => 'Plumbing Ltd.',
                'nick_name' => 'CP',
                'gender' => 'Male',
                'phone' => '555445566',
                'city' => 'Stavanger',
                'postal_code' => '4006',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '90 Waterfall Lane, Stavanger, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-4.jpg',
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'first_name' => 'Nick',
                'last_name' => 'Plumbing',
                'nick_name' => 'NK',
                'gender' => 'Male',
                'phone' => '555667788',
                'city' => 'Drammen',
                'postal_code' => '3045',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '45 Silverline Street, Drammen, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-5.jpg',
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 9,
                'first_name' => 'Kim',
                'last_name' => 'Sarah LTD',
                'nick_name' => 'KS',
                'gender' => 'Male',
                'phone' => '555889900',
                'city' => 'Kristiansand',
                'postal_code' => '4601',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '67 Maple Avenue, Kristiansand, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-6.jpg',
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 10,
                'first_name' => 'East',
                'last_name' => 'Sami',
                'nick_name' => 'ES',
                'gender' => 'Male',
                'phone' => '555999111',
                'city' => 'Tromsø',
                'postal_code' => '9008',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '10 Pine Road, Tromsø, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-7.jpg',
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'first_name' => 'DM',
                'last_name' => 'Service',
                'nick_name' => 'DM',
                'gender' => 'Female',
                'phone' => '555222333',
                'city' => 'Haugesund',
                'postal_code' => '5525',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '5 Brook Lane, Haugesund, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-8.jpg',
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'first_name' => 'Alba',
                'last_name' => 'Plumbing',
                'nick_name' => 'AP',
                'gender' => 'Male',
                'phone' => '555777888',
                'city' => 'Fredrikstad',
                'postal_code' => '1608',
                'latitude' => 42.49970110525192,
                'longitude' => -71.07384474698021,
                'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
                             We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
                'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
                'address' => '23 Riverside Drive, Fredrikstad, Norway',
                'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
                'certificate' => json_encode(['certificate-image-1.jpg']),
                'banner'     => 'tradeperson-banner-9.jpg',
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        
        foreach( $tradepersons as $person ) {
            $traderPerson = Tradeperson::create($person);
            $traderPerson->categories()->attach(1);
        }
        
        // // trade Person Reviews Open
        $tradepersonReviews = [
            ['customer_id' => 6, 'tradeperson_id' => 31, 'order_id' => 1, 'review' => 'Alba Plumbing did an excellent job with my end-of-lease clean. The team was thorough, professional, and made sure everything was spotless. I got my full deposit back—highly recommend!', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 6, 'tradeperson_id' => 31, 'order_id' => 1, 'review' => 'My gutters were clogged and sagging, but they fixed them perfectly. The team was knowledgeable, explained everything clearly, and completed the job efficiently.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 6, 'tradeperson_id' => 31, 'order_id' => 1, 'review' => 'Reliable and efficient repair. The plumber was knowledgeable and got my heater working perfectly.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('tradeperson_reviews')->insert($tradepersonReviews);
        //  trade Person Reviews Close
    }
}
