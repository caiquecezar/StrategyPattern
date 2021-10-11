<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Thursday implements Weekdays
{
    public function message()
    {
        return 'Hoje é quinta-feira.';
    }
}
