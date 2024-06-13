<?php

$time_area = 'Asia/Jakarta';
$time_interval = '3M';

$timezone = new DateTimeZone($time_area);
$dateTime = new DateTime('now', $timezone);

$hour_upper_bound = $dateTime->format('H');
$minute_upper_bound = $dateTime->format('i');
$second_upper_bound = $dateTime->format('s');

$interval = new DateInterval("PT$time_interval");
$dateTime->sub($interval);

$hour_lower_bound = $dateTime->format('H');
$minute_lower_bound = $dateTime->format('i');
$second_lower_bound = $dateTime->format('s');


$current_time_upper = $hour_upper_bound . ':' . $minute_upper_bound . ':' . $second_upper_bound;
$current_time_lower = $hour_lower_bound . ':' . $minute_lower_bound . ':' . $second_lower_bound;


// debug time
$current_date_upper = '2022-07-01';
$current_date_lower = '2022-07-01';


?>