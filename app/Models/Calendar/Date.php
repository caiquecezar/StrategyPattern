<?php

namespace App\Models\Calendar;

use App\Constants\Namespaces;
use App\Interfaces\Weekday;
use App\Models\Day;
use DateTime;


class Date extends Day
{
    protected Weekday $weekday;
    protected array $special_dates;

    /**
     * Constructor method
     */
    public function __construct(DateTime $date)
    {
        parent::__construct($date);

        $this->special_dates = [];

        $weekday_name = $date->format('l');
        $class = Namespaces::WEEKDAYS . $weekday_name;

        $this->weekday = new $class($date);
    }

    /**
     * Function to add special date in special dates list
     *
     * @param SpecialDate $special_date
     *
     * @return Date self instance
     */
    public function addSpecialDate(SpecialDate $special_date): Date
    {
        $this->special_dates[] = $special_date;

        return $this;
    }

    /**
     * Function to get all messages from special dates
     *
     * @return string all messages
     */
    public function getAllSpecialDatesMessages(): string
    {
        $final_message = '';

        foreach ($this->special_dates as $special_date) {
            $final_message = $final_message . $special_date->getMessage() . PHP_EOL;
        }

        return $final_message;
    }

    /**
     * Function to get message from date
     *
     * @return string all messages with weekday message in headline
     */
    public function message(): string
    {
        $final_message = $this->weekday->message() . $this->getAllSpecialDatesMessages();

        return $final_message;
    }

    /**
     * Weekday getter
     *
     * @return Weekday
     */
    public function getWeekday(): Weekday
    {
        return $this->weekday;
    }
}
