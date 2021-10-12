<?php

namespace Tests\Models\Calendar\Calendar;

use App\Models\Calendar\Calendar;
use App\Models\Calendar\SpecialDate;
use DateTime;

trait HelpersTrait
{
    /**
     * Function do add special dates to calendar
     * 
     * @param Calendar $calendar
     * @param array $data_provider provider with special dates data
     * 
     * @return void
     */
    private function addSpecialDates(Calendar $calendar, array $data_provider)
    {
        if ($data_provider['special_dates'] != null) {
            foreach ($data_provider['special_dates'] as $special_date) {
                $date = DateTime::createFromFormat(
                    $data_provider['date_format'],
                    $special_date['date']
                );

                $calendar->addSpecialDate(new SpecialDate($date, $special_date['message']));
            }
        }
    }
}
