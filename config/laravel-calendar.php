<?php

return [
    /*
     * Please use the specified ones below:
     * 'zaf'
     */
    'country_code' => 'zaf',
    /*
     * Please use the specified ones below ("all" will use the entire contry):
     * 'all','gauteng',
     */
    'region' => 'all',
    /*
     * Duration of data:
     * 'Year' , 'Month' , 'DateRange'
     */
    'duration' => 'Year',
    /*
     * Supported Recordable type
     * NB Please note that not all countries list school holiday
     * 'all', 'public_holiday', 'observance', 'school_holiday'
     */
    'holiday_type' => 'public_holiday',
    /*
     * Calendar Endpoint to retrieve data from.
     * https://kayaposoft.com/enrico/json/v2.0/
     */
    'api-calendar' => 'https://kayaposoft.com/enrico/json/v2.0/',
];
