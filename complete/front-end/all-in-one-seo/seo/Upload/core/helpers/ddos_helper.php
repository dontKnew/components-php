<?php

/*
* @author Balaji
* @name Rainbow PHP Framework
* @copyright © 2017 ProThemes.Biz
*
*/

function ddosCheck($con,$ip){
    
    $banned = false;
    $date = date('Y-m-d');
    $taskData =  mysqli_query($con, "SELECT * FROM rainbowphp_temp where task='ddos'");
    $taskRow = mysqli_fetch_array($taskData);
    $taskData = dbStrToArr($taskRow['data']);
    
    if(isset($taskData[$date])){
        if(!in_array($ip,$taskData[$date]['banned'])){
            if(isset($taskData[$date][$ip])){
                //Already IP Record Exist
                    if($taskData[$date][$ip]['time'] == time()){
                        if($taskData[$date][$ip]['hit'] > $taskData['maxcount']){
                           //Ban the IP
                            $taskData[$date]['banned'][] = $ip;
                            $banned = true;
                        }else{
                           //Count the request
                           $taskData[$date][$ip]['hit']++;
                        }
                    }else{
                        //Update the time
                        $taskData[$date][$ip] = array('time' => time(), 'hit' => '1');
                    }
            }else{
                //New IP Record
                $taskData[$date][$ip] = array('time' => time(), 'hit' => '1');
            }
        }else{
            $banned = true;
        }
    }else{
        //Clear old date and insert new!
        $prevDate = date('Y-m-d', strtotime($date .' -1 day'));
        if(isset($taskData[$prevDate]))
            unset($taskData[$prevDate]);
        $taskData[$date][$ip] = array('time' => time(), 'hit' => '1');
        $taskData[$date]['banned'] = array();
    }
    updateToDb($con,'rainbowphp_temp', array(
        'data' => arrToDbStr($con,$taskData)), array('task' => 'ddos'));
    
    if($banned){
        header('HTTP/1.1 503 Service Unavailable');
        die();
    }
    return true;
}

$sID = strrev('m'.'eti').strrev('edoc_esahcrup_');

if(!isset(${$sID}) || ${$sID} == '')
    exit();
elseif(strlen(${$sID}) <=10)
    exit();
unset($sID);
