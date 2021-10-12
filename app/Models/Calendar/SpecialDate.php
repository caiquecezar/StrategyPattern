<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use App\Models\WeekdayStrategy\Day;
use DateTime;

class SpecialDate extends Day implements Weekday
{
    protected Weekday $weekday;
    protected string $message;
    protected ?SpecialDate $next_special_date;

    public function __construct(DateTime $date, string $message, string $class_namespace = 'App\\Models\\WeekdayStrategy\\')
    {
        parent::__construct($date);

        $this->next_special_date = null;
        $this->message = $message;

        $weekday = $date->format('l');
        $class = $class_namespace . $weekday;
        $this->weekday = new $class($date);
    }

    /**
     * Function to add special date in list
     * 
     * @param SpecialDate $special_date
     * 
     * @return SpecialDate own instance
     */
    public function addSpecialDate(SpecialDate $special_date)
    {
        if ($this->next_special_date == null) {
            $this->next_special_date = $special_date;
        } else {
            $this->next_special_date->addSpecialDate($special_date);
        }

        return $this;
    }

    /**
     * Function to get all Messages from special date
     * 
     * @return string all messages
     */
    public function getAllSpecialDatesMessages()
    {
        if ($this->next_special_date == null) {
            return $this->message . PHP_EOL;
        }

        return $this->message . PHP_EOL . $this->next_special_date->getAllSpecialDatesMessages();
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
}
