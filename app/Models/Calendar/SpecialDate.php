<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use DateTime;
use Exception;

class SpecialDate implements Weekday
{
    protected Datetime $date;
    protected Weekday $weekday;
    protected string $message;

    public function __construct(Datetime $date, string $message)
    {
        $this->date = $date;
        $this->message = $message;

        $weekday = $date->format('l');
        $class = 'App\\Models\\Weekdays\\' . $weekday;
        $this->weekday = new $class($date);
    }

    /**
     * Date getter
     * 
     * @return string date in format Y-m-d
     */
    public function getDate()
    {
        return $this->date->format('Y-m-d');
    }

    public function message()
    {
        return $this->weekday->message() . $this->message . PHP_EOL;
    }
}
