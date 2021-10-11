<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Wednesday implements Weekdays
{
    public function message()
    {
        return 'Hoje é quarta-feira.';
    }
}
