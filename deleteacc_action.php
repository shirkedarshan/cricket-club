<?php
session_start();

$status=$_REQUEST['status'];

if( $status == 'confirm' or $status == 'CONFIRM'){
	
$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$user_id=$_SESSION['user_id'];

$query1="delete from booking where user_id='$user_id'";
$res1=mysqli_query($con,$query1) or die(mysqli_error($con));

$query2="delete from feedback where user_id='$user_id'";
$res2=mysqli_query($con,$query2) or die(mysqli_error($con));

$query3="delete from fb_inbox where user_id='$user_id'";
$res3=mysqli_query($con,$query3) or die(mysqli_error($con));

$query4="delete from user_inbox where user_id='$user_id'";
$res4=mysqli_query($con,$query4) or die(mysqli_error($con));

$query5="delete from reference where user_id='$user_id'";	///CART PRODUCTS
$res5=mysqli_query($con,$query5) or die(mysqli_error($con));

$query6="delete from tbl_users where user_id='$user_id'";
$res6=mysqli_query($con,$query6) or die(mysqli_error($con));


unset($_SESSION['user_status']);
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['session_id']);
unset ($_SESSION['admin']);
unset($_SESSION['totalcost']);

session_destroy();

echo"Thank You,Visit again";
echo"<br>";
echo"<a href='index.php'/>LogIn again</a>";
header('location:index.php');
}else{
	header('location:delete_acc.php?status=error');
}

?>