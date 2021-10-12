<?php

namespace App\Models\Calendar;

use App\Interfaces\Weekday;
use DateTime;

class SpecialDate implements Weekday
{
    protected Datetime $date;
    protected Weekday $weekday;
    protected string $message;
    protected ?SpecialDate $next_special_date;

    public function __construct(Datetime $date, string $message)
    {
        $this->next_special_date = null;
        $this->date = $date;
        $this->message = $message;

        $weekday = $date->format('l');
        $class = 'App\\Models\\WeekdayStrategy\\' . $weekday;
        $this->weekday = new $class($date);
    }

    /**
     * Date getter
     * 
     * @return string date in format Y-m-d
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Function to add message
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

    public function getAllMessages()
    {
        if ($this->next_special_date == null) {
            return $this->message . PHP_EOL;
        }

        return $this->message . PHP_EOL . $this->next_special_date->getAllMessages();
    }

    public function message()
    {
        $final_message = $this->weekday->message() . $this->getAllMessages();

        return $final_message;
    }
}
