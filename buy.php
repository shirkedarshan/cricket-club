<html>
	<head>
		<title>Kit Store</title>
			
<link rel="stylesheet" href="style.css">
<img src="pics/bg6.jpg" class="bg"/>
</head><body>
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

echo '	<hr>';

session_start();

if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<div class="title"><center> Terna Cricket Club 
	
	<span class="innertitle">';
	
	if(isset( $_SESSION['admin']) )
	{
		echo "<a href='adminpanel.php' style='text-decoration:none;'>Admin Panel</a>";
		echo '&nbsp &nbsp';
	}
	echo '
	<a href="cartbtn.php" style="text-decoration:none">Cart</a>
	&nbsp &nbsp
	
	<a href="logout.php" style="text-decoration:none">Logout</a>
			
	</span></div>
	
	</center><hr>';	
}
else{
	die(header('location:login.php?status=prod_error'));
}

//.......................................NAVBAR...............................

echo'<div class="navbar" >

	<a href="index.php">Home</a>';

	if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<a href="user_inbox.php">Inbox</a>';
	}

echo'
	<a href="event.php">Events</a>
	<a href="product.php">Kit Store</a>
	<a href="teams.php">Teams</a>
	<a href="user_booking.php">Ground Booking</a>
	<a href="club.php">Club Affiliations</a>
	<a href="booking.php">Booking Status</a>';

	if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<a href="user_fb.php">Feedback</a>';
	}
	
	// <a href="delete_acc.php">Delete Account</a>
	
echo'</div>';

echo '<hr>';
// 				....................Transaction...........................

if(!isset( $_SESSION['session_id'])or !isset( $_SESSION['user_id'])){
	echo"";
	echo "<div style='width:1150px;height:60%; text-align: center; margin:100px;border:1px;border-style:solid; background-color: lightyellow;'>
	<div style='padding:100px;'>
	Sorry To Say You Are Not Logged In
	<a href='login.php' style='text-decoration:none'>Click Here</a> To Login.<br>
	<a href='index.php' style='text-decoration:none'>Click Here</a> To Return Home.
	</div>
	</div> ";
}
else{ 
?>

<center><div style="display:inline-block;
					vertical-align:middle;
					margin-left:150;
					margin-right:25;
					padding:20px;
					width:890px;
					border:2px;
					border-style: solid;
					border-color: lightcoral;
					word-wrap:break-word;
					">
	<div class="box">
	
	<center><b><font size=5>Enter The Following Details To Complete a Transaction </font></b></center>

	</div>
	
<div class="colwidth_350" style="float:left">

<form action="buy_action.php" method="post">
		
		<div class="box">
	
		<b><font size=4>Shipping Details.</font></b><hr><br>
		
		First name: <input type="text" name="sfname" required />
		<br><br>
		
		Last name: <input type="text" name="slname" required />
		<br><br>
		
		Address  &nbsp &nbsp: <input type="text" name="saddress" required />
		<br><br>
		
		Contact No: <input type="text" name="snumber" maxlength="10" required />
		<br><br>
		
		Enter a Captcha Code:<br><br>
		</label>  <input type="text" name="code">
		<br><br>
		<img src="captcha.php"/>
		
		<br> <br>
		
	</div>
	
</div>

<div class="colwidth_350" style="float:right">

<div class="box">
	
		<b><font size=4>Billing Details.</font></b>
		<hr><br>
		
		First name: <input type="text" name="bfname" required />
		<br><br>
		
		Last name: <input type="text" name="blname" required />
		<br><br>
		
		Address  &nbsp &nbsp: <input type="text" name="baddress" required />
		<br><br>
		
		Contact No: <input type="text" name="bnumber" maxlength="10" required />
		<br><br>
		
		Card No &nbsp &nbsp: <input type="text" name="cardno" maxlength="16" required />
		<br><br>
		
		Pin No &nbsp &nbsp &nbsp: <input type="password" name="pass" maxlength="4" required />
		<br><br>
		
<?php	
$cost=$_REQUEST['cost'];

		echo'Cost &nbsp &nbsp &nbsp &nbsp &nbsp:
		<input type="number" value="'.$cost.'" disabled />
		<br><br>';
?>
		<input type="submit" value="Confirm Transaction">
		<br>
		
<?php

@$status=$_REQUEST['status'];

if( $status == 'success'){
echo'<center style="color:red"><h4>Transaction Done Successfully</h4></center>';
}

if( $status == 'card_error'){
echo'<center style="color:red"><h4>Card No Must Contain 12 Numbers</h4></center>';
}

if( $status == 'cap_error'){
echo'<center style="color:red"><h4>Enter Correct Captcha Code</h4></center>';
}

if( $status == 'pin_error'){
echo'<center style="color:red"><h4>Pin No Must Contain 4 Characters</h4></center>';
}

if( $status == 'error'){
echo'<center style="color:red"><h4>Enter Correct Information</h4></center>';
}

?>
	</div>

</div>

</form></div></center>

<?php
}
?>

</body>
							<!-- Footer Section -->
<footer>

<div class="footer" style="clear:both">

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