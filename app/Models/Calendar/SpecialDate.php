<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use App\Models\Day;
use DateTime;

class SpecialDate extends Day
{
    protected string $message;

    public function __construct(DateTime $date, string $message)
    {
        parent::__construct($date);

        $this->message = $message;
    }

    /**
     * Message getter
     * 
     * @return string message
     */
    public function getMessage()
    {
        return $this->message;
    }
}
