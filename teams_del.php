<?php
 
session_start();

$teams_id= $_REQUEST['teams_id'];

// echo $teams_id;

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']) ){
// echo "connected";

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$del_teams = "delete from teams where teams_id= '$teams_id' ";
$delteams_res = mysqli_query($con,$del_teams) or die(mysqli_error($con)) ;

header("location:teams.php");

}else{
	header("location:teams.php");
}

?>