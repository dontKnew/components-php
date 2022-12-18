<?php

/*
* @author Balaji
* @name: Rainbow PHP Framework
* @copyright � 2017 ProThemes.Biz
*
*/

//Application Path
define('ROOT_DIR', realpath(dirname(__FILE__)) .DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR .'core'.DIRECTORY_SEPARATOR);
define('CONFIG_DIR', APP_DIR .'config'.DIRECTORY_SEPARATOR);

//Load Configuration & Functions
require CONFIG_DIR.'config.php';
require APP_DIR.'functions.php';

//Database Connection
$con = dbConncet($dbHost, $dbUser, $dbPass, $dbName);

$admin_user = "seo@mydomain.com";
$admin_pass = "seo@786";
$new_pass = passwordHash($admin_pass);

$query = "UPDATE admin SET user='$admin_user', pass='$new_pass' WHERE id='1'";
mysqli_query($con, $query);

if (mysqli_errno($con))
{
    //Print the Error
    echo "<br> <br> Password reset failed!";
    //Close the database conncetion
    mysqli_close($con);
} else
{
    //print the message
    echo "<br><br><b>Your password has been reset successfully!</b> <br><br>";
    echo "Admin ID: <b>$admin_user</b><br>";
    echo "Admin Password: <b>$admin_pass</b><br><br>";
    echo "\"reset.php\" file deleted for security reason!<br><br>";
    //Close the database conncetion
    mysqli_close($con);
    delFile("reset.php");
}

?>