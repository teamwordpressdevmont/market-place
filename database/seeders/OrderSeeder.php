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

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Order Open

         $orders = [
            ['customer_id' => 9, 'tradeperson_id' => 31, 'order_status' => 1, 'payment_status' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 10, 'tradeperson_id' => 31, 'order_status' => 4, 'payment_status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 11, 'tradeperson_id' => 31, 'order_status' => 3, 'payment_status' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 13, 'tradeperson_id' => 31, 'order_status' => 5, 'payment_status' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('orders')->insert($orders);

        // Order Close


        // Order Details Open
        //  $orderDetails = [
        //     [
        //         'order_id' => 1,
        //         'title' => 'Need to Fix my door',
        //         'description' => 'I need to repair my door as it’s not closing properly. Looking for a quick and reliable fix.',
        //         'budget' => 2500,
        //         'urgent' => 1,
        //         'urgent_price' => 20,
        //         'job_start_timeline' => '12-Feb-2025',
        //         'job_end_timeline' => '13-Mar-2025',
        //         'location' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'address' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'image' => json_encode(['order-image-2.jpg','order-image-1.jpg','order-image-3.jpg']),
        //         'additional_notes' => 'Ensure all fittings are leak-proof.',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'order_id' => 2 ,
        //         'title' => 'Need a quick fix for my leaking kitchen pipe',
        //         'description' => 'I need a quick and reliable repair for my leaking kitchen pipe to prevent further damage.',
        //         'budget' => 3500,
        //         'urgent' => 0,
        //         'urgent_price' => 40,
        //         'job_start_timeline' => '15-Feb-2025',
        //         'job_end_timeline' => '20-Mar-2025',
        //         'location' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
        //         'address' => 'Bjørnstadveien 22, Oslo, NOR 0561, Norway.',
        //         'image' => json_encode(['order-image-1.jpg','order-image-2.jpg','order-image-3.jpg']),
        //         'additional_notes' => 'Ensure all wiring follows safety standards.',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'order_id' => 3,
        //         'title' => 'I need to renovate my house.',
        //         'description' => 'I’m looking to renovate my house, including upgrades to the interiors, fixtures, and overall design. Seeking professional help for a quality transformation.',
        //         'budget' => 4200,
        //         'urgent' => 1,
        //         'urgent_price' => 30,
        //         'job_start_timeline' => '18-Feb-2025',
        //         'job_end_timeline' => '25-Mar-2025',
        //         'location' => 'Grensen 5, Bergen, NOR 5017, Norway.',
        //         'address' => 'Grensen 5, Bergen, NOR 5017, Norway.',
        //         'image' => json_encode(['order-image-3.jpg','order-image-2.jpg','order-image-1.jpg']),
        //         'additional_notes' => 'Use high-quality waterproof adhesive.',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'order_id' => 4,
        //         'title' => 'Need to Fix Kitchen Pipe',
        //         'description' => 'Suitable local tradespeople have been alerted about your job. As soon as one is interested we will let you know.',
        //         'budget' => 4500,
        //         'urgent' => 0,
        //         'urgent_price' => 60,
        //         'job_start_timeline' => '12-Feb-2025',
        //         'job_end_timeline' => '13-Mar-2025',
        //         'location' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'address' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'image' => json_encode(['order-image-1.jpg' , 'order-imag-2.jpg' , 'order-image-3.jpg']),
        //         'additional_notes' => 'Ensure all fittings are leak-proof.',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'order_id' => 5,
        //         'title' => 'Need to Fix Kitchen Pipe',
        //         'description' => 'I am seeking a skilled and reliable plumber to fix kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes. The role involves ensuring the kitchen plumbing system is functioning properly and safely.',
        //         'budget' => 2500,
        //         'urgent' => 0,
        //         'urgent_price' => 60,
        //         'job_start_timeline' => '12-Feb-2025',
        //         'job_end_timeline' => '13-Mar-2025',
        //         'location' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'address' => 'Juterudåsen 11, Slependen, NOR 1341, Norway.',
        //         'image' => json_encode(['order-image-1.jpg' , 'order-imag-1.jpg' , 'order-image-1.jpg' , 'order-image-1.jpg']),
        //         'additional_notes' => 'Ensure all fittings are leak-proof.',
        //         'featured' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        
        // ];
                  
        // DB::table('order_details')->insert($orderDetails);

      // Order Details Close



        // Order Status open

        //   $statuses = [
        //       ['id' => 1, 'status' => 'Processing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 2, 'status' => 'In Progress', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 4, 'status' => 'Completed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 5, 'status' => 'Cancelled', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //   ];

        //   DB::table('order_statuses')->insert($statuses);

        // Order Status close




         // Payment Status Open

        //   $paymentstatuses = [
        //       ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 2, 'status' => 'Failed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 3, 'status' => 'Refund', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 4, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //       ['id' => 5, 'status' => 'In-Complete', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //   ];

        //   DB::table('payment_statuses')->insert($paymentstatuses);

        // Payment Status Close
       

        

        //  Proposal Statuses Open

        // $proposalstatuses = [
        //     ['id' => 1, 'status' => 'Accepted', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['id' => 2, 'status' => 'Rejected', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        //     ['id' => 3, 'status' => 'Pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        // ];

        // DB::table('proposal_statuses')->insert($proposalstatuses);
        //  Proposal Statuses Close
        

       


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
            
        // ];

        // DB::table('order_categories')->insert($order_categories);
        // Order Category Close
         
          // Order Proposals Open
        //   $orderProposals = [
        //     [
        //         'customer_id' => 1,
        //         'tradeperson_id' => 1,
        //         'order_id' => 1,
        //         'proposed_price' => 150.00,
        //         'proposal_description' => 'I can complete the plumbing work within 2 days.',
        //         'proposal_status' => 1,
        //         'featured' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'customer_id' => 1,
        //         'tradeperson_id' => 1,
        //         'order_id' => 2,
        //         'proposed_price' => 200.00,
        //         'proposal_description' => 'Offering high-quality service with a 1-year warranty.',
        //         'proposal_status' => 2,
        //         'featured' => 0,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'customer_id' => 1,
        //         'tradeperson_id' => 1,
        //         'order_id' => 3,
        //         'proposed_price' => 180.00,
        //         'proposal_description' => 'I will provide fast and reliable service at a fair price.',
        //         'proposal_status' => 3,
        //         'featured' => 0,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ];

        // DB::table('order_proposals')->insert($orderProposals);
        // Order Proposals Close
         
    

        // Order Milestones Open
        // $order_milestones = [
        //     [
        //         'order_id' => 1,
        //         'tradeperson_id' => 1,
        //         'milestone' => json_encode([
        //             'title' => '1st Milestone',
        //             'days' => 5,
        //             'approved' => true,
        //             'description' => 'Diagnosis & Inspection',
        //         ]),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 2,
        //         'tradeperson_id' => 1,
        //         'milestone' => json_encode([
        //             'title' => '2nd Milestone',
        //             'days' => 10,
        //             'approved' => true,
        //             'description' => 'Material Procurement',
        //         ]),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 3,
        //         'tradeperson_id' => 1,
        //         'milestone' => json_encode([
        //             'title' => '3rd Milestone',
        //             'days' => 20,
        //             'approved' => false,
        //             'description' => 'Material Procurement',
        //         ]),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'order_id' => 4,
        //         'tradeperson_id' => 1,
        //         'milestone' => json_encode([
        //             'title' => '4th Milestone',
        //             'days' => 30,
        //             'approved' => false,
        //             'description' => 'Final Testing & Cleanup',
        //         ]),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ];

        // DB::table('order_milestones')->insert($order_milestones);
       // Order Milestones Close


    }
}
