<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserDeleteEvent;
use App\Models\Pegawai;
use App\Models\Nasabah;

class UserDeleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserDeleteEvent $event)
    {
        $user = $event->user;

        Pegawai::where('id_users',$user->id_users)->delete();
        Nasabah::where('id_users',$user->id_users)->delete();
    }
}
