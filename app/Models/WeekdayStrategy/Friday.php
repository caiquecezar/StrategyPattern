<?php

namespace App\Models\WeekdayStrategy;

use App\Interfaces\Weekday;
use App\Models\WeekdayStrategy\Day;
use DateTime;

class Friday extends Day implements Weekday
{
    public function __construct(DateTime $date)
    {
        parent::__construct($date);
    }

    public function message()
    {
        return $this->date->format('Y-m-d') . ' - É sexta-feira.' . PHP_EOL;
    }
}
