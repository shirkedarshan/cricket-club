<?php

session_start();

$club_id= $_REQUEST['club_id'];

// echo $club_id;

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']) ){
	
$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

echo "connected";

$club_del = "delete from club where club_id='$club_id' ";
$clubdel_res = mysqli_query($con,$club_del) or die(mysqli_error($con)) ;

header("location:club.php");
}else{
	header("location:club.php");
}