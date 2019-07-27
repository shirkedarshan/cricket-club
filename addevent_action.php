<?php
 
//This gets all the other in_formation from the form
$event_type = $_REQUEST['event_type'];
$event_overs = $_REQUEST['event_overs'];
$event_name = $_REQUEST['event_name'];
$event_descp = $_REQUEST['event_descp'];
$event_dur = $_REQUEST['event_dur'];
$event_time = $_REQUEST['event_time'];
$event_prize = $_REQUEST['event_prize'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error());

// Use Real Escape String

$event_type=mysqli_real_escape_string($con,$_REQUEST['event_type']);
$event_name=mysqli_real_escape_string($con,$_REQUEST['event_name']);
$event_descp=mysqli_real_escape_string($con,$_REQUEST['event_descp']);
$event_dur=mysqli_real_escape_string($con,$_REQUEST['event_dur']);
$event_time=mysqli_real_escape_string($con,$_REQUEST['event_time']);
$event_prize=mysqli_real_escape_string($con,$_REQUEST['event_prize']);
$event_overs=mysqli_real_escape_string($con,$_REQUEST['event_overs']);

//create database
mysqli_select_db($con,'cricket') or die(mysqli_error($con));  

//insert query
$sql = "INSERT INTO event(event_name,event_overs,event_descp,event_type,event_dur,event_time,event_prize) VALUES('$event_name','$event_overs','$event_descp','$event_type','$event_dur','$event_time','$event_prize')";

mysqli_query($con,$sql) or die(mysqli_error($con));//query connect

$sql1 = "Select * from event where event_name='$event_name' and event_type='$event_type'";

$result = mysqli_query($con,$sql1) or die(mysqli_error($con));

if( mysqli_num_rows($result) == 1 )
{
	echo "Event Inserted Successfully<br>";
	echo "To Insert Another Event <a href='add_event.php'>Click Here<a/><br>";
	header ("location:event.php");
}else{
	echo mysqli_error($con);
	mysqli_close($con);	
	}

								

?>