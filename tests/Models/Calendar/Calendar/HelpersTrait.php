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
     * @return Calendar
     */
    private function addSpecialDates(Calendar $calendar, array $data_provider): Calendar
    {
        if ($data_provider['special_dates'] == null) {
            return $calendar;
        }

        foreach ($data_provider['special_dates'] as $special_date) {
            $date = DateTime::createFromFormat(
                $data_provider['date_format'],
                $special_date['date']
            );

            $calendar->addSpecialDate(new SpecialDate($date, $special_date['message']));
        }

        return $calendar;
    }

    /**
     * Method to verify if the date of the test is a special date
     *
     * @return bool
     */
    private function isSpecialDate(array $data_provider): bool
    {
        return (
            $data_provider['special_dates'] != null
            && $data_provider['results']['special_messages'] != null
        );
    }
}
