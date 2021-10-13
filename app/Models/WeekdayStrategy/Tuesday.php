<?php

namespace App\Models\WeekdayStrategy;

use App\Interfaces\Weekday;
use App\Models\Day;
use DateTime;

class Tuesday extends Day implements Weekday
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
        return $this->date->format('Y-m-d') . ' - É terça-feira.' . PHP_EOL;
    }
}
