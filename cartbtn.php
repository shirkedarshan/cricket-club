
<html>
	<head>
		<title>Kits Cart</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg6.jpg" class="bg"/>
</head>
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
		<body>';

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

if( !isset( $_SESSION['session_id']) Or !isset( $_SESSION['user_id'])){
		die(header('location:index.php'));
}

$session_id= $_SESSION['session_id'];
$user_id= $_SESSION['user_id'];

// to save in DB perform following steps					
				
				//connect to the DB
					$con= mysqli_connect('localhost','root','')	or die("<b>Sorry, cannot connect to your localhost</b>");           
					
				//select one DB out of many DBs
					mysqli_select_db($con,'cricket') or die("<b>Sorry, cart DB not found.</b>");

					$sql1="Select prod_id from reference where user_id='$user_id' ";
					$result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
			
			
if(@mysqli_num_rows($result1)>0){
		
		//$message = "You Have Cart Contents";
		//echo "<script type='text/javascript'>alert('$message');</script>";

echo"<center><h3><div id=response></div></h3></center>";
$_SESSION['totalcost']=0;

echo '<div class="box">';

echo "<h2><center>Your Kits Cart </center></h2><hr>";
echo "<center><table>";
	while($row = mysqli_fetch_assoc($result1)){
				//$sql2="select * from product where product_id=$row['prod_id']";
				echo "<td>";
				
			//Fieldset Starts
			
			echo"<div class='in_form'>";
			$prod_id= $row['prod_id'];
			
			////////For Prod_name query

			$sql2="Select * from product where prod_id='$prod_id'";
			$result2=mysqli_query($con,$sql2) or die(mysqli_error($con));
			$column = mysqli_fetch_assoc($result2);	

			//Start of prod_name div

			echo "<h3><center>";
			echo $column['prod_name'];
			echo "</center></h3><hr>";
			echo "<br>";
				
			/////////For File_Name Query

			echo '<center><img src="pics/'.$column['file'].'"height="200"></center>';
			echo '<br>';
				
			/////////For Description Query
			
			echo'<center>';

			echo "<div class='in_form'><br><center><b>Description : </b><br><br>";
			echo $column['prod_descr'];
			echo "<br><br>";
				
			////////// For Cost Query
				
			echo "<b>Cost : </b>Rs.". $column['cost'];
			$_SESSION['totalcost'] += $column['cost'];
			
			
			echo "<br><br>";
			
			echo "<a href='buy.php?cost=".$column['cost']."'><button>Buy</button></a>";
			echo "&nbsp&nbsp&nbsp";
				
				
			echo "<a href='cart_del.php?prod_id=".$prod_id."'><input type='submit' value='Remove From Cart'></a>";
				
			echo "</center></div>";
			echo "<br><br>";
				
			//End of outer div

			echo "</div>";//outermost fieldset end
			
			echo "<br>";
			
			echo "<br>";
				
			echo "</td></tr>";

				}
echo "<div style='position:absolute;right:50;top:220'>";
			echo '<font size="4" ><b>Total Price : '.$_SESSION['totalcost'].'</b>';
			echo '<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ';
			echo "<a href='buy.php?cost=".$_SESSION['totalcost']."'> Buy All </a>";
			echo '</font>';
echo "</div>";		
		echo "</table></center>";
		echo '</div>';
}else{
	$message = "You Dont Have Add To Cart Contents. Add Some.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<br>";
		
	echo '<div class="box">';
	echo '<center style="font-size:20px"><b>Your Kits Cart Is Empty</b><center>';
	echo '</div>';
}

unset($_SESSION['totalcost']);
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
</html>