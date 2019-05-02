<?php

namespace App\Observers;

use App\Response;
use App\Activity;

class Observer
{
    /**
     * Handle the response "created" event.
     *
     * @param  \App\Response  $response
     * @return void
     */
    public function created(Response $response)
    {

        $response->recordActivity('created response');

    }

    /**
     * Handle the response "updated" event.
     *
     * @param  \App\Response  $response
     * @return void
     */
    public function updated(Response $response)
    {
        // $response->recordActivity('updated response', $response);
    }

    /**
     * Handle the response "deleted" event.
     *
     * @param  \App\Response  $response
     * @return void
     */
    public function deleted(Response $response)
    {
        //
    }  


    /**
     * Handle the response "restored" event.
     *
     * @param  \App\Response  $response
     * @return void
     */
    public function restored(Response $response)
    {
        //
    }

    /**
     * Handle the response "force deleted" event.
     *
     * @param  \App\Response  $response
     * @return void
     */
    public function forceDeleted(Response $response)
    {
        //
    }


   






}
