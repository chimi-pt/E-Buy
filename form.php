<?php

session_start();
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "ebuy");
  if (isset($_POST['save'])) {
    // for the database
    $Uname=stripslashes($_POST['uname']);
    $Fname = stripslashes($_POST['fname']);
    $Sname = stripslashes($_POST['lname']);
    $Email = stripslashes($_POST['email']);
    $City = stripslashes($_POST['resid']);
    $Password = stripslashes($_POST['pword']);
    
    $Type = stripslashes($_POST['usertype']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    echo "$profileImageName";
    // For image upload
    $target_dir = "profileimages/";
    $target_file = $target_dir . basename($profileImageName);
   
   
      move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);

      $s="SELECT *from user_details where User_name='$Uname'";

      $result=mysqli_query($conn,$s);

      $num=mysqli_num_rows($result);
       if($num==1)
{
  $_SESSION['message']="Username already taken";
  $_SESSION['msg_type']="danger";

  header('location:register.php');
}
else
{
  $sql = "INSERT INTO user_details(User_name,First_name,Last_name,Password,User_type,Profile_image,Email,City)VALUES('$Uname','$Fname','$Sname','$Password','$Type','$profileImageName','$Email','$City')";
  mysqli_query($conn,$sql);

  $_SESSION['message']="Record has been saved";
  $_SESSION['msg_type']="success";

  header('location:login.php');
}
    }
  

  if (isset($_POST["login"])) 
{
  $User_name=$_POST["user"];
  $Password=$_POST["password"];
  $User_type=$_POST["usertype"];

  $sql="SELECT *from user_details where User_name=? AND Password=? AND User_type=? ";

  $stmt=$conn->prepare($sql);
  $stmt->bind_param("sss",$User_name,$Password,$User_type);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();

  session_regenerate_id();
  $_SESSION['username']=$row['User_name'];
  $_SESSION['role']=$row['User_type'];
  $_SESSION['image']=$row['Profile_image'];
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
   
    $_SESSION['message']="Username or Password is Incorrect!";
  $_SESSION['msg_type']="danger";

  header('location:login.php');
  
}

}