<?php

namespace App\Models;

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
     * @return Datetime date in format Y-m-d
     */
    public function getDate()
    {
        return $this->date;
    }
}
