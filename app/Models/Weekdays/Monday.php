<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Monday implements Weekdays
{
    public function message()
    {
        return 'Hoje é segunda-feira.';
    }
}
