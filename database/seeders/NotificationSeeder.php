<?php

namespace Database\Seeders;

use App\Models\Notification;
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
        $notifications = [
            [
                'title' => 'Job has been started',
                'message' => 'Your job has started successfully.',
            ],
            [
                'title' => 'Job has been completed',
                'message' => 'Your job has been completed successfully.',
            ],
            [
                'title' => 'Job has been cancelled',
                'message' => 'Your job has been cancelled.',
            ],
            [
                'title' => 'Your Proposal has been Accepted',
                'message' => 'Congratulations! Your proposal has been accepted.',
            ],
            [
                'title' => 'Your Proposal has been Rejected',
                'message' => 'Unfortunately, your proposal has been rejected.',
            ],
            [
                'title' => 'You have received a new proposal',
                'message' => 'A new proposal has been submitted for your job.',
            ],
            [
                'title' => 'You have received a new message',
                'message' => 'You have a new message in your inbox.',
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::create($notification);
        }
    }
}
