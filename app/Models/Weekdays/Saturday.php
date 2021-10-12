<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekday;
use App\Models\Weekdays\Day;
use DateTime;

class Saturday extends Day implements Weekday
{
    public function __construct(DateTime $date)
    {
        parent::__construct($date);
    }

    public function message()
    {
        return $this->date->format('Y-m-d') . ' - É sábado.' . PHP_EOL;
    }
}
