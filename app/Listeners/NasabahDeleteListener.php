<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\NasabahDeleteEvent;
use App\Models\Rekening;

class NasabahDeleteListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(NasabahDeleteEvent $event)
    {
        $nasabah = $event->nasabah;
        
        Rekening::where('kd_nasabah',$nasabah->kd_nasabah)->delete();
    }
}
