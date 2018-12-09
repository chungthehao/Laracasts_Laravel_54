<?php

namespace App\Listeners\Forum;

use App\Events\Forum\ThreadCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscribers
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
     * @param  ThreadCreated  $event
     * @return void
     */
    public function handle(ThreadCreated $event)
    {
        // $event->thread->subscribers->forEach(function ($subscriber){});

        // event(new App\Events\Forum\ThreadCreated(['name' => 'Some New Thread']))
        dump($event->thread['name'] . ' was published to the forum.');
    }
}
