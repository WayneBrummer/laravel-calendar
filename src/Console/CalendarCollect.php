<?php

namespace Pace\Calendar\Console;

use Illuminate\Console\Command;
use Pace\Calendar\Action\CollectionAction;
use Pace\Calendar\Action\RequestDataAction;

class CalendarCollect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collect:calendar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrives records from API and stores in your prefered data storage';

    /**
     * Create a new command instance.
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
        $calender = new CollectionAction();

        $calender->setApiUrl()
            ->setAction()
            ->setYear(now()->year)
            ->setCountry()
            ->buildUrl();
        // ->setEventType()

        $url = $calender->getApiUrl();

        $eventData = (new RequestDataAction($url))->setCalendarData();

        $calender->setCalendarEvents($eventData->getCalenderEventData())
            ->triggerEvent();
    }
}
