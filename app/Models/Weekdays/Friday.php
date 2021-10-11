<?php

namespace App\Models\Weekdays;

use App\Interfaces\Weekdays\Weekdays;

class Friday implements Weekdays
{
    public function message()
    {
        return 'Hoje é sexta-feira.';
    }
}
