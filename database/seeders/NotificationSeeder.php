<?php

namespace Database\Seeders;

use App\Models\Notification;  // Import the Eloquent model
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample notifications using Eloquent
        Notification::create([
            'title' => 'Job has been started',
        ]);
        Notification::create([
            'title' => 'Job has been completed',
        ]);
        Notification::create([
            'title' => 'Job has been cancelled',
        ]);
        Notification::create([
            'title' => 'Your Proposal has been Accepted',
        ]);
        Notification::create([
            'title' => 'Your Proposal has been Rejected',
        ]);
        Notification::create([
            'title' => 'Your Proposal has been Submitted',
        ]);
        Notification::create([
            'title' => 'You have recieved new message',
        ]);

    }
}
