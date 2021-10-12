<?php

namespace App\Models\Weekdays;

use DateTime;

class Day
{
    protected Datetime $date;

    public function __construct(Datetime $date)
    {
        $this->date = $date;
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
}