<html>
	<head>
		<title>Kit Store</title>
<script type="text/javascript">
		
		function AddToCart(value)
		{	
			var xmlhttp= new XMLHttpRequest();
			
			xmlhttp.open("GET","AddToCart.php?prod_id="+value,true);
			//the file get_city.php is their in this folder itself
			xmlhttp.send();
			
			xmlhttp.onreadystatechange=function()
			{	
				if(xmlhttp.readyState==4)
				{	
				document.getElementById('response').innerHTML=xmlhttp.responseText;
}
			}
			
		}

	</script>			

<link rel="stylesheet" href="style.css">
<img src="pics/bg6.jpg" class="bg"/>
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

$prod_id= $_REQUEST['prod_id'];
$prod_id= base64_decode($_REQUEST['prod_id']);

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; 

$query = "SELECT * FROM product where prod_id='$prod_id'"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);

echo '<center>';

echo "<table>";
echo "<td >";

echo "<div class='box'>";//outermost div start

			echo "<h3><center>";
			echo $row['prod_name'];
			echo "</center></h3><hr>";
			echo "<br>";

							//Image

echo '<center><img src="pics/'.$row['file'].'"height="250"></center>';

							//Inner Div
echo'<center>';
echo "<div class='in_form'><br><b>Description : </b><br><br>".$row['prod_descr'];
echo "<br><br>";
echo "<b>Cost : </b>Rs.".$row['cost'];
echo "<br><br>";

							//Buttons
$prod_id=$row['prod_id'];
echo "<input type='submit' value='Add To Cart' onclick=AddToCart('$prod_id')>";
echo "&nbsp&nbsp";

echo "<a href='buy.php?cost=".$row['cost']."'><button>Buy</button></a>";

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']))  /**/
	{
		echo "&nbsp&nbsp";

		echo '<a href="prod_del.php?prod_id='.$row['prod_id'].'"><button>Delete Product</button></a>';
}

echo "<br><br>";

///////////            AJAX RESPONSE for AddToCart
echo "<b style ='font-size:20px;' id='response'></b>";


echo "</div>";
echo'</center>';

							//End Inner Div
echo "<br><br>";

echo "</div>";//outermost div end
echo "</td>";

echo "</table>";
echo '</center>';

mysqli_close($con); //Make sure to close out the database connection
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
