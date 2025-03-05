<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Token;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and store an encrypted token with an expiration date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $tokenString = Str::random(64);
            $encryptedToken = Crypt::encryptString($tokenString);
            $expiresAt = Carbon::now()->addDays(7);

            // Get the latest token
            $token = Token::latest()->first();

            if ($token) {
                $token->update([
                    'previous_token' => $token->token, 
                    'previous_expires_at' => $token->expires_at, // Store old expiry
                    'token' => $encryptedToken,
                    'expires_at' => $expiresAt,
                ]);
            } else {
                Token::create([
                    'token' => $encryptedToken,
                    'expires_at' => $expiresAt,
                ]);
            }

            $this->info('Token generated and stored successfully.');
        } catch (\Exception $e) {
            // Log the error in Laravel logs
            Log::error('Error generating token: ' . $e->getMessage());

            // Show error message in the console
            $this->error('An error occurred while generating the token. Check logs for details.');
        }
    }
}
