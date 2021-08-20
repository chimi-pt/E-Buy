<?php

session_start();



$server="localhost";
$username="root";
$password="";
$database="users";

$con=mysqli_connect($server,$username,$password,$database);




$User_name=$_POST["user"];
$Password=$_POST["password"];




$s="SELECT *from user_details where Name='$User_name' && password='$Password'";

$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);


if($num==1)
{
	$_SESSION['username']=$User_name;
	header ('location:homepage.php');
}
else
{
	header('location:registration.php');

	$_SESSION['message']="Invalid Username or Password";
	$_SESSION['msg_type']="danger";
}


?>