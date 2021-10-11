<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Saturday implements Weekdays
{
    public function message()
    {
        return 'Hoje é sábado.';
    }
}
