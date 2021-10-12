<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use DateTime;

class Calendar
{
    protected array $special_dates;
    protected string $class_namespace;

    public function __construct($class_namespace = 'App\\Models\\WeekdayStrategy\\')
    {
        $this->special_dates = [];
        $this->class_namespace = $class_namespace;
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
        $class =  $this->class_namespace . $weekday;
        return new $class($date);
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
        foreach ($this->special_dates as $special_date) {
            if ($special_date->getDate() == $new_special_date->getDate()) {
                $special_date->addSpecialDate($new_special_date);
                
                return $this;
            }
        }
        
        $this->special_dates[] = $new_special_date;

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
            if ($date == $special_date->getDate()) {
                return $special_date;
            }
        }

        return false;
    }
}
