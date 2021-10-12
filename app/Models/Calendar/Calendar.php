<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use DateTime;

class Calendar
{
    protected array $special_dates;
    protected string $classes_namespace;

    public function __construct($classes_namespace = 'App\\Models\\WeekdayStrategy\\')
    {
        $this->special_dates = [];
        $this->classes_namespace = $classes_namespace;
    }

    /**
     * Function to get a weekday according with date
     * 
     * @param Datetime $date
     * 
     * @return Date
     */
    public function getWeekday(Datetime $datetime)
    {
        $date = new Date($datetime);

        $date = $this->searchForSpecialDates($date, $datetime);

        return $date;
    }

    private function searchForSpecialDates($date, $datetime)
    {
        foreach ($this->special_dates as $special_date) {
            if ($datetime == $special_date->getDate()) {
                $date->addSpecialDate($special_date);
            }
        }

        return $date;
    }

    /**
     * Function to add a special date in calendar
     * 
     * @param SpecialDate $special_date special date to add
     * 
     * @return Calendar own instance
     */
    public function addSpecialDate(SpecialDate $new_special_date)
    {
        $this->special_dates[] = $new_special_date;
        
        return $this;
    }
}
