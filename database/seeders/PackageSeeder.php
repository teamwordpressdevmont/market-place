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

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Packages Open
        
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

        // Packages Close



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
        // Purchase Packages Close
    }
}
