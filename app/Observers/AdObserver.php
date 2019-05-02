<?php

namespace App\Observers;

use App\Ad;
use App\Activity;

class AdObserver
{
    /**
     * Handle the ad "created" event.
     *
     * @param  \App\Ad  $ad
     * @return void
     */
    public function created(Ad $ad)
    {

        $ad->recordActivity('created ad', $ad);

    }

    /**
     * Handle the ad "updated" event.
     *
     * @param  \App\Ad  $ad
     * @return void
     */
    public function updated(Ad $ad)
    {
        // $ad->recordActivity('updated ad', $ad);
    }

    /**
     * Handle the ad "deleted" event.
     *
     * @param  \App\Ad  $ad
     * @return void
     */
    public function deleted(Ad $ad)
    {
        //
    }  


    /**
     * Handle the ad "restored" event.
     *
     * @param  \App\Ad  $ad
     * @return void
     */
    public function restored(Ad $ad)
    {
        //
    }

    /**
     * Handle the ad "force deleted" event.
     *
     * @param  \App\Ad  $ad
     * @return void
     */
    public function forceDeleted(Ad $ad)
    {
        //
    }


   






}
