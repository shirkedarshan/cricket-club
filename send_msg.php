<html>
	<head>
		<title>Send Msg</title>
		
<script type="text/javascript">
		
		function show_email(value)
		{	
			var xmlhttp= new XMLHttpRequest();
			
			xmlhttp.open("GET","sendmsg_ajax.php?name="+value,true);
			//the file get_city.php is their in this folder itself
			xmlhttp.send();
			
			xmlhttp.onreadystatechange=function()
			{	
				if(xmlhttp.readyState==4)
				{	
				document.getElementById('result').innerHTML=xmlhttp.responseText;
				}
			}
			
		}

	</script>		
					
<link rel="stylesheet" href="style.css">
<img src="pics/bg.jpg" class="bg" />
<?php
					// <!-- Here Write Latest Highlights-->

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

//................................NAVBAR......................

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

///////////////////////////////////////
$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
		mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;  
		
echo '<center><div class="in_form">';
echo '<div class="box">';
echo'<center><h2>Send A Message</h2></center><hr><br>';


echo '<form method="post" action="sendmsg_action.php" >';
	
		// <!-- dropdown -->
echo'<b>Please choose the User &nbsp &nbsp : &nbsp &nbsp </b>';
	
		$sql="select * from tbl_users";
		
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		if(mysqli_num_rows($res)>0)
		{	
		echo '<select style="height:20;overflow:scroll;"
		
		id="name" name="user_name" onchange="show_email(this.value)">';
		
		// echo '<option label=""></option>';
		
		while($row=mysqli_fetch_assoc($res))
			{
			echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
			}
			echo '</select><br><br>';
		}

		// echo'<br><br><div id="result"><b>Email : </b></div><br />';
		
	echo 'Write A Message : <input type="text" name ="message"/>';

	echo '<input type="hidden" name="status" value="1"/>';
	
	echo '<br><br>';
	echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";
	echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ";

	echo '<input type="hidden" name="status" value="1"/>';

	echo '<input type="submit" value="Send Message"/>';

echo '</form>';

@$status=$_REQUEST['status'];
if( $status== 'sent'){
echo'<hr><center><b>Message Sent</b></center>';
}
echo '<br>';

echo '</div>';
echo '</div></center>';
/*
echo '<hr>';
echo 'User name : <input type="text" style="width:150px" id="keyword"  name="box"/>';
echo '<span id="result"> </span>';
*/
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