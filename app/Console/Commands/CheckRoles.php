<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CheckRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:check {role?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if a role exists in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleName = $this->argument('role');

        if ($roleName) {
            $exists = Role::where('name', $roleName)->exists();
            $this->info($exists ? "Role '{$roleName}' exists." : "Role '{$roleName}' does not exist.");
        } else {
            $roles = Role::pluck('name')->toArray();
            $this->info('Registered roles: ' . implode(', ', $roles));
        }
    }
}
