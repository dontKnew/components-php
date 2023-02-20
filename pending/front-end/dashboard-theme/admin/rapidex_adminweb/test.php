<?
include "config.php"; 
$sql=mysqli_query($con, "select distinct service from ratelist") or die(mysqli_error($con));
while($row=mysqli_fetch_array($sql)){

	echo $row['service'];
	 
	echo "<br>";


// mysqli_query($con, "insert into country(name, code) values ('$destination','$code')");
}


?>