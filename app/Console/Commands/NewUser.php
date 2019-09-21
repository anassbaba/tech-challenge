<?php

namespace App\Console\Commands;

use Hash;
use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user.';

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
        $user = [
            'email'                 => $this->ask('Enter is user email:'),
            'password'              => $this->ask('Enter is user password:'),
        ];
        
        $validator = Validator::make($user, [
            'email'                 => 'required|email|unique:users,email|max:255',
            'password'              => 'required|min:6|max:255',
        ]);

        if (!$validator->passes()) 
        {
            foreach ($validator->errors()->all() as $key => $error) {
                $this->error($error);
            }
        }
        else
        {
            if ($this->confirm('Do you wish to create this user?')) 
            {
                $user = User::create([
                    'email'     => $user['email'],
                    'password'  => Hash::make($user['password']),
                    'email_verified_at'  => Carbon::now(),
                ]);

                if($user)
                    $this->info('Done! user '.$user['email'].' created successfuly.');
                else
                    $this->error('something wen\'t wrong!');
            }
        }
    }
}
