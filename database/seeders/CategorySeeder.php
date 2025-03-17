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

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        // Categories Close 
    }
}
