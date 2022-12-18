<?php

/*
* @author Balaji
* @name AtoZ SEO Tools - PHP Script
* @copyright 2020 ProThemes.Biz
*
*/

function pageSpeedInsightTool($url,$type='desktop',$screenshot=false){

    $pageSpeedInsightUrl = $desktopUrl = $mobileUrl = $score = $jsonData = '';
    $pageSpeedInsight = array();

    $apiKey = urldecode('AIzaSyB921qf7VUO-mlqlmRQVASImxS5nWgvaUg');

    $url = urldecode($url);

    if ($screenshot)
        $screenshot = 'true';
    else
        $screenshot = 'false';

    $mobileUrl = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=' . $apiKey . '&screenshot=' . $screenshot . '&snapshots=' . $screenshot . '&locale=en_US&url=' . $url . '&strategy=mobile';

    $desktopUrl = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?key=' . $apiKey . '&screenshot=' . $screenshot . '&snapshots=' . $screenshot . '&locale=en_US&url=' . $url . '&strategy=desktop';

    if ($type === 'desktop') $pageSpeedInsightUrl = $desktopUrl; else if ($type === 'mobile') $pageSpeedInsightUrl = $mobileUrl; else
        stop('Unkown Page Speed Insight Checker Error!');

    $jsonData = curlGET($pageSpeedInsightUrl);

    $skip = array('final-screenshot', '');

    if($jsonData != '') {
        $arr = json_decode($jsonData, true);

        if (isset($arr['lighthouseResult']['categories']['performance']['score'])) {
            $pageSpeedInsight['url'] = $arr['lighthouseResult']['finalUrl'];

            $pageSpeedInsight['loadingExperience'] = $arr['originLoadingExperience']['overall_category'];
            $pageSpeedInsight['userAgent'] = $arr['lighthouseResult']['userAgent'];
            $pageSpeedInsight['timing'] = $arr['lighthouseResult']['timing']['total'];
            $pageSpeedInsight['timing'] = $pageSpeedInsight['timing'] % 60;

            $pageSpeedInsight['score'] = $arr['lighthouseResult']['categories']['performance']['score'] * 100;

            $pageSpeedInsight['warning'] = '';
            if (isset($arr['lighthouseResult']['runWarnings'])) {
                foreach($arr['lighthouseResult']['runWarnings'] as $warn){
                    $pageSpeedInsight['warning'] .= '- '.$warn . '<br><br>';
                }
            }

            $pageSpeedInsight['screenshot'] = '<img class="screenImg" src="'.$arr['lighthouseResult']['audits']['final-screenshot']['details']['data'].'" />';

            $pageSpeedInsight['audit'] = '';

            foreach($arr['lighthouseResult']['audits'] as $audit){
                if(!(in_array($audit['id'], $skip))) {
                    if($audit['scoreDisplayMode'] === 'numeric') {
                        $pageSpeedInsight['audit'] .= '<tr>';
                        $pageSpeedInsight['audit'] .= '<td>'.$audit['title'].'</td>';
                        $pageSpeedInsight['audit'] .= '<td>'.$audit['description'].'</td>';
                        $pageSpeedInsight['audit'] .= '<td>'.($audit['score'] * 100).'</td>';
                        $pageSpeedInsight['audit'] .= '<td>'.$audit['displayValue'].'</td>';
                        $pageSpeedInsight['audit'] .= '</tr>';
                    }
                }
            }
        }
    }
    return $pageSpeedInsight;
}