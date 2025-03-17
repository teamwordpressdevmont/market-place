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

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Testimonials Open
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

        // Testimonials Close



        // Approved Testimonials Open

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

        // Approved Testimonials Close
    }
}
