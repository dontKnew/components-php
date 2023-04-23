<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @copyright © 2018 ProThemes.Biz
 *
 */
 
$pageTitle = 'Additional Options';
$subTitle = 'API Setup';
$fullLayout = 1; $footerAdd = false; $footerAddArr = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['plagiarismSel'])){
        
    $apiLevel = escapeTrim($con, $_POST['apiLevel']);
    $wordLimit = escapeTrim($con, $_POST['wordLimit']);
    $minChar = escapeTrim($con, $_POST['minChar']);

    $query = "UPDATE pr02 SET api_type='$apiLevel', wordLimit='$wordLimit', minChar='$minChar' WHERE id='1'";
    mysqli_query($con, $query);

    if (mysqli_errno($con))
    {
        $msg = '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                        <b>Alert!</b> ' . mysqli_error($con) . '
                                    </div>';
    } else
    {
        $msg = '
        <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                        <b>Alert!</b> Plagiarism checker settings saved successfully
                                    </div>';
    }
    
    }
    
    if(isset($_POST['mozSel'])){
        
    $mozAccess = escapeTrim($con, $_POST['mozAccess']);
    $mozSecret = escapeTrim($con, $_POST['mozSecret']);

    $query = "UPDATE pr24 SET moz_access_id='$mozAccess', moz_secret_key='$mozSecret' WHERE id='1'";
    mysqli_query($con, $query);

    if (mysqli_errno($con))
    {
        $msg1 = '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                        <b>Alert!</b> ' . mysqli_error($con) . '
                                    </div>';
    } else
    {
        $msg1 = '
        <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                        <b>Alert!</b> Mozrank checker settings saved successfully
                                    </div>';
    }
    
    }

}


$query = "SELECT * FROM pr02";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result))
{
    $apiLevel = Trim($row['api_type']);
    $wordLimit = Trim($row['wordLimit']);
    $minChar = Trim($row['minChar']);
}


$query = "SELECT * FROM pr24";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result))
{
    $mozAccess = Trim($row['moz_access_id']);
    $mozSecret = Trim($row['moz_secret_key']);
}
?>