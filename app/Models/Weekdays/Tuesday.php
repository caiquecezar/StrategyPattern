<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Tuesday implements Weekdays
{
    public function message()
    {
        return 'Hoje é terça-feira.';
    }
}
