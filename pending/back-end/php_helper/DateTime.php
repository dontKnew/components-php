<?php
function humanize($past_time): string
{
    $now = new DateTime();
    $past_time = date("Y-m-d H:i:s",strtotime($past_time));
    $past_time = new DateTime($past_time); // past time
    $interval = $now->diff($past_time);
    if ($interval->y > 0) {
        $time =  $interval->format('%y years ago');
    } elseif ($interval->m > 0) {
        $time =  $interval->format('%m months ago');
    } elseif ($interval->d > 0) {
        $time =  $interval->format('%d days ago');
    } elseif ($interval->h > 0) {
        $time =  $interval->format('%h hours ago');
    } elseif ($interval->i > 0) {
        $time =  $interval->format('%i minutes ago');
    } else if($interval->i==0) {
        $time =  "Just Now";
    }else {
        $time =  $interval->format('%s seconds ago');
    }
    return $time;
}
echo humanize("19-12-2022 12:13:40");

   function currentTime($to_zone){
        $india_timezone = new DateTimeZone('Asia/Kolkata');
        $to_zone_timezone = new DateTimeZone($to_zone);
        
        $india_time = new DateTime('now', $india_timezone);
        $india_current_time  = $india_time->format("H:i");
        
        $india_time->setTimezone($to_zone_timezone);
        $to_zone_timezone = $india_time->format('d-m-Y H:i');
        
        $response['date'] = $india_time->format('d-M-Y');
        $response['time'] = $india_time->format('h:i a');
        
        return $response;

    }


	/*
	if india time is 10:00 then what is time in dubai(any_country_name)
		$to_zone_time : "Asia/Dubai"
		$india_time : "10:00"
	*/ 
	function countryTime($to_zone_time, $india_time){
    		$india_time = new DateTime($india_time, new DateTimeZone('Asia/Kolkata'));
		 $dubai_timezone = new DateTimeZone($to_zone_time);
		    $dubai_time = clone $india_time; // clone the object to avoid modifying the original time
		    $dubai_time->setTimezone($dubai_timezone);
		    $dubai_time_formatted = $dubai_time->format('H:i');
		    return $dubai_time_formatted;

	}
