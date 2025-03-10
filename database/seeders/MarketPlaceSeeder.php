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

        // Creating Roles
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);
        $tradepersonRole = Role::create(['name' => 'tradeperson']);

        // Creating Permissions
        $viewAdmin = Permission::create(['name' => 'view admin']);
        $viewCustomer = Permission::create(['name' => 'view customer']);
        $viewTradeperson = Permission::create(['name' => 'view tradeperson']);

        // Assign Permissions to Roles
        $adminRole->givePermissionTo($viewAdmin);
        $customerRole->givePermissionTo($viewCustomer);
        $tradepersonRole->givePermissionTo($viewTradeperson);

        // Creating Users and Assigning Roles
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $customer->assignRole($customerRole);

        $tradeperson = User::create([
            'name' => 'Tradeperson',
            'email' => 'tradeperson@mailinator.com',
            'password' => Hash::make('password'),
        ]);
        $tradeperson->assignRole($tradepersonRole);



    //     // User Open
        $users = [
          [
              'id' => 4,
              'name' => 'Kane',
              'email' => 'kane@mailinator.com',
              'password' => Hash::make('password'), // Securely hash password
              'user_approved' => 0,
              'avatar' => 'avatar.png',
              'remember_token' => str()->random(60),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'id' => 5,
              'name' => 'Smith',
              'email' => 'smith@mailinator.com',
              'password' => Hash::make('password'),
              'user_approved' => 0,
              'avatar' => 'avatar.png',
              'remember_token' => null,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'id' => 6,
              'name' => 'David',
              'email' => 'david@mailinator.com',
              'password' => Hash::make('password'),
              'user_approved' => 0,
              'avatar' => 'avatar.png',
              'remember_token' => null,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'id' => 7,
              'name' => 'John',
              'email' => 'john@mailinator.com',
              'password' => Hash::make('password'),
              'user_approved' => 0,
              'avatar' => 'avatar.png',
              'remember_token' => str()->random(60),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'id' => 8,
              'name' => 'Dan',
              'email' => 'dan@mailinator.com',
              'password' => Hash::make('password'),
              'user_approved' => 0,
              'avatar' => 'avatar.png',
              'remember_token' => str()->random(60),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
      ];

      DB::table('users')->insert($users);
     // User Close

      
        // Categories Open
        $categories = [
            [
                'name' => 'Basic Trades Services',
                'subcategories' => [
                    ['name' => 'Carpenter', 'icon' => 'carpenter.png'],
                    ['name' => 'Electrician', 'icon' => 'electrician.png'],
                    ['name' => 'Plumber', 'icon' => 'plumber.png'],
                    ['name' => 'Painter', 'icon' => 'painter.png'],
                    ['name' => 'Masonry/Bricklayer', 'icon' => 'painter.png'],

                ]
            ],
            [
                'name' => 'Specialized Services',
                'subcategories' => [
                    ['name' => 'Roofer', 'icon' => 'roofer.png'],
                    ['name' => 'Ventilation and Heating (HVAC)', 'icon' => 'ventilation.png'],
                    ['name' => 'Tiler', 'icon' => 'tiler.png'],
                    ['name' => 'Flooring Specialist', 'icon' => 'flooring-specialist.png'],
                    ['name' => 'Window Installer', 'icon' => 'flooring-specialist.png'],
                    ['name' => 'Drainage and waterproofing Specialist', 'icon' => 'flooring-specialist.png'],

                ]
            ],
            [
                'name' => 'Energy Efficiency',
                'subcategories' => [
                    ['name' => 'Insulation Specialist', 'icon' => 'insulation-specialist.png'],
                    ['name' => 'Solar Panel Installer', 'icon' => 'solar-panel-installer.png'],
                    ['name' => 'Energy Auditor', 'icon' => 'energy-consultant.png'],
                ]
            ],
            [
                'name' => 'Creative Professionals',
                'subcategories' => [
                    ['name' => 'Architect', 'icon' => 'architect.png'],
                    ['name' => 'Interior Designer', 'icon' => 'interior-designer.png'],
                    ['name' => 'Landscape Architect', 'icon' => 'landscape-architect.png'],
                    ['name' => 'Furniture Designer', 'icon' => 'furniture-designer.png'],

                ]
            ],
            [
                'name' => 'Special Projects',
                'subcategories' => [
                    ['name' => 'Smart Home Technician', 'icon' => 'smart-home-technician.png'],
                    ['name' => 'Landscaping and Gardening', 'icon' => 'landscapig-and-gardening.png'],
                    ['name' => 'Fireplace Installer', 'icon' => 'fireplace-installer.png'],
                ]
            ],
            [
                'name' => 'Emergency Services',
                'subcategories' => [
                    ['name' => 'Emergency Plumber', 'icon' => 'emergency-plumber.png'],
                    ['name' => 'Emergency Electrician', 'icon' => 'emergency-electrician.png'],
                    ['name' => 'Snow Removal Specialist', 'icon' => 'snow-removal-specialist.png'],
                ]
            ],
            [
                'name' => 'General Services',
                'subcategories' => [
                    ['name' => 'Handyman', 'icon' => 'handyman.png'],
                    ['name' => 'Moving and Transport Services', 'icon' => 'moving-and-transport-services.png'],
                    ['name' => 'Cleaning Services', 'icon' => 'cleaning-services.png'],
                ]
            ]
        ];

        foreach ($categories as $category) {
            $parentId = DB::table('categories')->insertGetId([
                'name' => $category['name'],
                'description' => $category['name'] . ' description',
                'icon' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            foreach ($category['subcategories'] as $sub) {
                DB::table('categories')->insert([
                    'parent_id' => $parentId,
                    'name' => $sub['name'],
                    'description' => $sub['name'] . ' services',
                    'icon' => $sub['icon'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
        // // Categories Close 


        // // Testimonials Open
        $testimonials = [
            [
                'user_id'    => 1,
                'name'       => 'Client - Sarah',
                'heading'    => 'From a Homeowner',
                'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
                'rating'     => 4,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 2,
                'name'       => 'Contractor - Ole',
                'heading'    => 'From a Tradesperson',
                'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
                'rating'     => 5,
                'verified'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 3,
                'name'       => 'Client - Ingrid',
                'heading'    => 'From a Property Manager',
                'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
                'rating'     => 5,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 1,
                'name'       => 'Client - Sarah',
                'heading'    => 'From a Homeowner',
                'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
                'rating'     => 5,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 2,
                'name'       => 'Contractor - Ole',
                'heading'    => 'From a Tradesperson',
                'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
                'rating'     => 3,
                'verified'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 3,
                'name'       => 'Client - Ingrid',
                'heading'    => 'From a Property Manager',
                'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
                'rating'     => 5,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 2,
                'name'       => 'Client - Sarah',
                'heading'    => 'From a Homeowner',
                'description'=> 'As a busy working mom, I rarely have time to deal with home repairs. This platform has been a lifesaver! I needed a new faucet installed, and within a few hours of posting the job, I had several qualified plumbers contact me. The BankID verification gave me peace of mind knowing I was dealing with legitimate professionals. The escrow system was also great – I felt secure knowing my money was safe until the job was done properly. I\'ll definitely be using this platform again for future home projects.',
                'rating'     => 5,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 3,
                'name'       => 'Contractor - Ole',
                'heading'    => 'From a Tradesperson',
                'description'=> 'Finding new clients can be a real struggle, but this platform has made it so much easier. The registration process was straightforward with the BankID integration, and I appreciate the focus on verified professionals. I\'ve already landed a couple of good jobs through the site. The only minor thing is that sometimes there are a lot of applicants for popular jobs, but that\'s to be expected. Overall, it\'s a great tool for connecting with homeowners and growing my business.',
                'rating'     => 3,
                'verified'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 1,
                'name'       => 'Client - Ingrid',
                'heading'    => 'From a Property Manager',
                'description'=> 'Managing multiple properties means I constantly need reliable tradespeople. This platform has streamlined the entire process. I can quickly post multiple jobs, review bids, and communicate directly with contractors all in one place. The project management tools are incredibly helpful for keeping track of everything. The escrow system is also a huge plus, simplifying payments and ensuring accountability. This platform has saved me so much time and hassle – highly recommended!',
                'rating'     => 5,
                'verified'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('testimonials')->insert($testimonials);

        // // Testimonials Close

        // // Approved Testimonials Open
        $approvedTestimonials = [
            [
                'testimonial_id' => 1,
                'user_id'        => 1,
                'order_number'   => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'testimonial_id' => 2,
                'user_id'        => 2,
                'order_number'   => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'testimonial_id' => 3,
                'user_id'        => 2,
                'order_number'   => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('approved_testimonials')->insert($approvedTestimonials);
        // // Approved Testimonials Close


        // // Packages Open
        $packages = [
            [
                'name'        => 'Starter',
                'description' => 'Unleash the power of automation.',
                'price'       => 19,
                'features'    => json_encode([
                    'features_0' => ['heading' => 'Multi-step Zaps'],
                    'features_1' => ['heading' => '3 Premium Apps'],
                    'features_2' => ['heading' => '2 Users team'],
                ]),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Professional',
                'description' => 'Advanced tools to take your work to the next level.',
                'price'       => 54,
                'features'    => json_encode([
                    'features_0' => ['heading' => 'Multi-step Zaps'],
                    'features_1' => ['heading' => 'Unlimited Premium Apps'],
                    'features_2' => ['heading' => '50 Users team'],
                    'features_3' => ['heading' => 'Shared Workspace'],
                ]),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Company',
                'description' => 'Automation plus enterprise-grade features.',
                'price'       => 89,
                'features'    => json_encode([
                    'features_0' => ['heading' => 'Multi-step Zap'],
                    'features_1' => ['heading' => 'Unlimited Premium Apps'],
                    'features_2' => ['heading' => 'Unlimited Users Team'],
                    'features_3' => ['heading' => 'Advanced Admin'],
                    'features_4' => ['heading' => 'Custom Data Retention'],
                ]),
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        
        DB::table('packages')->insert($packages);

        // // Packages Close


        // // Blog Open


        $blogs = [
            [
                'title' => 'Winter: Essential Home Care for the Season',
                'slug' => Str::slug('Winter: Essential Home Care for the Season'),
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
                'slug' => Str::slug('Top Home Renovation Trends You Need to Know'),
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
                'slug' => Str::slug('How to Ensure a Smooth Home Repair Experience?'),
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
                'slug' => Str::slug('Why Trusting Experienced Tradespeople?'),
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
        $customers = [
            [
                'id'         => 1,
                'user_id'    => 1,
                'first_name' => 'East',
                'last_name'  => 'Sami',
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
                'first_name' => 'DM',
                'last_name'  => 'Service',
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
                'first_name' => 'Alto',
                'last_name'  => 'Plumbing',
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

        
        // Tradepersons Open
        $tradepersons = [
          [
              'user_id' => 1,
              'first_name' => 'East',
              'last_name' => 'Sami',
              'gender' => 'Male',
              'phone' => '555123456',
              'city' => 'Oslo',
              'postal_code' => '0561',
              'about_me' => 'Expert plumber with 10+ years of experience in fixing leaks and pipe installations.',
              'address' => '12 Greenway Street, Oslo, Norway',
              'portfolio' => json_encode(['east-sami1.jpg', 'east-sami2.jpg']),
              'certificate' => 'cert-east-sami.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 2,
              'first_name' => 'DM',
              'last_name' => 'Service',
              'gender' => 'Male',
              'phone' => '555987654',
              'city' => 'Bergen',
              'postal_code' => '5017',
              'about_me' => 'Providing top-notch plumbing services for households and businesses.',
              'address' => '34 Blueway Road, Bergen, Norway',
              'portfolio' => json_encode(['dm-service1.jpg', 'dm-service2.jpg']),
              'certificate' => 'cert-dm-service.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 3,
              'first_name' => 'Alba',
              'last_name' => 'Plumbing',
              'gender' => 'Male',
              'phone' => '555223344',
              'city' => 'Trondheim',
              'postal_code' => '7011',
              'about_me' => 'Reliable and experienced plumbing services for homes and offices.',
              'address' => '78 Redhill Drive, Trondheim, Norway',
              'portfolio' => json_encode(['alba-plumbing1.jpg', 'alba-plumbing2.jpg']),
              'certificate' => 'cert-alba-plumbing.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 4,
              'first_name' => 'Carl',
              'last_name' => 'Plumbing Ltd.',
              'gender' => 'Male',
              'phone' => '555445566',
              'city' => 'Stavanger',
              'postal_code' => '4006',
              'about_me' => 'Dedicated to high-quality plumbing installations and maintenance.',
              'address' => '90 Waterfall Lane, Stavanger, Norway',
              'portfolio' => json_encode(['carl-plumbing1.jpg', 'carl-plumbing2.jpg']),
              'certificate' => 'cert-carl-plumbing.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 5,
              'first_name' => 'Nick',
              'last_name' => 'Plumbing',
              'gender' => 'Male',
              'phone' => '555667788',
              'city' => 'Drammen',
              'postal_code' => '3045',
              'about_me' => 'Specialist in water heater repairs and pipe replacements.',
              'address' => '45 Silverline Street, Drammen, Norway',
              'portfolio' => json_encode(['nick-plumbing1.jpg', 'nick-plumbing2.jpg']),
              'certificate' => 'cert-nick-plumbing.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 1,
              'first_name' => 'Kim',
              'last_name' => 'Sarah LTD',
              'gender' => 'Male',
              'phone' => '555889900',
              'city' => 'Kristiansand',
              'postal_code' => '4601',
              'about_me' => 'Industrial and home plumbing expert with over 15 years of experience.',
              'address' => '67 Maple Avenue, Kristiansand, Norway',
              'portfolio' => json_encode(['kim-sarah1.jpg', 'kim-sarah2.jpg']),
              'certificate' => 'cert-kim-sarah.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 2,
              'first_name' => 'Robert',
              'last_name' => 'Fixit',
              'gender' => 'Male',
              'phone' => '555999111',
              'city' => 'Tromsø',
              'postal_code' => '9008',
              'about_me' => 'Experienced plumbing professional specializing in leak detection and repair.',
              'address' => '10 Pine Road, Tromsø, Norway',
              'portfolio' => json_encode(['robert-fixit1.jpg', 'robert-fixit2.jpg']),
              'certificate' => 'cert-robert-fixit.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 3,
              'first_name' => 'Sophie',
              'last_name' => 'Watersafe',
              'gender' => 'Female',
              'phone' => '555222333',
              'city' => 'Haugesund',
              'postal_code' => '5525',
              'about_me' => 'Certified plumbing expert offering emergency repair services.',
              'address' => '5 Brook Lane, Haugesund, Norway',
              'portfolio' => json_encode(['sophie-watersafe1.jpg', 'sophie-watersafe2.jpg']),
              'certificate' => 'cert-sophie-watersafe.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'user_id' => 4,
              'first_name' => 'David',
              'last_name' => 'Pipes Pro',
              'gender' => 'Male',
              'phone' => '555777888',
              'city' => 'Fredrikstad',
              'postal_code' => '1608',
              'about_me' => 'Specialist in commercial plumbing solutions and pipe fitting.',
              'address' => '23 Riverside Drive, Fredrikstad, Norway',
              'portfolio' => json_encode(['david-pipes-pro1.jpg', 'david-pipes-pro2.jpg']),
              'certificate' => 'cert-david-pipes-pro.pdf',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
      ];

      DB::table('tradepersons')->insert($tradepersons);
      // Tradepersons Close


       // Tradepersons Details Open
      $tradepersonsdetails = [
        [
            'tradeperson_id' => 3,  
            'about'          => 'Certified plumbing expert offering emergency repair services.',
            'services'       => 'Pipe fitting, leakage repair, water supply solutions.',
            'portfolio'      => json_encode(['sophie-watersafe1.jpg', 'sophie-watersafe2.jpg']),
            'certifications' => json_encode(['cert-sophie-watersafe.pdf']),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ],
        [
            'tradeperson_id' => 4,  
            'about'          => 'Specialist in commercial plumbing solutions and pipe fitting.',
            'services'       => 'Industrial pipe installation, heating systems, and maintenance.',
            'portfolio'      => json_encode(['david-pipes-pro1.jpg', 'david-pipes-pro2.jpg']),
            'certifications' => json_encode(['cert-david-pipes-pro.pdf']),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ],
    ];

    DB::table('tradeperson_details')->insert($tradepersonsdetails);
    // Tradepersons Details close

      // Order Status open
      $statuses = [
          ['id' => 1, 'status' => 'Processing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 2, 'status' => 'In Progress', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 4, 'status' => 'Completed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 5, 'status' => 'Cancelled', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
      ];

      DB::table('order_statuses')->insert($statuses);
      // Order Status close


      // Payment Status Open
      $paymentstatuses = [
          ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 2, 'status' => 'Failed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 3, 'status' => 'Refund', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 4, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['id' => 5, 'status' => 'In-Complete', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
      ];

      DB::table('payment_statuses')->insert($paymentstatuses);
      // Payment Status Close
       

        //  // Order Open
         $orders = [
            ['customer_id' => 1, 'tradeperson_id' => 1, 'order_status' => 1, 'payment_status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 2, 'tradeperson_id' => 2, 'order_status' => 2, 'payment_status' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 3, 'tradeperson_id' => 3, 'order_status' => 3, 'payment_status' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 4, 'tradeperson_id' => 4, 'order_status' => 4, 'payment_status' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 5, 'tradeperson_id' => 5, 'order_status' => 5, 'payment_status' => 5, 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('orders')->insert($orders);
        // // Order Close

        //  Proposal Statuses Open
        $proposalstatuses = [
            ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('proposal_statuses')->insert($proposalstatuses);
        //  Proposal Statuses Close
        

        // // Order Details Open
        $orderDetails = [
          [
              'order_id' => 1,
              'title' => 'Need to Fix Kitchen Pipe',
              'description' => 'I am seeking a skilled and reliable plumber to fix kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes. The role involves ensuring the kitchen plumbing system is functioning properly and safely.',
              'budget' => 2500,
              'urgent' => 1,
              'urgent_price' => 20,
              'job_start_timeline' => '12-Feb-2025',
              'job_end_timeline' => '13-Mar-2025',
              'location' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
              'address' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
              'image' => json_encode(['sink-install.png']),
              'additional_notes' => 'Ensure all fittings are leak-proof.',
              'featured' => 1,
              'created_at' => now(),
              'updated_at' => now(),
          ],
          [
              'order_id' => 2,
              'title' => 'Electrical Wiring Repair',
              'description' => 'Looking for a certified electrician to troubleshoot and repair faulty wiring in my apartment. The job includes checking circuits, replacing damaged wires, and ensuring safe electrical connections.',
              'budget' => 3500,
              'urgent' => 0,
              'urgent_price' => 0,
              'job_start_timeline' => '15-Feb-2025',
              'job_end_timeline' => '20-Mar-2025',
              'location' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
              'address' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
              'image' => json_encode(['electrical-repair.jpg']),
              'additional_notes' => 'Ensure all wiring follows safety standards.',
              'featured' => 0,
              'created_at' => now(),
              'updated_at' => now(),
          ],
          [
              'order_id' => 3,
              'title' => 'Bathroom Tile Replacement',
              'description' => 'Looking for an experienced tiler to replace bathroom floor and wall tiles. The work includes removing old tiles, leveling the surface, and installing new ceramic tiles with precision.',
              'budget' => 4200,
              'urgent' => 1,
              'urgent_price' => 30,
              'job_start_timeline' => '18-Feb-2025',
              'job_end_timeline' => '25-Mar-2025',
              'location' => 'Grensen 5, Bergen, NOR 5017, Norway.',
              'address' => 'Grensen 5, Bergen, NOR 5017, Norway.',
              'image' => json_encode(['tile-replacement.png']),
              'additional_notes' => 'Use high-quality waterproof adhesive.',
              'featured' => 1,
              'created_at' => now(),
              'updated_at' => now(),
          ],
      ];
                
                DB::table('order_details')->insert($orderDetails);
        // // Order Details Close



        // // Tradepersons category open
        $tradepersonCategories = [
            ['tradeperson_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['tradeperson_id' => 2, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['tradeperson_id' => 3, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['tradeperson_id' => 4, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['tradeperson_id' => 5, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('tradeperson_categories')->insert($tradepersonCategories);
        // // Tradepersons category close


        // // trade Person Reviews Open
        $tradepersonReviews = [
            ['customer_id' => 1, 'tradeperson_id' => 1, 'order_id' => 1, 'review' => 'Decent service.', 'rating' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 2, 'tradeperson_id' => 2, 'order_id' => 2, 'review' => 'Could be better.', 'rating' => 1, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('tradeperson_reviews')->insert($tradepersonReviews);
        //  trade Person Reviews Close

        
        // Report Open
        $reports = [
            [
                'key' => 'Active Jobs',
                'value' => '05',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Completed Jobs',
                'value' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Pending jobs Post',
                'value' => '03',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        DB::table('reports')->insert($reports);
         // Report Close
         
         
        // Order Category Open
        $order_categories = [
            [
                'order_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 2,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 3,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 4,
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'order_id' => 5,
                'category_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        DB::table('order_categories')->insert($order_categories);
         // Order Category Close
         
          // Order Proposals Open
          $orderProposals = [
            [
                'customer_id' => 1,
                'tradeperson_id' => 2,
                'order_id' => 1,
                'proposed_price' => 150.00,
                'proposal_description' => 'I can complete the plumbing work within 2 days.',
                'proposal_status' => 1,
                'featured' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_id' => 2,
                'tradeperson_id' => 3,
                'order_id' => 2,
                'proposed_price' => 200.00,
                'proposal_description' => 'Offering high-quality service with a 1-year warranty.',
                'proposal_status' => 2,
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_id' => 3,
                'tradeperson_id' => 1,
                'order_id' => 3,
                'proposed_price' => 180.00,
                'proposal_description' => 'I will provide fast and reliable service at a fair price.',
                'proposal_status' => 3,
                'featured' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('order_proposals')->insert($orderProposals);
         // Order Proposals Close
         
         
          // Purchase Packages Open
        $purchase_packages = [
            [
                'package_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'package_id' => 2,
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'package_id' => 3,
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        DB::table('purchase_packages')->insert($purchase_packages);
         // Order Category Close


         // Order Milestones Open
         $order_milestones = [
          [
              'order_id' => 1,
              'tradeperson_id' => 1,
              'milestone' => 1, // Ensure proper string formatting
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'order_id' => 2,
              'tradeperson_id' => 2,
              'milestone' => 2,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'order_id' => 3,
              'tradeperson_id' => 3,
              'milestone' => 3,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'order_id' => 4,
              'tradeperson_id' => 4,
              'milestone' => 4,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
      ];
      
      DB::table('order_milestones')->insert($order_milestones);
      // Order Milestones Close
        

        
    }
}