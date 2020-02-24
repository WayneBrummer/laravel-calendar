<?php

namespace Pace\Calendar\Event;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Pace\Calendar\Models\Calendar;

class CalendarEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Calendar Event to hook into any running process.
     */
    public $calendarData;

    /**
     * Calendar Events.
     */
    public function __construct($calendarData)
    {
        $this->calendarData = \json_decode($calendarData);
    }
}
