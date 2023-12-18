<?php
namespace App\Console\Scheduling;

use Illuminate\Console\Scheduling\Event as BaseEvent;

class Event extends BaseEvent
{
    public function everyFiveSeconds()
    {
        return $this->spliceIntoPosition(1, '5-59/5');
    }
}