<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MarketPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Categories Open
        // $categories = [
        //     [
        //         'name' => 'Basic Trades Services',
        //         'subcategories' => [
        //             ['name' => 'Carpenter', 'icon' => 'https://devmontdigital.co/service-place-image/carpenter.png'],
        //             ['name' => 'Electrician', 'icon' => 'https://devmontdigital.co/service-place-image/electrician.png'],
        //             ['name' => 'Plumber', 'icon' => 'https://devmontdigital.co/service-place-image/plumber.png'],
        //             ['name' => 'Painter', 'icon' => 'https://devmontdigital.co/service-place-image/painter.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Specialized Services',
        //         'subcategories' => [
        //             ['name' => 'Roofer', 'icon' => 'https://devmontdigital.co/service-place-image/roofer.png'],
        //             ['name' => 'Ventilation and Heating (HVAC)', 'icon' => 'https://devmontdigital.co/service-place-image/ventilation.png'],
        //             ['name' => 'Tiler', 'icon' => 'https://devmontdigital.co/service-place-image/tiler.png'],
        //             ['name' => 'Flooring Specialist', 'icon' => 'https://devmontdigital.co/service-place-image/flooring-specialist.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Energy Efficiency',
        //         'subcategories' => [
        //             ['name' => 'Insulation Specialist', 'icon' => 'https://devmontdigital.co/service-place-image/insulation-specialist.png'],
        //             ['name' => 'Solar Panel Installer', 'icon' => 'https://devmontdigital.co/service-place-image/solar-panel-installer.png'],
        //             ['name' => 'Energy Auditor', 'icon' => 'https://devmontdigital.co/service-place-image/energy-consultant.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Creative Professionals',
        //         'subcategories' => [
        //             ['name' => 'Architect', 'icon' => 'https://devmontdigital.co/service-place-image/architect.png'],
        //             ['name' => 'Interior Designer', 'icon' => 'https://devmontdigital.co/service-place-image/interior-designer.png'],
        //             ['name' => 'Landscape Architect', 'icon' => 'https://devmontdigital.co/service-place-image/landscape-architect.png'],
        //             ['name' => 'Furniture Designer', 'icon' => 'https://devmontdigital.co/service-place-image/furniture-designer.png'],

        //         ]
        //     ],
        //     [
        //         'name' => 'Special Projects',
        //         'subcategories' => [
        //             ['name' => 'Smart Home Technician', 'icon' => 'https://devmontdigital.co/service-place-image/smart-home-technician.png'],
        //             ['name' => 'Landscaping and Gardening', 'icon' => 'https://devmontdigital.co/service-place-image/landscapig-and-gardening.png'],
        //             ['name' => 'Fireplace Installer', 'icon' => 'https://devmontdigital.co/service-place-image/fireplace-installer.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Emergency Services',
        //         'subcategories' => [
        //             ['name' => 'Emergency Plumber', 'icon' => 'https://devmontdigital.co/service-place-image/emergency-plumber.png'],
        //             ['name' => 'Emergency Electrician', 'icon' => 'https://devmontdigital.co/service-place-image/emergency-electrician.png'],
        //             ['name' => 'Snow Removal Specialist', 'icon' => 'https://devmontdigital.co/service-place-image/snow-removal-specialist.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'General Services',
        //         'subcategories' => [
        //             ['name' => 'Handyman', 'icon' => 'https://devmontdigital.co/service-place-image/handyman.png'],
        //             ['name' => 'Moving and Transport Services', 'icon' => 'https://devmontdigital.co/service-place-image/moving-and-transport-services.png'],
        //             ['name' => 'Cleaning Services', 'icon' => 'https://devmontdigital.co/service-place-image/cleaning-services.png'],
        //         ]
        //     ]
        // ];

        // foreach ($categories as $category) {
        //     $parentId = DB::table('categories')->insertGetId([
        //         'name' => $category['name'],
        //         'description' => $category['name'] . ' description',
        //         'icon' => null,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);

        //     foreach ($category['subcategories'] as $sub) {
        //         DB::table('categories')->insert([
        //             'parent_id' => $parentId,
        //             'name' => $sub['name'],
        //             'description' => $sub['name'] . ' services',
        //             'icon' => $sub['icon'],
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),
        //         ]);
        //     }
        // }
        // // // Categories Close 


         // // Testimonials Open
        // $testimonials = [
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 4,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 5,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Ingrid',
        //         'heading'    => 'From a Property Manager',
        //         'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 3,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Ingrid',
        //         'heading'    => 'From a Property Manager',
        //         'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 3,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 1,
        //         'name'       => 'Client - Ingrid',
        //         'heading'    => 'From a Property Manager',
        //         'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ];

        // DB::table('testimonials')->insert($testimonials);


        // // Blog Open

        // $blogs = [
        //     [
        //         'title' => 'Winter: Essential Home Care for the Season',
        //         'banner' => 'https://devmontdigital.co/service-place-image/winter-home-care.jpg', 
        //         'description' => 'Managing your home’s upkeep can seem overwhelming, but breaking it down by season makes it easier and more efficient. As the seasons change from autumn to winter, your home requires different care and attention. Winter brings a need for draft-proofing, pipe insulation, and HVAC maintenance. Each season has its own unique maintenance needs, and when handled by trusted professionals, your home stays safe and beautiful all year round.',
        //         'publish_by' => 'Dinbyggemarked',
        //         'publish_date' => '2024-12-23',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Top Home Renovation Trends You Need to Know',
        //         'banner' => 'https://devmontdigital.co/service-place-image/home-renovation-trends.jpg',
        //         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
        //         'publish_by' => 'Admin',
        //         'publish_date' => now(),
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'How to Ensure a Smooth Home Repair Experience?',
        //         'banner' => 'https://devmontdigital.co/service-place-image/home-repair-experience.jpg',
        //         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
        //         'publish_by' => 'Admin',
        //         'publish_date' => now(),
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Why Trusting Experienced Tradespeople?',
        //         'banner' => 'https://devmontdigital.co/service-place-image/winter-home-care.jpg',
        //         'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
        //         'publish_by' => 'Admin',
        //         'publish_date' => now(),
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
           
        // ];

        // DB::table('blogs')->insert($blogs);
        
        //Blog Close


    }
}
