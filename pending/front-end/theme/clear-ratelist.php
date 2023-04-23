<?
include "config.php";

$sql=mysqli_query($con,"delete from ratelist");

header("location:ratelist.php");
?>