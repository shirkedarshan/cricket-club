<?php
 
session_start();

$event_id= $_REQUEST['event_id'];

echo $event_id;

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']) ){
// echo "connected";

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$del_event = "delete from event where event_id= '$event_id' ";
$delevent_res = mysqli_query($con,$del_event) or die(mysqli_error($con)) ;

header("location:event.php");

}else{
	header("location:event.php");
}

?>