<?php
/*
if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']))  
	{
		echo "&nbsp&nbsp";

		echo '<a href="_del.php?_id='.$row['_id'].'"><button>Delete P</button></a>';
}
*/
 
session_start();

$prod_id= $_REQUEST['prod_id'];

echo $prod_id;

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']) ){
// echo "connected";

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$prod_del = "delete from product where prod_id='$prod_id' ";
$proddel_res = mysqli_query($con,$prod_del) or die(mysqli_error($con)) ;

$cart_del = "delete from reference where prod_id='$prod_id' ";
$cartdel_res = mysqli_query($con,$cart_del) or die(mysqli_error($con)) ;

header("location:product.php");

}else{
	header("location:product.php");
}

?>