<?php
 
//This gets all the other in_formation from the form

$team_name = $_REQUEST['team_name'];

$player_1 = $_REQUEST['player_1'];
$player_2 = $_REQUEST['player_2'];
$player_3 = $_REQUEST['player_3'];
$player_4 = $_REQUEST['player_4'];
$player_5 = $_REQUEST['player_5'];
$player_6 = $_REQUEST['player_6'];
$player_7 = $_REQUEST['player_7'];
$player_8 = $_REQUEST['player_8'];
$player_9 = $_REQUEST['player_9'];
$player_10 = $_REQUEST['player_10'];
$player_11 = $_REQUEST['player_11'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error());

//create database
mysqli_select_db($con,'cricket') or die(mysqli_error($con));  

//insert query
$sql = "INSERT INTO teams(team_name,player_1,player_2,player_3,player_4,player_5,player_6,player_7,player_8,player_9,player_10,player_11) VALUES('$team_name','$player_1','$player_2','$player_3','$player_4','$player_5','$player_6','$player_7','$player_8','$player_9','$player_10','$player_11')";

mysqli_query($con,$sql) or die(mysqli_error($con));//query connect

$sql1 = "Select * from teams where team_name='$team_name'";

$result = mysqli_query($con,$sql1) or die(mysqli_error($con));

if( mysqli_num_rows($result) == 1 )
{
	
	mysqli_close($con);	
	echo "Teams Inserted Successfully<br>";
	echo "To Insert Another Team <a href='add_teams.php'>Click Here<a/><br>";
	header ("location:teams.php");
}else{
	echo mysqli_error($con);
	
	mysqli_close($con);	
	}

								

?>