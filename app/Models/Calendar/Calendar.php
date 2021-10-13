<?php

namespace App\Models\Calendar;

use DateTime;

class Calendar
{
    protected array $special_dates;

    public function __construct()
    {
        $this->special_dates = [];
    }

    /**
     * Function to get a date according with datetime
     * 
     * @param Datetime $datetime
     * 
     * @return Date
     */
    public function getDate(Datetime $datetime)
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
