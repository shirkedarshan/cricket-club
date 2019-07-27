<html>
	<head>
		<title>Welcome</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg5.jpg" class="bg"/>
					<!-- Here Write Latest Highlights-->

<?php

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$notice = "SELECT * FROM notice";
$notice_res = mysqli_query($con,$notice);

echo '<marquee style="color: #2f2525">';

while($row=mysqli_fetch_assoc($notice_res)){

echo $row['notice_descp'];

echo '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
}
echo  '</marquee>';

echo '	<hr>
		</head>
		<body>';

	echo"<div class='title'> Terna Cricket Club </span>
	
<span class='innertitle'>
	
	<a href='signup.php' style='text-decoration:none'>Signup</a> 
	</span>
	
	</div>";	
	echo "<hr>";

echo'<div class="navbar" >

	<a href="index.php">Home</a>
	<a href="event.php">Events</a>
	<a href="product.php">Kit Store</a>
	<a href="teams.php">Teams</a>
	<a href="user_booking.php">Ground Booking</a>
	<a href="club.php">Club Affiliations</a>
	<a href="booking.php">Booking Status</a>';
	
echo'</div>';

echo '<hr>';

?>

<center>

<div class="colwidth_350">
<div class="box">

<form action="login_action.php" method="post" >
<h2>User Login</h2><hr>
<br>
User_Name: <input type="text" name="name" required /><br><br>

Password &nbsp : <input type="password" name="pwd" required /><br><br>

Captcha  &nbsp  &nbsp :
		<input type="text" name="code"><br><br>
		
		 &nbsp  &nbsp  &nbsp  &nbsp  &nbsp 
		 <img src="captcha.php"><br><br>
		
<center><input type="submit" value="login"/> </center>
</form>

<?php

@$status=$_REQUEST['status'];
if( $status == 'error'){
echo '<hr>';
echo'<center style="color:red"><b><font size="3">Check User_Name & Password</font></b></center>';
}else{
	if( $status == 'cap_error'){
	echo '<hr>';
	echo'<center style="color:red"><b><font size="3">Enter Correct Captcha Code</font></b></center>';
	}else{
		if( $status == 'prod_error'){
		echo '<hr>';
		echo'<center style="color:red"><b><font size="3">Login To Buy More Products</font></b></center>';
	}
}
}
?>

<hr>
<center><b> If Not Registered Then SignUp </b></center>

</div></div></center>
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
</html>