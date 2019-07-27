<html>
	<head>
		<title>Approve Booking</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg.jpg" class="bg" />
						<!-- Here Write Latest Highlights-->

<?php

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$notice = "SELECT * FROM notice";
$notice_res = mysqli_query($con,$notice);

echo '<marquee>';

while($row=mysqli_fetch_assoc($notice_res)){

echo $row['notice_descp'];

echo '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
}
echo  '</marquee>';

?>
		<!-- Highlights End -->
		<hr>

		</head>

<body>

<?php

session_start();

if(isset( $_SESSION['session_id']) AND isset( $_SESSION['admin']) ) 
	{
		
	echo'<div class="title"><center> Terna Cricket Club 
	
	<span class="innertitle">';
	
	echo "<a href='adminpanel.php' style='text-decoration:none;'>Admin Panel</a>";
			
	echo '&nbsp &nbsp 
			
	<a href="logout.php" style="text-decoration:none">Logout</a>
			
	</span></div><hr>';
		
		}
else{
	die(header("location:index.php"));
}

//..............................NAVBAR.............................

echo'<div class="navbar" >

	<a href="index.php">Home</a>
	<a href="send_msg.php">Send Msg</a>
	<a href="add_notice.php">Add Notice</a>
	<a href="add_event.php">Add Events</a>
	<a href="addproduct.php">Add Kits</a>
	<a href="add_teams.php">Add Teams</a>
	<a href="add_club.php">Add Club</a>
	<a href="booking_req.php">Booking Req</a>
	<a href="approved_bookings.php">Approved Bookings</a>
	<a href="notice_section.php">Notices</a>
	<a href="check_fb.php">Feedbacks</a>

</div>';

echo '<hr>';

//////////////Actual Logic

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;  
	
		$sql="select * from booking WHERE status='0'";
		
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));

echo '<div class="box">';
	
	if(mysqli_num_rows($res)>0)
		{	

	echo'<center><h2>Booking Requests</h2></center><hr>';
		
	$count=0;
	echo "<table>";	

	while($row=mysqli_fetch_assoc($res))
	{
	$user_id=$row['user_id'];
	
	$sql1="select name from tbl_users where user_id='$user_id'";	
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
	
	$column=mysqli_fetch_assoc($res1);
	
	echo "<td>";

	echo "<div class='colwidth_200'>";
	
	
	echo '<b>Name</b> &nbsp &nbsp : '.$column['name'].'<br><br>';
	
	echo '<b>E-mail</b>&nbsp &nbsp: '.$row['email'].'<br><br>';
	
	echo '<b>Contact</b> : '.$row['contact'].'<br><br>';
	
	echo'<b>Purpose: </b>'.$row['purpose'].'<br><br>';
	
	//Para Testing Para Testing Para Testing
	
	$start_date=$row['start_date'];
	$end_date=$row['end_date'];

	$start_date = date('d-m-Y', strtotime($start_date));
	$end_date=date('d-m-Y', strtotime($end_date));

	echo '<b>From</b> &nbsp: '.$start_date;
	
	echo '<br><br>';
	//echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	
	echo '<b>To</b> &nbsp &nbsp &nbsp : '.$end_date.'<br>';
	echo'<br>';
			
	$booking_id=$row['booking_id'];
			
			echo '<a href="addbooking_action.php?status=1&booking_id='.$booking_id.'">';
			echo 'Approve</a>';
		
			echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
		
			echo '<a href="addbooking_action.php?status=2&booking_id='.$booking_id.'">';
			echo 'Reject </a>';
			
		echo "</div>";
		
			
		echo "</td>";

		$count++;
		if($count==4){
		$count=0;
		echo "</tr>";
			}
		}
	}else{
	echo '<font size="5">';
	echo '<br><br><center><b>No Requests Pending</b></center><br><br>';
	echo '</font>';
	}
echo '</table></div>';
?>
							<!-- Footer Section -->
<footer>

<div class="footer">

<!--opacity: 0.75;-->

<div class="f1" style="float:left">

CONTACT US <br><br>

Plot No. 12, Sector-22, Opp. Nerul Railway Station, Phase-II, Nerul (W), Navi Mumbai 400706.<br> 
Ph: 022-61115444 <br>
Fax: 022-61115400 <br>
Email: info@ternaengg.ac.in <br>

</div>


<div class="f1" style="float:right ;" >

FOLLOW US ON <br><br>

<a target="_blank" href="https://www.facebook.com/ternanerul"><img src="pics/logo/logo1.png" width="40"></a>

<a target="_blank" href="https://twitter.com/terna_college"><img src="pics/logo/logo2.png" width="39"></a>

<a target="_blank" href="https://www.linkedin.com/school/terna-engineering-college/about/"><img src="pics/logo/logo3.png" width="40"></a>

<a target="_blank" href="https://www.youtube.com/user/TEC2016" ><img src="pics/logo/logo4.png" width="40"></a>

</div>

</div>

</footer>