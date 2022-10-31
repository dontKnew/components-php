<?php

defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */

$fullLayout = 1;
$pageTitle = 'Reports';
$subTitle = 'Overall Report';

$stats = array();
$stats['banned_user'] = $stats['unverified'] = $stats['banned_ips'] = $stats['total_users'] = 0;
$stats['active_seo'] = $stats['inactive_seo'] = $stats['page_view'] = $stats['unique_view'] = 0;

$result = mysqli_query($con, 'SELECT verified FROM users');
while ($row = mysqli_fetch_array($result)){
    $stats['total_users'] = $stats['total_users'] + 1;
    if ($row['verified'] == '2')
        $stats['banned_user'] = $stats['banned_user'] + 1;
    if ($row['verified'] == '0')
        $stats['unverified'] = $stats['unverified'] + 1;
}

$result = mysqli_query($con, 'SELECT * FROM seo_tools');
while ($row = mysqli_fetch_array($result)){
    $tool_show = filter_var(Trim($row['tool_show']), FILTER_VALIDATE_BOOLEAN);
    if ($tool_show)
        $stats['active_seo'] = $stats['active_seo'] + 1;
    else
        $stats['inactive_seo'] = $stats['inactive_seo'] + 1;
}
$stats['banned_ips'] = dbCountRows($con, 'banned_ip');

$stats = array_map("number_format", $stats);

$balajiCount = 1; $tableData = '';
foreach(getTrackViews($con) as $dbDate=>$views){
    $tableData .= '<tr>
        <td>'.$balajiCount.'</td>
        <td>'.date('F jS Y', strtotime($dbDate)).'</td>
        <td>'.$views['unique'].'</td>
        <td>'.$views['ses'].'</td>
        <td>'.$views['views'].'</td>
    </tr>';
    $balajiCount++;
}



?>