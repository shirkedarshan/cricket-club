<html>
	<head>
		<title>Add Event</title>
			
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

echo '	<hr> </head>
		<body>';

?>

		<!-- Highlights End -->
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

?>

<center><div class="in_form">
<div class="box">
<center><h2>Add Events</h2></center><hr>

<form action="addevent_action.php" method="POST" enctype="multipart/form-data" >

<center><strong style="font-size:20">Enter Unique Event Name.</strong></center>
<hr><br>

	Event type &nbsp &nbsp &nbsp &nbsp &nbsp :
				&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<select name="event_type" required>
	<option label=""></option>
	<option >Student</option>
	<option >Faculty</option>
	<option >Staff</option>
	<option >Others</option>
	
	</select>
<br><br>

	Total Overs&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:
			 &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
	<select name="event_overs" required>
	<option label=""></option>
	<option >5 Overs</option>
	<option >10 Overs</option>
	<option >20 Overs</option>
	<option >Not Specified</option>
	
	</select>
<br><br>

	Event Name  &nbsp &nbsp &nbsp &nbsp :
	<input type="text" name="event_name" required />
<br><br>

	Event Description:
	<input type="text" name="event_descp" required />
<br><br>

	Event Duration  &nbsp &nbsp: 
	<input type="text" name="event_dur" required />
<br><br>
	
	Event Time  &nbsp &nbsp &nbsp &nbsp &nbsp: 
	<input type="text" name="event_time" required />
<br><br>

Event Prize  &nbsp &nbsp &nbsp &nbsp &nbsp: 
	<input type="text" name="event_prize" required />
<br><br>

<input type="submit" value="Add Event"/><span>&nbsp &nbsp </span>
<input type="reset" value="Reset All"/>

</form>
</div>
</div></center>

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