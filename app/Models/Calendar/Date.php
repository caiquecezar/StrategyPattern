<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use App\Models\Day;
use DateTime;

class Date extends Day
{
    protected Weekday $weekday;
    protected array $special_dates;

    public function __construct(DateTime $date, string $class_namespace = 'App\\Models\\WeekdayStrategy\\')
    {
        parent::__construct($date);

        $this->special_dates = [];

        $weekday = $date->format('l');
        $class = $class_namespace . $weekday;

        $this->weekday = new $class($date);
    }

    /**
     * Function to add special date in list
     * 
     * @param SpecialDate $special_date
     * 
     * @return Date own instance
     */
    public function addSpecialDate(SpecialDate $special_date)
    {
        $this->special_dates[] = $special_date;

        return $this;
    }

    /**
     * Function to get all Messages from special date
     * 
     * @return string all messages
     */
    public function getAllSpecialDatesMessages()
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
    public function message()
    {
        $final_message = $this->weekday->message() . $this->getAllSpecialDatesMessages();

        return $final_message;
    }

    /**
     * Weekday getter
     * 
     * @return Weekday
     */
    public function getWeekday()
    {
        return $this->weekday;
    }
}
