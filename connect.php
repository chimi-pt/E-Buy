<?php


session_start();

$server="localhost";
$username="root";
$password="";
$database="users";

$con=mysqli_connect($server,$username,$password,$database);

$id=0;
$update=false;

$name='';
$fname='';
$sname='';
$password='';
$usertype='';

if (isset($_POST["register"])) 
{
$User_name=$_POST["uname"];
$First_name=$_POST["fname"];
$Second_name=$_POST["sname"];
$Password=$_POST["pword"];
$User_type=$_POST["usertype"];


$s="SELECT *from user_details where Name='$User_name'";

$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);


if($num==1)
{
	$_SESSION['message']="Username already taken";
	$_SESSION['msg_type']="danger";

	header('location:registration.php');
}
else
{
	$query="INSERT INTO user_details(Name,First_name,Second_name,password,user_type)VALUES('$User_name','$First_name','$Second_name','$Password','$User_type')";
	mysqli_query($con,$query);

	$_SESSION['message']="Record has been saved";
	$_SESSION['msg_type']="success";

	header('location:registration.php');
}


}

if(isset($_GET['delete']))
	{
		$id=$_GET['delete'];
		$con->query("DELETE FROM user_details WHERE user_id=$id")or die ($con->error());


		$_SESSION['message']="Record has been deleted";
		$_SESSION['msg_type']="danger";

		header('location:registration.php');
	}
if(isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$update=true;


		$result = mysqli_query($con,"SELECT * FROM user_details WHERE user_id=$id")or die ($con->error());

		
			$row=$result->fetch_array();
			$name=$row['Name'];
			$fname=$row['First_name'];
			$sname=$row['Second_name'];
			$password=$row['password'];
			$usertype=$row['user_type'];
			# code...
		

		
	}

if (isset($_POST['update']))
 {
	$id=$_POST['id'];
	$name=$_POST['uname'];
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$password=$_POST['pword'];
	$usertype=$_POST['usertype'];

	$query="UPDATE  user_details SET Name='$name',First_name='$fname',Second_name='$sname', password='$password' ,user_type='$usertype' WHERE user_id=$id";
	mysqli_query($con,$query);

		

	$_SESSION['message']="Record has been updated";
	$_SESSION['msg_type']="warning";

	header('location:registration.php');


}
if (isset($_POST["login"])) 
{
	$User_name=$_POST["user"];
	$Password=$_POST["password"];
	$User_type=$_POST["usertype"];

	$sql="SELECT *from user_details where Name=? AND password=? AND user_type=?";

	$stmt=$con->prepare($sql);
	$stmt->bind_param("sss",$User_name,$Password,$User_type);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();

	session_regenerate_id();
	$_SESSION['username']=$row['Name'];
	$_SESSION['role']=$row['user_type'];
	session_write_close();

	if ($result->num_rows==1 && $_SESSION['role']=="client") 
	{
		header("location: home2.php");
	}
	else if ($result->num_rows==1 && $_SESSION['role']=="admin") 
	{
		header("location:shopping/admin.php");
	}
	else
	{
		echo "<script>alert('Username or Password is Incorrect!')</script>";
 		echo "<script>window.location='registration.php'</script>";
}

}

?>