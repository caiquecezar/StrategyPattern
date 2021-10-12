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

        $date = DateTime::createFromFormat(
            $data_provider['date']['format'],
            $data_provider['date']['date']
        );
        $weekday = $calendar->getWeekday($date);
        $message = $weekday->message();
        
        $this->assertInstanceOf($data_provider['results']['class'], $weekday);
        $this->assertStringContainsString($data_provider['results']['day'], $message);
    }

    /**
     * @dataProvider withSpecialDates
     */
    public function testSpecialDateIsCorrect($data_provider)
    {
        $calendar = new Calendar();

        $this->addSpecialDates($calendar, $data_provider);

        $date = DateTime::createFromFormat(
            $data_provider['date_format'],
            $data_provider['date']
        );
        $weekday = $calendar->getWeekday($date);
        $message = $weekday->message();

        $this->assertInstanceOf($data_provider['results']['class'], $weekday);
        $this->assertStringContainsString($data_provider['results']['day'], $message);

        if($data_provider['results']['special_messages'] != null) {
            foreach ($data_provider['results']['special_messages'] as $special_message) {
                $this->assertStringContainsString($special_message, $message);
            }
        }
    }
  
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
