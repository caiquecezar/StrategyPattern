<?php

namespace App\Models\Calendar;

use App\Models\Day;
use DateTime;

class SpecialDate extends Day
{
    protected string $message;

    /**
     * Constructor method
     */
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
    public function getMessage(): string
    {
        return $this->message;
    }
}
