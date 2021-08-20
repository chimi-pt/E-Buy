<?php

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role']!="client" )
{
    header("location:registration.php");
}

?>


<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<body style='background-image: url("sunset.jpg");
  background-position: center;
  background-size: cover;'>

<!-- Navbar (sit on top) -->
<ul class="nav justify-content-center" style="font-size: 50px; color: white!important;">
  <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">About</a>
  </li>
  </ul>
  <ul>
  <li class="nav justify-content-end">
    <a class="nav-link" href="logout.php" style="font-size: 70px; color: red" >LOG OUT</a>
  </li>
 
</ul>

<h1 style="color: white; font-size: 70px">Welcome <?=  $_SESSION ['username'] ?></h1>
<h1 style="color: white; font-size: 70px">You are a <?=  $_SESSION ['role'] ?></h1>



</body>
</html>
