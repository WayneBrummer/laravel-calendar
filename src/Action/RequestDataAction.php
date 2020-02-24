<?php

namespace Pace\Calendar\Action;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class RequestDataAction
{
    private $url;

    private $calenderEvents;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setCalendarData()
    {
        if (!Cache::has($this->url)) {
            $response = (new Client())->get($this->url);

            $statusCode = $response->getStatusCode();

            Cache::put($this->url, $response->getBody()->getContents(), now()->addMonths(6));
        }

        $this->calenderEvents = Cache::get($this->url);

        return $this;
    }

    public function getCalenderEventData()
    {
        return $this->calenderEvents;
    }
}
