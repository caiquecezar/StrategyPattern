<?php

namespace App\Interfaces;

interface Weekday
{
    /**
     * Function to get a message for a weekday
     *
     * @return string message
     */
    public function message(): string;
}
