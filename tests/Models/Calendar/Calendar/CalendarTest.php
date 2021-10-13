<?php

namespace Tests\Models\Calendar\Calendar;

use App\Models\Calendar\Calendar;
use DateTime;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    use ProvidersTrait;
    use HelpersTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test if a date is returning correct type and message of a weekday
     * and, if is a special day, all special messages
     * 
     * @dataProvider allWeekdays
     * @dataProvider withSpecialDates
     */
    public function testSpecialDateAndWeekdayIsCorrect(array $data_provider): void
    {
        $calendar = new Calendar();

        $calendar = $this->addSpecialDates($calendar, $data_provider);

        $datetime = DateTime::createFromFormat(
            $data_provider['date_format'],
            $data_provider['date']
        );

        $date = $calendar->getDate($datetime);
        $date_message = $date->message();

        $weekday = $date->getWeekday();
        $weekday_message = $weekday->message();

        $this->assertInstanceOf($data_provider['results']['weekday_class'], $weekday);
        $this->assertStringContainsString($data_provider['results']['day'], $weekday_message);
        $this->assertStringContainsString($data_provider['results']['day'], $date_message);

        if(!$this->isSpecialDate($data_provider))  {
            return ;
        }

        foreach ($data_provider['results']['special_messages'] as $special_message) {
            $this->assertStringContainsString($special_message, $date_message);
        }
    }
  
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
