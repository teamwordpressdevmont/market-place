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
     public function run()
    {
        // Categories Open
        // $categories = [
        //     [
        //         'name' => 'Basic Trades Services',
        //         'subcategories' => [
        //             ['name' => 'Carpenter', 'icon' => 'carpenter.png'],
        //             ['name' => 'Electrician', 'icon' => 'electrician.png'],
        //             ['name' => 'Plumber', 'icon' => 'plumber.png'],
        //             ['name' => 'Painter', 'icon' => 'painter.png'],
        //             ['name' => 'Masonry/Bricklayer', 'icon' => 'painter.png'],

        //         ]
        //     ],
        //     [
        //         'name' => 'Specialized Services',
        //         'subcategories' => [
        //             ['name' => 'Roofer', 'icon' => 'roofer.png'],
        //             ['name' => 'Ventilation and Heating (HVAC)', 'icon' => 'ventilation.png'],
        //             ['name' => 'Tiler', 'icon' => 'tiler.png'],
        //             ['name' => 'Flooring Specialist', 'icon' => 'flooring-specialist.png'],
        //             ['name' => 'Window Installer', 'icon' => 'flooring-specialist.png'],
        //             ['name' => 'Drainage and waterproofing Specialist', 'icon' => 'flooring-specialist.png'],

        //         ]
        //     ],
        //     [
        //         'name' => 'Energy Efficiency',
        //         'subcategories' => [
        //             ['name' => 'Insulation Specialist', 'icon' => 'insulation-specialist.png'],
        //             ['name' => 'Solar Panel Installer', 'icon' => 'solar-panel-installer.png'],
        //             ['name' => 'Energy Auditor', 'icon' => 'energy-consultant.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Creative Professionals',
        //         'subcategories' => [
        //             ['name' => 'Architect', 'icon' => 'architect.png'],
        //             ['name' => 'Interior Designer', 'icon' => 'interior-designer.png'],
        //             ['name' => 'Landscape Architect', 'icon' => 'landscape-architect.png'],
        //             ['name' => 'Furniture Designer', 'icon' => 'furniture-designer.png'],

        //         ]
        //     ],
        //     [
        //         'name' => 'Special Projects',
        //         'subcategories' => [
        //             ['name' => 'Smart Home Technician', 'icon' => 'smart-home-technician.png'],
        //             ['name' => 'Landscaping and Gardening', 'icon' => 'landscapig-and-gardening.png'],
        //             ['name' => 'Fireplace Installer', 'icon' => 'fireplace-installer.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'Emergency Services',
        //         'subcategories' => [
        //             ['name' => 'Emergency Plumber', 'icon' => 'emergency-plumber.png'],
        //             ['name' => 'Emergency Electrician', 'icon' => 'emergency-electrician.png'],
        //             ['name' => 'Snow Removal Specialist', 'icon' => 'snow-removal-specialist.png'],
        //         ]
        //     ],
        //     [
        //         'name' => 'General Services',
        //         'subcategories' => [
        //             ['name' => 'Handyman', 'icon' => 'handyman.png'],
        //             ['name' => 'Moving and Transport Services', 'icon' => 'moving-and-transport-services.png'],
        //             ['name' => 'Cleaning Services', 'icon' => 'cleaning-services.png'],
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
        // // Categories Close 


        // // Testimonials Open
        // $testimonials = [
        //     [
        //         'user_id'    => 4,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 4,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 5,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 5,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 6,
        //         'name'       => 'Client - Ingrid',
        //         'heading'    => 'From a Property Manager',
        //         'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 4,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 5,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 3,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 6,
        //         'name'       => 'Client - Ingrid',
        //         'heading'    => 'From a Property Manager',
        //         'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 4,
        //         'name'       => 'Client - Sarah',
        //         'heading'    => 'From a Homeowner',
        //         'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
        //         'rating'     => 5,
        //         'verified'   => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 5,
        //         'name'       => 'Contractor - Ole',
        //         'heading'    => 'From a Tradesperson',
        //         'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
        //         'rating'     => 3,
        //         'verified'   => 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id'    => 6,
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

        // // Testimonials Close

        // // Approved Testimonials Open
        // $approvedTestimonials = [
        //     [
        //         'testimonial_id' => 1,
        //         'user_id'        => 4,
        //         'order_number'   => 1,
        //         'created_at'     => now(),
        //         'updated_at'     => now(),
        //     ],
        //     [
        //         'testimonial_id' => 2,
        //         'user_id'        => 5,
        //         'order_number'   => 2,
        //         'created_at'     => now(),
        //         'updated_at'     => now(),
        //     ],
        //     [
        //         'testimonial_id' => 3,
        //         'user_id'        => 6,
        //         'order_number'   => 3,
        //         'created_at'     => now(),
        //         'updated_at'     => now(),
        //     ],
        // ];

        // DB::table('approved_testimonials')->insert($approvedTestimonials);
        // // Approved Testimonials Close


        // // Packages Open
        // $packages = [
        //     [
        //         'name'        => 'Starter',
        //         'description' => 'Unleash the power of automation.',
        //         'price'       => 19,
        //         'features'    => json_encode([
        //             'features_0' => ['heading' => 'Multi-step Zaps'],
        //             'features_1' => ['heading' => '3 Premium Apps'],
        //             'features_2' => ['heading' => '2 Users team'],
        //         ]),
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ],
        //     [
        //         'name'        => 'Professional',
        //         'description' => 'Advanced tools to take your work to the next level.',
        //         'price'       => 54,
        //         'features'    => json_encode([
        //             'features_0' => ['heading' => 'Multi-step Zaps'],
        //             'features_1' => ['heading' => 'Unlimited Premium Apps'],
        //             'features_2' => ['heading' => '50 Users team'],
        //             'features_3' => ['heading' => 'Shared Workspace'],
        //         ]),
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ],
        //     [
        //         'name'        => 'Company',
        //         'description' => 'Automation plus enterprise-grade features.',
        //         'price'       => 89,
        //         'features'    => json_encode([
        //             'features_0' => ['heading' => 'Multi-step Zap'],
        //             'features_1' => ['heading' => 'Unlimited Premium Apps'],
        //             'features_2' => ['heading' => 'Unlimited Users Team'],
        //             'features_3' => ['heading' => 'Advanced Admin'],
        //             'features_4' => ['heading' => 'Custom Data Retention'],
        //         ]),
        //         'created_at'  => now(),
        //         'updated_at'  => now(),
        //     ],
        // ];

        
        // DB::table('packages')->insert($packages);

        // // Packages Close


        // // Blog Open

        $blogs = [
            [
                'title' => 'Winter: Essential Home Care for the Season',
                'banner' => 'winter-home-care.jpg', 
                'description' => 'Managing your home’s upkeep can seem overwhelming, but breaking it down by season makes it easier and more efficient. As the seasons change from autumn to winter, your home requires different care and attention. Winter brings a need for draft-proofing, pipe insulation, and HVAC maintenance. Each season has its own unique maintenance needs, and when handled by trusted professionals, your home stays safe and beautiful all year round.',
                'publish_by' => 'Dinbyggemarked',
                'publish_date' => '2024-12-23',
                'featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top Home Renovation Trends You Need to Know',
                'banner' => 'home-renovation-trends.jpg',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
                'publish_by' => 'Admin',
                'publish_date' => now(),
                'featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to Ensure a Smooth Home Repair Experience?',
                'banner' => 'home-repair-experience.jpg',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
                'publish_by' => 'Admin',
                'publish_date' => now(),
                'featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Why Trusting Experienced Tradespeople?',
                'banner' => 'winter-home-care.jpg',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
                'publish_by' => 'Admin',
                'publish_date' => now(),
                'featured' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ];

        DB::table('blogs')->insert($blogs);
        
        // Blog Close

        // // Customer Open
        // $customers = [
        //     [
        //         'id'         => 1,
        //         'user_id'    => 4,
        //         'first_name' => 'East',
        //         'last_name'  => 'Sami',
        //         'phone'      => '03001234567',
        //         'gender'     => 'male',
        //         'city'       => 'Lahore',
        //         'country'    => 'Pakistan',
        //         'post_code'  => '54000',
        //         'address'    => 'Main Boulevard, Gulberg',
        //         'address2'   => 'Near Mall',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 2,
        //         'user_id'    => 5,
        //         'first_name' => 'DM',
        //         'last_name'  => 'Service',
        //         'phone'      => '03211234567',
        //         'gender'     => 'male',
        //         'city'       => 'Karachi',
        //         'country'    => 'Pakistan',
        //         'post_code'  => '75000',
        //         'address'    => 'DHA Phase 6',
        //         'address2'   => 'Street 45',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 3,
        //         'user_id'    => 6,
        //         'first_name' => 'Alto',
        //         'last_name'  => 'Plumbing',
        //         'phone'      => '03111234567',
        //         'gender'     => 'male',
        //         'city'       => 'Islamabad',
        //         'country'    => 'Pakistan',
        //         'post_code'  => '44000',
        //         'address'    => 'Blue Area',
        //         'address2'   => 'Commercial Market',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 4,
        //         'user_id'    => 7,
        //         'first_name' => 'Carl',
        //         'last_name'  => 'Plumbing Ltd.',
        //         'phone'      => '03451234567',
        //         'gender'     => 'male',
        //         'city'       => 'Faisalabad',
        //         'country'    => 'Pakistan',
        //         'post_code'  => '38000',
        //         'address'    => 'Madina Town',
        //         'address2'   => 'Opposite Park',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'id'         => 5,
        //         'user_id'    => 8,
        //         'first_name' => 'Nick',
        //         'last_name'  => 'Plumbing',
        //         'phone'      => '03561234567',
        //         'gender'     => 'male',
        //         'city'       => 'Peshawar',
        //         'country'    => 'Pakistan',
        //         'post_code'  => '25000',
        //         'address'    => 'Hayatabad',
        //         'address2'   => 'Near Hospital',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ];

        // // Insert into database
        // DB::table('customers')->insert($customers);
        // // Customer Close

        
        // // Tradepersons Open

        //   $tradepersons = [
        //     [
        //         'user_id' => 6,
        //         'first_name' => 'John',
        //         'last_name' => 'Doe',
        //         'gender' => 'Male',
        //         'phone' => '555666777',
        //         'city' => 'New York',
        //         'postal_code' => '10001',
        //         'about_me' => 'Experienced trade professional specializing in plumbing and home repairs.',
        //         'address' => '789 Oak Avenue',
        //         'portfolio' => json_encode([
        //             'portfolio1.jpg',
        //             'portfolio2.jpg'
        //         ]),
        //         'certificate' => 'certificate.pdf',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'user_id' => 7,
        //         'first_name' => 'Carl',
        //         'last_name' => 'Plumbing',
        //         'gender' => 'Male',
        //         'phone' => '555666777',
        //         'city' => 'New York',
        //         'postal_code' => '10001',
        //         'about_me' => 'Professional plumbing services at affordable rates and home repairs.',
        //         'address' => '789 Oak Avenue',
        //         'portfolio' => json_encode([
        //             'portfolio1.jpg',
        //             'portfolio2.jpg'
        //         ]),
        //         'certificate' => 'certificate.pdf',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'user_id' => 8,
        //         'first_name' => 'Nick',
        //         'last_name' => 'Plumbing',
        //         'gender' => 'Male',
        //         'phone' => '555666777',
        //         'city' => 'New York',
        //         'postal_code' => '10001',
        //         'about_me' => 'Experienced trade professional specializing in plumbing and home repairs.',
        //         'address' => '789 Oak Avenue',
        //         'portfolio' => json_encode([
        //             'portfolio1.jpg',
        //             'portfolio2.jpg'
        //         ]),
        //         'certificate' => 'certificate.pdf',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ];

        // DB::table('tradepersons')->insert($tradepersons);

        // Tradepersons close
       

        //  // Order Open
        //  $orders = [
        //     ['customer_id' => 1, 'tradeperson_id' => 1, 'order_status' => 1, 'payment_status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
        //     ['customer_id' => 2, 'tradeperson_id' => 2, 'order_status' => 2, 'payment_status' => 'unpaid', 'created_at' => now(), 'updated_at' => now()],
        //     ['customer_id' => 3, 'tradeperson_id' => 3, 'order_status' => 3, 'payment_status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
        //     ['customer_id' => 4, 'tradeperson_id' => 4, 'order_status' => 4, 'payment_status' => 'refunded', 'created_at' => now(), 'updated_at' => now()],
        //     ['customer_id' => 5, 'tradeperson_id' => 5, 'order_status' => 5, 'payment_status' => 'paid', 'created_at' => now(), 'updated_at' => now()],
        // ];
        
        // DB::table('orders')->insert($orders);
        // // Order Close
        

        // // Order Details Open
        // $orderDetails = [
        //             [
        //                 'order_id' => 1,
        //                 'title' => 'Kitchen Sink Installation',
        //                 'description' => 'Professional installation of a new kitchen sink.',
        //                 'skills' => json_encode(['Plumbing', 'Pipe Fitting']), // Proper JSON Array
        //                 'budget' => 150,
        //                 'urgent' => 1,
        //                 'urgent_price' => 20,
        //                 'job_start_timeline' => '2025-03-05',
        //                 'job_end_timeline' => '2025-03-06',
        //                 'location' => 'New York, NY',
        //                 'address' => '45 5th Ave, NY',
        //                 'image' => json_encode(['sink-install.png']), // Multiple images support
        //                 'additional_notes' => 'Ensure all fittings are leak-proof.',
        //                 'featured' => 1,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ],
        //             [
        //                 'order_id' => 2,
        //                 'title' => 'Pipe Leakage Repair',
        //                 'description' => 'Fix water leakage in kitchen and bathroom pipes.',
        //                 'skills' => json_encode(['Plumbing', 'Leak Detection']),
        //                 'budget' => 100,
        //                 'urgent' => 1,
        //                 'urgent_price' => 15,
        //                 'job_start_timeline' => '2025-03-07',
        //                 'job_end_timeline' => '2025-03-08',
        //                 'location' => 'Los Angeles, CA',
        //                 'address' => '123 Sunset Blvd, LA',
        //                 'image' => json_encode(['leak-repair.png']),
        //                 'additional_notes' => 'Need quick repair before water damage spreads.',
        //                 'featured' => 1,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ],
        //             [
        //                 'order_id' => 3,
        //                 'title' => 'Boiler System Maintenance',
        //                 'description' => 'Routine maintenance and safety check for the boiler system.',
        //                 'skills' => json_encode(['Heating Systems', 'Plumbing']),
        //                 'budget' => 250,
        //                 'urgent' => 0,
        //                 'urgent_price' => 0,
        //                 'job_start_timeline' => '2025-03-10',
        //                 'job_end_timeline' => '2025-03-11',
        //                 'location' => 'Chicago, IL',
        //                 'address' => '678 West Street, Chicago',
        //                 'image' => json_encode(['boiler-maintenance.png']),
        //                 'additional_notes' => 'Check pressure levels and clean burners.',
        //                 'featured' => 0,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ],
        //             [
        //                 'order_id' => 4,
        //                 'title' => 'Bathroom Renovation Plumbing',
        //                 'description' => 'Full plumbing installation for bathroom renovation.',
        //                 'skills' => json_encode(['Plumbing', 'Pipe Installation']),
        //                 'budget' => 1200,
        //                 'urgent' => 0,
        //                 'urgent_price' => 0,
        //                 'job_start_timeline' => '2025-04-01',
        //                 'job_end_timeline' => '2025-04-15',
        //                 'location' => 'San Francisco, CA',
        //                 'address' => '321 Ocean Drive, SF',
        //                 'image' => json_encode(['bathroom-reno.png']),
        //                 'additional_notes' => 'Install water-efficient fixtures.',
        //                 'featured' => 1,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ],
        //             [
        //                 'order_id' => 5,
        //                 'title' => 'Gas Line Installation',
        //                 'description' => 'Install a new gas line for kitchen stove.',
        //                 'skills' => json_encode(['Gas Fitting', 'Plumbing']),
        //                 'budget' => 500,
        //                 'urgent' => 1,
        //                 'urgent_price' => 50,
        //                 'job_start_timeline' => '2025-04-20',
        //                 'job_end_timeline' => '2025-04-21',
        //                 'location' => 'Houston, TX',
        //                 'address' => '789 Maple Street, TX',
        //                 'image' => json_encode(['gas-line.png']),
        //                 'additional_notes' => 'Ensure safety measures are met.',
        //                 'featured' => 0,
        //                 'created_at' => now(),
        //                 'updated_at' => now(),
        //             ],
        //         ];
                
        //         DB::table('order_details')->insert($orderDetails);
        // // Order Details Close



        // // Tradepersons category open
        // $tradepersonCategories = [
        //     ['tradeperson_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        //     ['tradeperson_id' => 2, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        //     ['tradeperson_id' => 3, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        //     ['tradeperson_id' => 4, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        //     ['tradeperson_id' => 5, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        // ];

        // DB::table('tradeperson_categories')->insert($tradepersonCategories);
        // // Tradepersons category close


        // // trade Person Reviews Open
        // $tradepersonReviews = [
        //     ['customer_id' => 4, 'tradeperson_id' => 4, 'order_id' => 4, 'review' => 'Decent service.', 'rating' => 2, 'created_at' => now(), 'updated_at' => now()],
        //     ['customer_id' => 5, 'tradeperson_id' => 5, 'order_id' => 5, 'review' => 'Could be better.', 'rating' => 1, 'created_at' => now(), 'updated_at' => now()],
        // ];

        // DB::table('tradeperson_reviews')->insert($tradepersonReviews);
        //  trade Person Reviews Close

        
        // Report Open
        // $reports = [
        //     [
        //         'key' => 'Active Jobs',
        //         'value' => '05',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'key' => 'Completed Jobs',
        //         'value' => '10',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'key' => 'Pending jobs Post',
        //         'value' => '03',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ];

        // DB::table('reports')->insert($reports);
         // Report Close
         
         
        // Order Category Open
        // $order_categories = [
        //     [
        //         'order_id' => 1,
        //         'category_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 2,
        //         'category_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 3,
        //         'category_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 4,
        //         'category_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 5,
        //         'category_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ];

        // DB::table('order_categories')->insert($order_categories);
         // Order Category Close
         
          // Order Category Open
        // $order_proposals = [
        //     [
        //         'customer_id' => 1,
        //         'tradeperson_id' => 2,
        //         'order_id' => 2,
        //         'proposed_price' => 55,
        //         'proposal_descripton' => 'lorem ipsum',
        //         'proposal_status' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ];

        // DB::table('order_proposals')->insert($order_proposals);
         // Order Category Close
         
         
          // Purchase Packages Open
        // $purchase_packages = [
        //     [
        //         'package_id' => 1,
        //         'user_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'package_id' => 2,
        //         'user_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'package_id' => 3,
        //         'user_id' => 6,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ];

        // DB::table('purchase_packages')->insert($purchase_packages);
         // Order Category Close

        

        
    }
}
