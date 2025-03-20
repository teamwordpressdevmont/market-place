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

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // subscriptions open
        $subscriptions = [
            [
                'title'            => 'Basic',
                'description'      => 'Here is a description of the subscriptions and possible benefits.',
                'features'         => json_encode([
                    'features_0' => ['heading' => 'Job marked as "Urgent" and displayed at the top'],
                    'features_1' => ['heading' => 'More tradespeople see the job'],
                    'features_2' => ['heading' => 'Faster response time']
                ]),
                'price'            => 790.00,
                'clip_number'      => 25,
                'free_clip_number' => 25,
                'binding_period'   => null,
                'profile_type'     => 'Premium',
                'google_visibility'=> 1,
                'search_visibility'=> null,
                'messaging_system' => null,
                'notification_system' => null,
                'priority_support' => null,
                'tag'              => 1,
                'highlighted'      => null,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'title'            => 'Standard',
                'description'      => 'Here is a description of the subscriptions and possible benefits.',
                'features'         => json_encode([
                    'features_0' => ['heading' => 'The platform selects and sends the job to the top 5 tradespeople in the area'],
                    'features_1' => ['heading' => 'Tradespeople receive an immediate notification'],
                    'features_2' => ['heading' => 'Fewer low-quality bids – only serious professionals']
                ]),
                'price'            => 1590.00,
                'clip_number'      => 60,
                'free_clip_number' => 60,
                'binding_period'   => '6-month binding period (shorter than competitors)',
                'profile_type'     => 'Standard',
                'google_visibility'=> 1,
                'search_visibility'=> 1,
                'messaging_system' => null,
                'notification_system' => null,
                'priority_support' => null,
                'tag'              => 1,
                'highlighted'      => null,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ]
        ];
        
        DB::table('subscriptions')->insert($subscriptions);
        // subscriptions close

        // subscriptions status open
        $statuses = [
            [
                'name'       => 'active',
                'created_at' => Carbon::parse('2025-03-19 16:47:29'),
                'updated_at' => Carbon::parse('2025-03-19 16:47:33'),
            ],
            [
                'name'       => 'cancelled',
                'created_at' => Carbon::parse('2025-03-19 16:47:37'),
                'updated_at' => Carbon::parse('2025-03-19 16:47:39'),
            ],
            [
                'name'       => 'expired',
                'created_at' => Carbon::parse('2025-03-19 16:47:42'),
                'updated_at' => Carbon::parse('2025-03-19 16:47:45'),
            ]
        ];

        DB::table('subscription_statuses')->insert($statuses);
        // subscriptions status close
    }
}
