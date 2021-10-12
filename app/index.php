<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

/* Exemplo de código */

use App\Models\Calendar\Calendar;
use App\Models\Calendar\SpecialDate;
use DateTime;

$calendar = new Calendar();

$date = DateTime::createFromFormat('Y-m-d', '2018-01-21');
$special_date = new SpecialDate($date, 'Um dia muito especial.');

$calendar->addSpecialDate($special_date);

$current_date = new DateTime('now');
$weekday = $calendar->getWeekday($current_date);
echo $weekday->message() . PHP_EOL;

$special_date = DateTime::createFromFormat('Y-m-d', '2018-01-21');
$weekday = $calendar->getWeekday($special_date);
echo $weekday->message() . PHP_EOL;
