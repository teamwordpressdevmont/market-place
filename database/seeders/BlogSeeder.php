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

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Blog Open
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
    }
}
