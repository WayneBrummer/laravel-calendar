<?php

namespace Pace\Calendar\Action;

use Pace\Calendar\Event\CalendarEvent;

class CollectionAction
{
    private $url;

    private $action;

    private $country;

    private $holidayType;

    private $year;

    private $month;

    private $fromDate;

    private $toDate;

    private $calendarEvents;

    //Get API Url to be used.
    public function setApiUrl($baseUrl = null)
    {
        $this->url = config('laravel-calendar.api-calendar', $baseUrl);

        return $this;
    }

    public function getApiUrl()
    {
        return $this->url;
    }

    /**
     * Sets primary region or removes it from string.
     *
     * @param string $region
     */
    public function setRegion($region = 'all')
    {
        if ($region === 'all') {
            $this->region = config('laravel-calendar.region', $region);
        }

        return $this;
    }

    /**
     * Set the requested Holiday type.
     */
    public function setEventType($holidayType = 'public_holiday')
    {
        if (!config('laravel-calendar.holiday_type') === '') {
            $this->holidayType = config('laravel-calendar.holiday_type', $holidayType);
        }

        return $this;
    }

    /**
     * Sets country to retrieve.
     *
     * @param string $country
     */
    public function setCountry($country = 'zaf')
    {
        $this->country = config('laravel-calendar.country_code', $country);

        return $this;
    }

    /**
     * Retrieves Country parameter.
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Retrieves Region parameter.
     */
    public function getRegion()
    {
        return $this->region;
    }

    public function setMonth($month = null)
    {
        $this->month = $month ?? now()->month;

        return $this;
    }

    public function setYear($year)
    {
        $this->year = $year ?? now()->year;

        return $this;
    }

    public function setDateRange($fromDate = null, $toDate = null)
    {
        $this->fromDate = $fromDate ?? now()->startOfYear;
        $this->toDate   = $toDate ?? now()->endOfYear;

        return $this;
    }

    public function setAction($action = 'Year')
    {
        $this->action = 'getHolidaysFor' . config('laravel-calender.duration', $action);

        return $this;
    }

    public function buildUrl()
    {
        $params = [
            'action'  => $this->action,
            'year'    => $this->year,
            'country' => $this->country,
        ];

        $this->url .= '?' . \http_build_query($params);

        return $this;
    }

    public function triggerEvent()
    {
        event(new CalendarEvent($this->calendarEvents));
    }

    public function setCalendarEvents($requestData)
    {
        $this->calendarEvents = $requestData;

        return $this;
    }

    public function getCalendarEvents()
    {
        return $this->calendarEvents;
    }

    /*
     * https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=2020&country=zaf&holidayType=public_holiday
     * Example
     */
}
