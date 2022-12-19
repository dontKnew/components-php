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
