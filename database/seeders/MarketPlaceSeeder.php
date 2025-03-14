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

      
    //     // Categories Open
    //     $categories = [
    //         [
    //             'name' => 'Basic Trades Services',
    //             'subcategories' => [
    //                 ['name' => 'Carpenter', 'icon' => 'carpenter.png'],
    //                 ['name' => 'Electrician', 'icon' => 'electrician.png'],
    //                 ['name' => 'Plumber', 'icon' => 'plumber.png'],
    //                 ['name' => 'Painter', 'icon' => 'painter.png'],
    //                 ['name' => 'Masonry/Bricklayer', 'icon' => 'painter.png'],

    //             ]
    //         ],
    //         [
    //             'name' => 'Specialized Services',
    //             'subcategories' => [
    //                 ['name' => 'Roofer', 'icon' => 'roofer.png'],
    //                 ['name' => 'Ventilation and Heating (HVAC)', 'icon' => 'ventilation.png'],
    //                 ['name' => 'Tiler', 'icon' => 'tiler.png'],
    //                 ['name' => 'Flooring Specialist', 'icon' => 'flooring-specialist.png'],
    //                 ['name' => 'Window Installer', 'icon' => 'flooring-specialist.png'],
    //                 ['name' => 'Drainage and waterproofing Specialist', 'icon' => 'flooring-specialist.png'],

    //             ]
    //         ],
    //         [
    //             'name' => 'Energy Efficiency',
    //             'subcategories' => [
    //                 ['name' => 'Insulation Specialist', 'icon' => 'insulation-specialist.png'],
    //                 ['name' => 'Solar Panel Installer', 'icon' => 'solar-panel-installer.png'],
    //                 ['name' => 'Energy Auditor', 'icon' => 'energy-consultant.png'],
    //             ]
    //         ],
    //         [
    //             'name' => 'Creative Professionals',
    //             'subcategories' => [
    //                 ['name' => 'Architect', 'icon' => 'architect.png'],
    //                 ['name' => 'Interior Designer', 'icon' => 'interior-designer.png'],
    //                 ['name' => 'Landscape Architect', 'icon' => 'landscape-architect.png'],
    //                 ['name' => 'Furniture Designer', 'icon' => 'furniture-designer.png'],

    //             ]
    //         ],
    //         [
    //             'name' => 'Special Projects',
    //             'subcategories' => [
    //                 ['name' => 'Smart Home Technician', 'icon' => 'smart-home-technician.png'],
    //                 ['name' => 'Landscaping and Gardening', 'icon' => 'landscapig-and-gardening.png'],
    //                 ['name' => 'Fireplace Installer', 'icon' => 'fireplace-installer.png'],
    //             ]
    //         ],
    //         [
    //             'name' => 'Emergency Services',
    //             'subcategories' => [
    //                 ['name' => 'Emergency Plumber', 'icon' => 'emergency-plumber.png'],
    //                 ['name' => 'Emergency Electrician', 'icon' => 'emergency-electrician.png'],
    //                 ['name' => 'Snow Removal Specialist', 'icon' => 'snow-removal-specialist.png'],
    //             ]
    //         ],
    //         [
    //             'name' => 'General Services',
    //             'subcategories' => [
    //                 ['name' => 'Handyman', 'icon' => 'handyman.png'],
    //                 ['name' => 'Moving and Transport Services', 'icon' => 'moving-and-transport-services.png'],
    //                 ['name' => 'Cleaning Services', 'icon' => 'cleaning-services.png'],
    //             ]
    //         ]
    //     ];

    //     foreach ($categories as $category) {
    //         $parentId = DB::table('categories')->insertGetId([
    //             'name' => $category['name'],
    //             'description' => $category['name'] . ' description',
    //             'icon' => null,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         foreach ($category['subcategories'] as $sub) {
    //             DB::table('categories')->insert([
    //                 'parent_id' => $parentId,
    //                 'name' => $sub['name'],
    //                 'description' => $sub['name'] . ' services',
    //                 'icon' => $sub['icon'],
    //                 'created_at' => Carbon::now(),
    //                 'updated_at' => Carbon::now(),
    //             ]);
    //         }
    //     }
    //     // // Categories Close 


    //     // // Testimonials Open
    //     $testimonials = [
    //         [
    //             'user_id'    => 1,
    //             'name'       => 'Client - Sarah',
    //             'heading'    => 'From a Homeowner',
    //             'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
    //             'rating'     => 4,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 2,
    //             'name'       => 'Contractor - Ole',
    //             'heading'    => 'From a Tradesperson',
    //             'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
    //             'rating'     => 5,
    //             'verified'   => 0,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 3,
    //             'name'       => 'Client - Ingrid',
    //             'heading'    => 'From a Property Manager',
    //             'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
    //             'rating'     => 5,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 1,
    //             'name'       => 'Client - Sarah',
    //             'heading'    => 'From a Homeowner',
    //             'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
    //             'rating'     => 5,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 2,
    //             'name'       => 'Contractor - Ole',
    //             'heading'    => 'From a Tradesperson',
    //             'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
    //             'rating'     => 3,
    //             'verified'   => 0,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 3,
    //             'name'       => 'Client - Ingrid',
    //             'heading'    => 'From a Property Manager',
    //             'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
    //             'rating'     => 5,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 2,
    //             'name'       => 'Client - Sarah',
    //             'heading'    => 'From a Homeowner',
    //             'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
    //             'rating'     => 5,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 3,
    //             'name'       => 'Contractor - Ole',
    //             'heading'    => 'From a Tradesperson',
    //             'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
    //             'rating'     => 3,
    //             'verified'   => 0,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'user_id'    => 1,
    //             'name'       => 'Client - Ingrid',
    //             'heading'    => 'From a Property Manager',
    //             'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
    //             'rating'     => 5,
    //             'verified'   => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ];

    //     DB::table('testimonials')->insert($testimonials);

    //     // // Testimonials Close

    //     // // Approved Testimonials Open
    //     $approvedTestimonials = [
    //         [
    //             'testimonial_id' => 1,
    //             'user_id'        => 1,
    //             'order_number'   => 1,
    //             'created_at'     => now(),
    //             'updated_at'     => now(),
    //         ],
    //         [
    //             'testimonial_id' => 2,
    //             'user_id'        => 2,
    //             'order_number'   => 2,
    //             'created_at'     => now(),
    //             'updated_at'     => now(),
    //         ],
    //         [
    //             'testimonial_id' => 3,
    //             'user_id'        => 2,
    //             'order_number'   => 3,
    //             'created_at'     => now(),
    //             'updated_at'     => now(),
    //         ],
    //     ];

    //     DB::table('approved_testimonials')->insert($approvedTestimonials);
    //     // // Approved Testimonials Close


    //     // // Packages Open
    //     $packages = [
    //         [
    //             'name'        => 'Starter',
    //             'description' => 'Unleash the power of automation.',
    //             'price'       => 19,
    //             'features'    => json_encode([
    //                 'features_0' => ['heading' => 'Multi-step Zaps'],
    //                 'features_1' => ['heading' => '3 Premium Apps'],
    //                 'features_2' => ['heading' => '2 Users team'],
    //             ]),
    //             'created_at'  => now(),
    //             'updated_at'  => now(),
    //         ],
    //         [
    //             'name'        => 'Professional',
    //             'description' => 'Advanced tools to take your work to the next level.',
    //             'price'       => 54,
    //             'features'    => json_encode([
    //                 'features_0' => ['heading' => 'Multi-step Zaps'],
    //                 'features_1' => ['heading' => 'Unlimited Premium Apps'],
    //                 'features_2' => ['heading' => '50 Users team'],
    //                 'features_3' => ['heading' => 'Shared Workspace'],
    //             ]),
    //             'created_at'  => now(),
    //             'updated_at'  => now(),
    //         ],
    //         [
    //             'name'        => 'Company',
    //             'description' => 'Automation plus enterprise-grade features.',
    //             'price'       => 89,
    //             'features'    => json_encode([
    //                 'features_0' => ['heading' => 'Multi-step Zap'],
    //                 'features_1' => ['heading' => 'Unlimited Premium Apps'],
    //                 'features_2' => ['heading' => 'Unlimited Users Team'],
    //                 'features_3' => ['heading' => 'Advanced Admin'],
    //                 'features_4' => ['heading' => 'Custom Data Retention'],
    //             ]),
    //             'created_at'  => now(),
    //             'updated_at'  => now(),
    //         ],
    //     ];

        
    //     DB::table('packages')->insert($packages);

    //     // // Packages Close


    //     // // Blog Open


    //     $blogs = [
    //         [
    //             'title' => 'Winter: Essential Home Care for the Season',
    //             'slug' => Str::slug('Winter: Essential Home Care for the Season'),
    //             'banner' => 'winter-home-care.jpg', 
    //             'description' => 'Managing your home’s upkeep can seem overwhelming, but breaking it down by season makes it easier and more efficient. As the seasons change from autumn to winter, your home requires different care and attention. Winter brings a need for draft-proofing, pipe insulation, and HVAC maintenance. Each season has its own unique maintenance needs, and when handled by trusted professionals, your home stays safe and beautiful all year round.',
    //             'publish_by' => 'Dinbyggemarked',
    //             'publish_date' => '2024-12-23',
    //             'featured' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'title' => 'Top Home Renovation Trends You Need to Know',
    //             'slug' => Str::slug('Top Home Renovation Trends You Need to Know'),
    //             'banner' => 'home-renovation-trends.jpg',
    //             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
    //             'publish_by' => 'Admin',
    //             'publish_date' => now(),
    //             'featured' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'title' => 'How to Ensure a Smooth Home Repair Experience?',
    //             'slug' => Str::slug('How to Ensure a Smooth Home Repair Experience?'),
    //             'banner' => 'home-repair-experience.jpg',
    //             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
    //             'publish_by' => 'Admin',
    //             'publish_date' => now(),
    //             'featured' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'title' => 'Why Trusting Experienced Tradespeople?',
    //             'slug' => Str::slug('Why Trusting Experienced Tradespeople?'),
    //             'banner' => 'winter-home-care.jpg',
    //             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.',
    //             'publish_by' => 'Admin',
    //             'publish_date' => now(),
    //             'featured' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ];

    //     DB::table('blogs')->insert($blogs);
        
    //     // Blog Close

    //     // // Customer Open
    //     $customers = [
    //         [
    //             'id'         => 1,
    //             'user_id'    => 1,
    //             'first_name' => 'Brian',
    //             'last_name'  => 'Simmons',
    //             'phone'      => '03001234567',
    //             'gender'     => 'male',
    //             'city'       => 'Lahore',
    //             'country'    => 'Pakistan',
    //             'post_code'  => '54000',
    //             'address'    => 'Main Boulevard, Gulberg',
    //             'address2'   => 'Near Mall',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'id'         => 2,
    //             'user_id'    => 2,
    //             'first_name' => 'Brian',
    //             'last_name'  => 'Simmons',
    //             'phone'      => '03211234567',
    //             'gender'     => 'male',
    //             'city'       => 'Karachi',
    //             'country'    => 'Pakistan',
    //             'post_code'  => '75000',
    //             'address'    => 'DHA Phase 6',
    //             'address2'   => 'Street 45',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'id'         => 3,
    //             'user_id'    => 3,
    //             'first_name' => 'Brian',
    //             'last_name'  => 'Simmons',
    //             'phone'      => '03111234567',
    //             'gender'     => 'male',
    //             'city'       => 'Islamabad',
    //             'country'    => 'Pakistan',
    //             'post_code'  => '44000',
    //             'address'    => 'Blue Area',
    //             'address2'   => 'Commercial Market',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'id'         => 4,
    //             'user_id'    => 4,
    //             'first_name' => 'Carl',
    //             'last_name'  => 'Plumbing Ltd.',
    //             'phone'      => '03451234567',
    //             'gender'     => 'male',
    //             'city'       => 'Faisalabad',
    //             'country'    => 'Pakistan',
    //             'post_code'  => '38000',
    //             'address'    => 'Madina Town',
    //             'address2'   => 'Opposite Park',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             'id'         => 5,
    //             'user_id'    => 5,
    //             'first_name' => 'Nick',
    //             'last_name'  => 'Plumbing',
    //             'phone'      => '03561234567',
    //             'gender'     => 'male',
    //             'city'       => 'Peshawar',
    //             'country'    => 'Pakistan',
    //             'post_code'  => '25000',
    //             'address'    => 'Hayatabad',
    //             'address2'   => 'Near Hospital',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ];

    //     // Insert into database
    //     DB::table('customers')->insert($customers);
    //     // // Customer Close

        
    //     // Tradepersons Open
    //     $tradepersons = [
    //       [
    //           'user_id' => 9,
    //           'first_name' => 'East',
    //           'last_name' => 'Sami',
    //           'nick_name' => 'E S',
    //           'gender' => 'Male',
    //           'phone' => '555123456',
    //           'city' => 'Oslo',
    //           'postal_code' => '0561',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '12 Greenway Street, Oslo, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-1.jpg',
    //           'featured' => 0,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 10,
    //           'first_name' => 'DM',
    //           'last_name' => 'Service',
    //           'nick_name' => 'D M',
    //           'gender' => 'Male',
    //           'phone' => '555987654',
    //           'city' => 'Bergen',
    //           'postal_code' => '5017',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '34 Blueway Road, Bergen, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-2.jpg',
    //           'featured' => 0,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 11,
    //           'first_name' => 'Alba',
    //           'last_name' => 'Plumbing',
    //           'nick_name' => 'A P',
    //           'gender' => 'Male',
    //           'phone' => '555223344',
    //           'city' => 'Trondheim',
    //           'postal_code' => '7011',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '78 Redhill Drive, Trondheim, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //            'banner'     => 'tradeperson-banner-3.jpg',
    //            'featured' => 0,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 12,
    //           'first_name' => 'Carl',
    //           'last_name' => 'Plumbing Ltd.',
    //           'nick_name' => 'C P L',
    //           'gender' => 'Male',
    //           'phone' => '555445566',
    //           'city' => 'Stavanger',
    //           'postal_code' => '4006',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '90 Waterfall Lane, Stavanger, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //            'banner'     => 'tradeperson-banner-4.jpg',
    //            'featured' => 0,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 13,
    //           'first_name' => 'Nick',
    //           'last_name' => 'Plumbing',
    //           'nick_name' => 'N K',
    //           'gender' => 'Male',
    //           'phone' => '555667788',
    //           'city' => 'Drammen',
    //           'postal_code' => '3045',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '45 Silverline Street, Drammen, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-5.jpg',
    //           'featured' => 1,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 14,
    //           'first_name' => 'Kim',
    //           'last_name' => 'Sarah LTD',
    //           'nick_name' => 'K P & S L T D',
    //           'gender' => 'Male',
    //           'phone' => '555889900',
    //           'city' => 'Kristiansand',
    //           'postal_code' => '4601',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '67 Maple Avenue, Kristiansand, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-6.jpg',
    //           'featured' => 1,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 15,
    //           'first_name' => 'East',
    //           'last_name' => 'Sami',
    //           'nick_name' => 'E S',
    //           'gender' => 'Male',
    //           'phone' => '555999111',
    //           'city' => 'Tromsø',
    //           'postal_code' => '9008',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '10 Pine Road, Tromsø, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-7.jpg',
    //           'featured' => 1,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 16,
    //           'first_name' => 'DM',
    //           'last_name' => 'Service',
    //           'nick_name' => 'D M',
    //           'gender' => 'Female',
    //           'phone' => '555222333',
    //           'city' => 'Haugesund',
    //           'postal_code' => '5525',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '5 Brook Lane, Haugesund, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-8.jpg',
    //           'featured' => 1,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //       [
    //           'user_id' => 17,
    //           'first_name' => 'Alba',
    //           'last_name' => 'Plumbing',
    //           'nick_name' => 'A P',
    //           'gender' => 'Male',
    //           'phone' => '555777888',
    //           'city' => 'Fredrikstad',
    //           'postal_code' => '1608',
    //           'latitude' => 42.49970110525192,
    //           'longitude' => -71.07384474698021,
    //           'about_me' => 'At Alba Plumbing, we’re passionate about delivering dependable, high-quality home services to keep your property comfortable and functioning seamlessly. With over three decades of expertise, our licensed and certified technicians specialize in plumbing, heating, cooling, and electrical solutions for homes and businesses across the greater Boston area. From minor repairs to full installations and routine maintenance, we’re here to provide exceptional service every step of the way.
    //                          We believe in building trust through honesty, integrity, and customer satisfaction. At Alba Plumbing, we take the time to understand your unique needs, providing customized solutions that suit your lifestyle and budget. Whether it’s plumbing repairs, water heater installations, air conditioning replacements, or electrical upgrades, our goal is to ensure your home’s critical systems operate efficiently and effectively.',
                            
    //           'service' =>  'Bath Installation, Bath Repair, Bathroom Plumbing, Boiler Installation, Boiler Repair, Boiler Servicing, Central Heating Installation, Central Heating Repairs, Dishwasher Installation, Drain Cleaning, Drain Services, Emergency Plumbing, Kitchen Plumbing, Plumbing Inspection, Plumbing Repairs, Radiator Installation, Radiator Repair, Shower Installation, Toilet Installation, Toilet Repair, Underfloor Heating, Water Heater Installation, Water Softener Installation, Water Softener Repair, Bathroom Renovation, Wall Heater Installation, Water Leak Detection, Plumber London, Plumbing London, Plumbing Servces, Plumbing Installarions, Professional Plumber, Electrical repairs, Electrician, Electrical Services, Electrical Installations, Handyman, Handyman Services, Handyman Repairs, Painting and decorating, Painter, Gas Certificates, Gas Safety Check',
    //           'address' => '23 Riverside Drive, Fredrikstad, Norway',
    //           'portfolio' => json_encode(['portfolio-image-1.jpg','portfolio-image-2.jpg','portfolio-image-3.jpg','portfolio-image-4.jpg','portfolio-image-5.jpg','portfolio-image-6.jpg','portfolio-image-7.jpg',]),
    //           'certificate' => json_encode(['certificate-image-1.jpg']),
    //           'banner'     => 'tradeperson-banner-9.jpg',
    //           'featured' => 1,
    //           'created_at' => Carbon::now(),
    //           'updated_at' => Carbon::now(),
    //       ],
    //   ];

    //   DB::table('tradepersons')->insert($tradepersons);
    //   // Tradepersons Close


    //    // Tradepersons Details Open
    //   $tradepersonsdetails = [
    //     [
    //         'tradeperson_id' => 3,  
    //         'about'          => 'Certified plumbing expert offering emergency repair services.',
    //         'services'       => 'Pipe fitting, leakage repair, water supply solutions.',
    //         'portfolio'      => json_encode(['sophie-watersafe1.jpg', 'sophie-watersafe2.jpg']),
    //         'certifications' => json_encode(['cert-sophie-watersafe.pdf']),
    //         'created_at'     => Carbon::now(),
    //         'updated_at'     => Carbon::now(),
    //     ],
    //     [
    //         'tradeperson_id' => 4,  
    //         'about'          => 'Specialist in commercial plumbing solutions and pipe fitting.',
    //         'services'       => 'Industrial pipe installation, heating systems, and maintenance.',
    //         'portfolio'      => json_encode(['david-pipes-pro1.jpg', 'david-pipes-pro2.jpg']),
    //         'certifications' => json_encode(['cert-david-pipes-pro.pdf']),
    //         'created_at'     => Carbon::now(),
    //         'updated_at'     => Carbon::now(),
    //     ],
    // ];

    // DB::table('tradeperson_details')->insert($tradepersonsdetails);
    // // Tradepersons Details close

    //   // Order Status open
    //   $statuses = [
    //       ['id' => 1, 'status' => 'Processing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 2, 'status' => 'In Progress', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 4, 'status' => 'Completed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 5, 'status' => 'Cancelled', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //   ];

    //   DB::table('order_statuses')->insert($statuses);
    //   // Order Status close


    //   // Payment Status Open
    //   $paymentstatuses = [
    //       ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 2, 'status' => 'Failed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 3, 'status' => 'Refund', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 4, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //       ['id' => 5, 'status' => 'In-Complete', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //   ];

    //   DB::table('payment_statuses')->insert($paymentstatuses);
    //   // Payment Status Close
       

    //     //  // Order Open
    //      $orders = [
    //         ['customer_id' => 1, 'tradeperson_id' => 1, 'order_status' => 1, 'payment_status' => 1, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 2, 'tradeperson_id' => 2, 'order_status' => 2, 'payment_status' => 2, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 3, 'tradeperson_id' => 3, 'order_status' => 3, 'payment_status' => 3, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 4, 'tradeperson_id' => 4, 'order_status' => 4, 'payment_status' => 4, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 5, 'tradeperson_id' => 5, 'order_status' => 5, 'payment_status' => 5, 'created_at' => now(), 'updated_at' => now()],
    //     ];
        
    //     DB::table('orders')->insert($orders);
    //     // // Order Close

    //     //  Proposal Statuses Open
    //     $proposalstatuses = [
    //         ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['id' => 2, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //         ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    //     ];

    //     DB::table('proposal_statuses')->insert($proposalstatuses);
    //     //  Proposal Statuses Close
        

    //     // // Order Details Open
    //     $orderDetails = [
    //       [
    //           'order_id' => 1,
    //           'title' => 'Need to Fix Kitchen Pipe',
    //           'description' => 'I am seeking a skilled and reliable plumber to fix kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes. The role involves ensuring the kitchen plumbing system is functioning properly and safely.',
    //           'budget' => 2500,
    //           'urgent' => 1,
    //           'urgent_price' => 20,
    //           'job_start_timeline' => '12-Feb-2025',
    //           'job_end_timeline' => '13-Mar-2025',
    //           'location' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
    //           'address' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
    //           'image' => json_encode(['sink-install.png']),
    //           'additional_notes' => 'Ensure all fittings are leak-proof.',
    //           'featured' => 1,
    //           'created_at' => now(),
    //           'updated_at' => now(),
    //       ],
    //       [
    //           'order_id' => 2,
    //           'title' => 'Electrical Wiring Repair',
    //           'description' => 'Looking for a certified electrician to troubleshoot and repair faulty wiring in my apartment. The job includes checking circuits, replacing damaged wires, and ensuring safe electrical connections.',
    //           'budget' => 3500,
    //           'urgent' => 0,
    //           'urgent_price' => 0,
    //           'job_start_timeline' => '15-Feb-2025',
    //           'job_end_timeline' => '20-Mar-2025',
    //           'location' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
    //           'address' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
    //           'image' => json_encode(['electrical-repair.jpg']),
    //           'additional_notes' => 'Ensure all wiring follows safety standards.',
    //           'featured' => 0,
    //           'created_at' => now(),
    //           'updated_at' => now(),
    //       ],
    //       [
    //           'order_id' => 3,
    //           'title' => 'Bathroom Tile Replacement',
    //           'description' => 'Looking for an experienced tiler to replace bathroom floor and wall tiles. The work includes removing old tiles, leveling the surface, and installing new ceramic tiles with precision.',
    //           'budget' => 4200,
    //           'urgent' => 1,
    //           'urgent_price' => 30,
    //           'job_start_timeline' => '18-Feb-2025',
    //           'job_end_timeline' => '25-Mar-2025',
    //           'location' => 'Grensen 5, Bergen, NOR 5017, Norway.',
    //           'address' => 'Grensen 5, Bergen, NOR 5017, Norway.',
    //           'image' => json_encode(['tile-replacement.png']),
    //           'additional_notes' => 'Use high-quality waterproof adhesive.',
    //           'featured' => 1,
    //           'created_at' => now(),
    //           'updated_at' => now(),
    //       ],
    //   ];
                
    //             DB::table('order_details')->insert($orderDetails);
    //     // // Order Details Close



    //     // // Tradepersons category open
    //     $tradepersonCategories = [
    //         ['tradeperson_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    //         ['tradeperson_id' => 2, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
    //         ['tradeperson_id' => 3, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
    //         ['tradeperson_id' => 4, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
    //         ['tradeperson_id' => 5, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
    //     ];

    //     DB::table('tradeperson_categories')->insert($tradepersonCategories);
    //     // // Tradepersons category close


    //     // // trade Person Reviews Open
    //     $tradepersonReviews = [
    //         ['customer_id' => 1, 'tradeperson_id' => 1, 'order_id' => 1, 'review' => 'Alba Plumbing did an excellent job with my end-of-lease clean. The team was thorough, professional, and made sure everything was spotless. I got my full deposit back—highly recommend!', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 2, 'tradeperson_id' => 1, 'order_id' => 2, 'review' => 'My gutters were clogged and sagging, but they fixed them perfectly. The team was knowledgeable, explained everything clearly, and completed the job efficiently.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    //         ['customer_id' => 3, 'tradeperson_id' => 1, 'order_id' => 3, 'review' => 'Reliable and efficient repair. The plumber was knowledgeable and got my heater working perfectly.', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
    //     ];

    //     DB::table('tradeperson_reviews')->insert($tradepersonReviews);
    //     //  trade Person Reviews Close

        
    //     // Report Open
    //     $reports = [
    //         [
    //             'key' => 'Active Jobs',
    //             'value' => '05',
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'key' => 'Completed Jobs',
    //             'value' => '10',
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'key' => 'Pending jobs Post',
    //             'value' => '03',
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
            
    //     ];

    //     DB::table('reports')->insert($reports);
    //      // Report Close
         
         
    //     // Order Category Open
    //     $order_categories = [
    //         [
    //             'order_id' => 1,
    //             'category_id' => 1,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 2,
    //             'category_id' => 2,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 3,
    //             'category_id' => 3,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 4,
    //             'category_id' => 4,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 5,
    //             'category_id' => 5,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
            
    //     ];

    //     DB::table('order_categories')->insert($order_categories);
    //      // Order Category Close
         
    //       // Order Proposals Open
    //       $orderProposals = [
    //         [
    //             'customer_id' => 1,
    //             'tradeperson_id' => 2,
    //             'order_id' => 1,
    //             'proposed_price' => 150.00,
    //             'proposal_description' => 'I can complete the plumbing work within 2 days.',
    //             'proposal_status' => 1,
    //             'featured' => 1,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'customer_id' => 2,
    //             'tradeperson_id' => 3,
    //             'order_id' => 2,
    //             'proposed_price' => 200.00,
    //             'proposal_description' => 'Offering high-quality service with a 1-year warranty.',
    //             'proposal_status' => 2,
    //             'featured' => 0,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'customer_id' => 3,
    //             'tradeperson_id' => 1,
    //             'order_id' => 3,
    //             'proposed_price' => 180.00,
    //             'proposal_description' => 'I will provide fast and reliable service at a fair price.',
    //             'proposal_status' => 3,
    //             'featured' => 0,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //     ];

    //     DB::table('order_proposals')->insert($orderProposals);
    //      // Order Proposals Close
         
         
    //       // Purchase Packages Open
    //     $purchase_packages = [
    //         [
    //             'package_id' => 1,
    //             'user_id' => 1,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'package_id' => 2,
    //             'user_id' => 2,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'package_id' => 3,
    //             'user_id' => 3,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
            
    //     ];

    //     DB::table('purchase_packages')->insert($purchase_packages);
    //      // Order Category Close


    //      // Order Milestones Open
    //     $order_milestones = [
    //         [
    //             'order_id' => 1,
    //             'tradeperson_id' => 1,
    //             'milestone' => json_encode([
    //                 'title' => '1st Milestone',
    //                 'days' => 5,
    //                 'approved' => true,
    //                 'description' => 'Diagnosis & Inspection',
    //             ]),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 2,
    //             'tradeperson_id' => 2,
    //             'milestone' => json_encode([
    //                 'title' => '2nd Milestone',
    //                 'days' => 10,
    //                 'approved' => true,
    //                 'description' => 'Material Procurement',
    //             ]),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 3,
    //             'tradeperson_id' => 3,
    //             'milestone' => json_encode([
    //                 'title' => '3rd Milestone',
    //                 'days' => 20,
    //                 'approved' => false,
    //                 'description' => 'Material Procurement',
    //             ]),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'order_id' => 4,
    //             'tradeperson_id' => 4,
    //             'milestone' => json_encode([
    //                 'title' => '4th Milestone',
    //                 'days' => 30,
    //                 'approved' => false,
    //                 'description' => 'Final Testing & Cleanup',
    //             ]),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //     ];

    //     DB::table('order_milestones')->insert($order_milestones);

    //   // Order Milestones Close
        

        
    }
}