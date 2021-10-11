<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Sunday implements Weekdays
{
    public function message()
    {
        return 'Hoje é domingo.';
    }
}
