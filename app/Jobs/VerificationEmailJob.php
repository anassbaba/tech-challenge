<?php

namespace App\Jobs;

use Cache;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $verification_details = [
            'id'      => $this->user->id,
            'hash'    => strtolower(Str::random(70)),
        ];
        
        Cache::put('user::'.$this->user->id, $verification_details['hash'], 3600);
        
        Mail::send('email.verification', $verification_details, function($message) use($verification_details){

            $message->from('no-replay@gmail.com')
                    ->to($this->user->email)
                    ->subject('Verify your email address');
        });
    }
}
