<html>
	<head>
		<title>Booking</title>

<script src="jquery.js"></script>
<script>

<!-- For Writing days

$(document).ready(function(){


$("#total_days").keyup(function(){
		var str = $(this).val();
		
$("#cost").val(""+str*3000);
	});
		});	

</script>

<script>

<!-- For Clicking up down days

$(document).ready(function(){


$("#total_days").click(function(){
		var str = $(this).val();
		
$("#cost").val(""+str*3000);
	});
	
});

</script>
<!--
<script>
$(document).ready(function(){
  $("button").click(function(){
   
   $.ajax({
	   
	url: "test3.php", 
	beforeSend: function(){},
	data: { 
	start_date: $("#start_date").val(),
	total_days: $("#total_days").val()
	},
   success: function(result){
    $("#div1").html(result);
	}
	
	});
  });
});
</script>
-->

<link rel="stylesheet" href="style.css">
<img src="pics/bg12.jpg" class="bg"/>
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


echo '	<hr>
		</head>
		<body >';
	?>

		<!-- Highlights End -->
		</head>

<body>

<?php

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
			
	echo '<a href="logout.php" style="text-decoration:none">Logout</a>
			
	</span></div>
	
	</center><hr>';	
}
else{
	
	echo"<div class='title'><center> Terna Cricket Club 
	
	<span class='innertitle'>
	
	<a href='login.php' style='text-decoration:none'>Login</a>&nbsp &nbsp
	<a href='signup.php' style='text-decoration:none'>Signup</a> 
	
	</span></div>
	
	</center><hr>";
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
//.............................Start.............................
@$user_name = $_SESSION['user_name'];
?>
<center><div class="colwidth_350">
<div class="box">
<form action="userbooking_action.php" method="POST" enctype="multipart/form-data" >

<h2>Ground Booking.</h2>
<hr><br>

<div class="text_left">

<?php
if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id']))  /**/
	{
	echo'Name &nbsp &nbsp &nbsp:
	<input type="text" name="name" value="'.$user_name.'" disabled />
<br><br>';
	}
	else{
		echo'Name &nbsp &nbsp &nbsp:
	<input type="text" name="name" disabled />
<br><br>';
	}
?>
	E-Mail &nbsp &nbsp:
	<input type="email" name="email" required />
<br><br>

	Contact  &nbsp : 
	<input type="text" name="contact" maxlength="10" required />
<br><br>
	
	Purpose &nbsp : 
	<input type="text" name="purpose" required />
<br><br>

	Date  &nbsp &nbsp &nbsp &nbsp: 
	<input type="date" name="start_date" required />
<br><br>

	Days &nbsp &nbsp &nbsp : 
	<input type="number" name="total_days" id="total_days"  min="1" max="10" required />
<br><br>

<!--	To Days &nbsp :
	<input type="date" name="end_date" id="end_date" disabled	 />
<br><br>  -->

	Total Cost :<input type="text" name="cost" id="cost" disabled />
<br><br>

<?php
if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id']))  /**/
	{
	echo'<input type="submit" value="Request"/><span>&nbsp &nbsp </span>';
	}
?>

<input type="reset" value="Reset All"/>
<br><br><hr>
</form>

<?php
if( !isset( $_SESSION['session_id']) or !isset( $_SESSION['user_id']))  /**/
	{
echo '<marquee> You Must Login Or SignUp For Requesting Ground Booking</marquee>';
}
?>
<!--
			<button>Calculate</button>
			<div id="div1"><h2>jQuery AJAX</h2></div>
			Date  &nbsp &nbsp &nbsp &nbsp: 
			<input type="date" name="date" required />
			<br><br>
-->
</div>
</div></div>
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