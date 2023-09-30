<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class superAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:superAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'name' => "Bisnu Kundu",
            'email' => "bisnu@gmail.com",
            'password' => Hash::make("password123"),
        ]);
        $this->info($user->name . " SuperAdmin Create Successfully");
    }
}
