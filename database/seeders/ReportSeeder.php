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

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
