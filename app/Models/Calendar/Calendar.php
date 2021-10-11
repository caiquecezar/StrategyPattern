<?php

namespace App\Models\Calendar;

use App\Models\Weekdays\Sunday;
use App\Models\Weekdays\Monday;
use App\Models\Weekdays\Tuesday;
use App\Models\Weekdays\Wednesday;
use App\Models\Weekdays\Thursday;
use App\Models\Weekdays\Friday;
use App\Models\Weekdays\Saturday;

use DateTime;
use Exception;

class Calendar
{
    public function getWeekday($date, $format = 'Y-m-d')
    {
        $created_date = DateTime::createFromFormat($format, $date);

        if (!$created_date) {
            throw new Exception('O formato da data não é válido');
        }

        $weekday = $created_date->format('l');
        $class = 'App\\Models\\Weekdays\\' . $weekday;
        return new $class();
    }
}
