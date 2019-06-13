<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class ManageUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user {--E|--email= : The user email you want to update} {--P|--password= : The user password you want to update}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new user and edit their passwords';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

       if ($this->option('email') && $this->option('password')) {

            // save user passowrd
            $user = User::where('email', $this->option('email'))->first();
            $user->password = Hash::make($this->option('password'));

            if ($user->save()){
                return $this->info('User password updated!');
            }
       }

       // this will create and output user data
       $this->info(factory('App\User')->create());

    }
}
