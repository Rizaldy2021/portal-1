<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CheckUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:role {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check roles of a user by email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }

        $roles = $user->getRoleNames(); // Mengambil role pengguna
        $this->info("Roles for {$user->name}: " . $roles->implode(', '));
    }
}
