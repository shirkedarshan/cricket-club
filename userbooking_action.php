<?php

session_start();
$user_name=	$_SESSION['user_name'];
$user_id=	$_SESSION['user_id'];

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; 

$name=$user_name;
$email=$_REQUEST['email'];
$contact=$_REQUEST['contact'];
$purpose=$_REQUEST['purpose'];

$purpose=mysqli_real_escape_string($con,$_REQUEST['purpose']);

$start_date=$_REQUEST['start_date'];
$total_days=$_REQUEST['total_days'] - 1 ;

$end_date= date('Y-m-d', strtotime($start_date.'+'.$total_days.'days'));

$total_days= $total_days + 1 ; //////////For Adding Days Correction

$cost = 3000 * $total_days;    

echo $name;
echo '<br>';
echo $email;
echo '<br>';
echo $contact;
echo '<br>';
echo $purpose;
echo '<br>';
echo $total_days;
echo '<br>';
echo $cost;
echo '<br>';
echo $start_date ;
echo '<br>';
echo $end_date;
	
////////////////////////////////////////////////////////////////////////

//insert query
$sql = "INSERT INTO booking(user_id,name,email,contact,purpose,start_date,total_days,end_date,cost)
	VALUES('$user_id','$name','$email','$contact','$purpose','$start_date','$total_days','$end_date','$cost')";

mysqli_query($con,$sql) or die(mysqli_error($con));//query connect

echo "Requested Successfully<br>"; //wont execute If Die Execute line 44 check

header ("location:booking.php");

mysqli_close($con);									

?>