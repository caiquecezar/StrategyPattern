<?php

namespace App\Models\WeekdayStrategy;

use App\Interfaces\Weekday;
use App\Models\Day;
use DateTime;

class Monday extends Day implements Weekday
{
    /**
     * Constructor method
     */
    public function __construct(DateTime $date)
    {
        parent::__construct($date);
    }

    public function message(): string
    {
        return $this->date->format('Y-m-d') . ' - É segunda-feira.' . PHP_EOL;
    }
}
