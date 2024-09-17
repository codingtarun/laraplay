<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('user') . ' ' . Str::random(5);

        $user = User::create([
            'name' => $name,
            'email' => $name . '@gmail.com',
            'password' => Hash::make($name . '@123')
        ]);
        $user->assignRole('user');

        $this->info('Successfully create ' . $name);
    }
}
