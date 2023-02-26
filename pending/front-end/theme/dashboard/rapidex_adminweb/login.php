<?php
ob_start();
session_start();
include "config.php";

print_r($_SESSION);
exit;

extract($_REQUEST); 
    $username=$_POST["username"];
	$password=$_POST["password"];
    $sql=mysqli_query($con,"select * from admin where admin_name ='$username' and admin_password ='$password'") or die(mysqli_error($con));
	$adminrow = mysqli_fetch_array($sql);
	
if((mysqli_num_rows($sql) == 1)) {
	$H=date("H",time());
	$i=date("i",time());
	$time=date("H:i",mktime($H+5,$i+30,0,0,0,0));
	$logindate=date("l,Fd,Y ").$time; 
    $ipaddress=$_SERVER['REMOTE_ADDR'];
	$adminid=$adminrow['admin_id'];
	$lastlogindate=$adminrow['lastlogindate'];
	$lastloginip=$adminrow['lastloginip'];

						$sql="select * from admin where admin_name ='$username'";
					    $result=mysqli_query($con,$sql);
                         $record=mysqli_fetch_assoc($result);
		$logindateinsert=mysqli_query($con,"update `admin` set `lastlogindate`='$logindate',`lastloginip`='$ipaddress' where `admin_id`='$adminid'") or die(mysqli_error($con));;

	$_SESSION['lastlogindate']=$lastlogindate;
	$_SESSION['lastloginip']=$lastloginip;					 
	$_SESSION["admin"]=$record['admin_name'];
	$_SESSION["aid"]=$record['admin_id'];
	header("location:mainpage.php");
	exit;
    }
else 
		{
		header("location:index.php?err=1");
		}


?>