<?php

namespace App\Models\Calendar;

use App\Models\Calendar\Date;
use DateTime;

class Calendar
{
    protected array $special_dates;

    /**
     * Constructor method
     */
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
    public function getDate(Datetime $datetime): Date
    {
        $date = new Date($datetime);

        $date = $this->searchForSpecialDates($date, $datetime);

        return $date;
    }

    /**
     * Function to seach special dates and add it in date instance 
     * according with datetime
     *
     * @param Date $date instace of date model
     * @param DateTime $datetime
     *
     * @return Date
     */
    private function searchForSpecialDates(Date $date, DateTime $datetime): Date
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
     * @param SpecialDate $new_special_date special date to be added
     *
     * @return Calendar self instance
     */
    public function addSpecialDate(SpecialDate $new_special_date): Calendar
    {
        $this->special_dates[] = $new_special_date;

        return $this;
    }
}
