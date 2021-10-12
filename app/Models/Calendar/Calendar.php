<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use DateTime;

class Calendar
{
    protected $special_dates;

    public function __construct()
    {
        $this->special_dates = [];
    }

    /**
     * Function to get a weekday according with date
     * 
     * @param Datetime $date
     * 
     * @return Weekday
     */
    public function getWeekday(Datetime $date)
    {
        $special_date = $this->findSpecialDate($date);

        if ($special_date) {
            return $special_date;
        }

        $weekday = $date->format('l');
        $class = 'App\\Models\\Weekdays\\' . $weekday;
        return new $class($date);
    }

    /**
     * Function to add a special date in calendar
     * 
     * @param SpecialDate $special_date special date to add
     * 
     * @return Calendar own instance
     */
    public function addSpecialDate(SpecialDate $special_date)
    {
        $this->special_dates[] = $special_date;

        return $this;
    }

    /**
     * Function to search for a special date
     * 
     * @param Datetime $date date to search
     * 
     * @return SpecialDate|false if cant find, return false
     */
    private function findSpecialDate(Datetime $date)
    {
        foreach ($this->special_dates as $special_date) {
            if ($date->format('Y-m-d') === $special_date->getDate()) {
                return $special_date;
            }
        }

        return false;
    }
}
