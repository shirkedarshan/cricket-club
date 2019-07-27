<?php

$status=$_REQUEST['status'];
echo $status;

$booking_id=$_REQUEST['booking_id'];
echo $booking_id;

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
	 mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;  

	 // status 1 = Booking Approved  ( admin access)
	 // status 2 = Booking Rejected  ( admin access )
	 // status 3 = Delete Booking Record ( Completed or Approved Deleted )
	 
		if( $status == 1){
			$query="update booking set status='1' where booking_id='$booking_id'";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
			header('location:booking_req.php');
		}else{
			if( $status == 2){
			$query="update booking set status='2' where booking_id='$booking_id'";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
			header('location:booking_req.php');	
		}else{
			if( $status == 3){
			$query="delete from booking where booking_id='$booking_id'";
			$res=mysqli_query($con,$query) or die(mysqli_error($con));
			header('location:booking.php');	
			}
		}
		}
echo"Error Occured";

?>