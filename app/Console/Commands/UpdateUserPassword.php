<?php

namespace App\Console\Commands;

use Hash;
use App\User;
use Validator;
use Illuminate\Console\Command;

class UpdateUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user:password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user password.';

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
            'email'        => $this->ask('Enter is user email:'),
        ];

        $validator = Validator::make($user, [
            'email'           => 'required|email|exists:users|max:255',
        ],[
            'email.exists'  => 'Sorry but his email not exists in database records.',
        ]);


        if (!$validator->passes()) 
        {
            foreach ($validator->errors()->all() as $key => $error) {
                $this->error($error);
            }
        }
        else
        {
            $new['password'] = $this->ask('Please enter the new password:');

            $validator = Validator::make($new, [
                'password'   => 'required|min:6|max:255',
            ]);

            if (!$validator->passes()) 
            {
                foreach ($validator->errors()->all() as $key => $error) {
                    $this->error($error);
                }

                return;
            }

            $user = User::where('email', '=', $user['email'])->first();

            if($user)
            {
                if ($this->confirm('Are you sur you want to change this use password?'))
                {

                    $user->update([
                        'password' => Hash::make($new['password'])
                    ]);

                    $this->info('Done! user '.$user['email'].' password update successfuly.');
                }
            }
            else
                $this->error('something wen\'t wrong!');
        }
    }
}
