<?php
 
//This gets all the other in_formation from the form
$club_name = $_REQUEST['club_name'];
$club_mail = $_REQUEST['club_mail'];
$club_site = $_REQUEST['club_site'];
$club_tel = $_REQUEST['club_tel'];
$club_file = $_FILES['club_file']['name'];
//$file = $_FILES['file']['name'];
$club_loc = $_REQUEST['club_loc'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error());

// Use mysqli_real_escape_string

$club_name=mysqli_real_escape_string($con,$_REQUEST['club_name']);
$club_mail=mysqli_real_escape_string($con,$_REQUEST['club_mail']);
$club_site=mysqli_real_escape_string($con,$_REQUEST['club_site']);
$club_tel=mysqli_real_escape_string($con,$_REQUEST['club_tel']);
$club_file=mysqli_real_escape_string($con,$_REQUEST['club_file']);
$club_loc=mysqli_real_escape_string($con,$_REQUEST['club_loc']);

move_uploaded_file($_FILES['club_file']['tmp_name'], "pics/".$_FILES['club_file']['name']);

//create database
mysqli_select_db($con,'cricket') or die(mysqli_error($con));  

//insert query
$sql = "INSERT INTO club(club_name,club_mail,club_site,club_tel,club_loc,club_file) VALUES('$club_name','$club_mail','$club_site','$club_tel','$club_loc','$club_file')";

mysqli_query($con,$sql) or die(mysqli_error($con));//query connect

$sql1 = "Select * from club where club_name='$club_name'";

$result = mysqli_query($con,$sql1) or die(mysqli_error($con));

if( mysqli_num_rows($result) == 1 )
{
	echo "club Inserted Successfully<br>";
	echo "To Insert Another club<a href='add_club.php'>Click Here<a/><br>";
	header('location:club.php');
}else{

	echo mysqli_error($con);
}

mysqli_close($con);									

?>