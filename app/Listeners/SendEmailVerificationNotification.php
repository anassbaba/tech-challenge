<?php

namespace App\Listeners;

use Str;
use Mail;
use Cache;
use App\Events\UserSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSaved  $event
     * @return void
     */
    public function handle(UserSaved $event)
    {   
        $data = [
            'id'      => $event->user->id,
            'hash'    => strtolower(Str::random(70)),
        ];

        Cache::put('user::'.$event->user->id, $data['hash'], 3600);
        
        Mail::send('email.verification', $data, function($message) use ($data, $event){

            $message->from('no-replay@gmail.com')
                    ->to($event->user->email)
                    ->subject('Verify your email address');
        });
    }
}
