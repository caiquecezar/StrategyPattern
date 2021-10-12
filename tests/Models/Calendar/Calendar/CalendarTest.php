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
     * @dataProvider allWeekdays
     */
    public function testWeekdayIsCorrect($data_provider)
    {
        $calendar = new Calendar();

        $datetime = DateTime::createFromFormat(
            $data_provider['date']['format'],
            $data_provider['date']['date']
        );
        $date = $calendar->getWeekday($datetime);
        $weekday = $date->getWeekday();
        $weekday_message = $weekday->message();
        
        $this->assertInstanceOf($data_provider['results']['class'], $weekday);
        $this->assertStringContainsString($data_provider['results']['day'], $weekday_message);
    }

    /**
     * @dataProvider withSpecialDates
     */
    public function testSpecialDateIsCorrect($data_provider)
    {
        $calendar = new Calendar();

        $this->addSpecialDates($calendar, $data_provider);

        $datetime = DateTime::createFromFormat(
            $data_provider['date_format'],
            $data_provider['date']
        );
        $date = $calendar->getWeekday($datetime);
        $date_message = $date->message();

        $weekday = $date->getWeekday();
        $weekday_message = $weekday->message();

        $this->assertInstanceOf($data_provider['results']['class'], $weekday);
        $this->assertStringContainsString($data_provider['results']['day'], $weekday_message);

        if($data_provider['results']['special_messages'] != null) {
            foreach ($data_provider['results']['special_messages'] as $special_message) {
                $this->assertStringContainsString($special_message, $date_message);
            }
        }
    }
  
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
