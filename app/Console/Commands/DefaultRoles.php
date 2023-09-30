<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DefaultRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Role will be created after run this command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = ["superAdmin", "admin", 'user'];

        foreach ($roles as $role) {
            $role = Role::create(['name' => $role]);
        }
//        $permission = Permission::create(['name' => 'edit articles']);

        $this->info('Roles created successfully!');
    }
}
