<?php

session_start();



?>
<?php

  $msg = ""; 
  $server="localhost";
  $username="root";
  $password="";
  $database="productdb";

  $db=mysqli_connect($server,$username,$password,$database);

  if (isset($_POST['submitImage'])) { 

  
    $food_name=$_POST["fooditem"];
    $file=$_FILES["file"];
    $food_price=$_POST["price"];


    $filename = $_FILES["file"]["name"]; 
    $fileTmpName=$_FILES["file"]["tmp_name"];
    $fileSize=$_FILES["file"]["size"];
    $fileError=$_FILES["file"]["error"];
    $fileType=$_FILES["file"]["type"];

    $fileExt= explode('.', $filename);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png');

    if (in_array($fileActualExt, $allowed)) 
    {
      if ($fileError=== 0)
         {
           if ($fileSize < 10000000) 
              {
                $fileNameNew=uniqid('', true).".".$fileActualExt;

                $folders='uploads/'.$fileNameNew;

                $fileDestination='uploads/'.$fileNameNew;
                if(move_uploaded_file($fileTmpName, $fileDestination))
                {
                   echo "Uploaded Successfully";
                }else
                {
                    echo "Error";
                }

              }
              else
                  {
                    echo "Your file is too big!";
                  }
        }
        else
        {
          echo "There was an error uploading your file!";
        }
    }
    else
    {
      echo "You cannot upload files of this type!";
    }

    

          

    $db = mysqli_connect("localhost", "root", "", "productdb");
        $sql = "INSERT INTO `producttb`(`product_name`,`product_price`, `product_image`)VALUES ('$food_name','$food_price','$folders')";

        mysqli_query($db, $sql); 

}
  

  $result = mysqli_query($db, "SELECT * FROM productb"); 
?> 



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food</title>
  <link rel="stylesheet"  href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">

  <script src="../js/all.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet"  href="../magnific-popup/magnific-popup.css">
</head>
<body>

<!-- Navbar (sit on top) -->

    <div id="menu-bar" onclick="onClickMenu()">
      <div class="bar" id="bar1"></div>
      <div class="bar" id="bar2"></div>
      <div class="bar" id="bar3"></div>
      <ul class="nav" id="nav">
        <li class="navi"><a href="#home">Home</a></li>
        <li class="navi"><a href="#users">Users</a></li>
        <li class="navi"><a href="#displaymenu">UploadImage</a></li>
        <li class="navi"><a href="#mnnn">Menu</a></li>
        <li class="navi"><a href="#orders">Orders</a></li>
       <li ><a class="navo" href="../logout.php">LogOut</a></li>
      </ul>
    </div>
        
     
    </div>

    <div id="username">
     <p class="text-capitalize"><?=  $_SESSION ['username'] ?></p>
    </div>

    <header class="header" id="home" >
    <div class="hero">
      <div class="h1 title">Welcome</div>
     
    </div>
  </header>
    <a href="#users" class="btn header-link primay-color"><i class="fas fa-arrow-down"></i></a>
  </header>
     

 <section class="users">
   <header class="headers" id="users" >

<?php
      $server="localhost";
  $username="root";
  $password="";
  $database="users";

  $con=mysqli_connect($server,$username,$password,$database);
      $result = mysqli_query($con,"SELECT * FROM user_details");
      //pre_r($result);
      //pre_r($result->fetch_assoc());
      ?>

      
      <div class="container">
         <div>
      <h2 class="title-text">Users</h2>
    </div>
      <div class="row justify-content-center">
        <table class="meza">
          <thead>
          <tr>
          <th>User Name</th>
          <th>First Name</th>
          <th>Second Name</th>
          <th>Password</th>
          <th>User Type</th>
          <th colspan="2">Action</th>
        </tr>
        </thead> 

    <?php
    $i=0;
      while($row=$result->fetch_assoc()): ?>
      <tr>
          <td><?php echo $row["Name"]; ?></td>
          <td><?php echo $row["First_name"]; ?></td>
          <td><?php echo $row["Second_name"]; ?></td>
          <td><?php echo $row["password"]; ?></td>
          <td><?php echo $row["user_type"]; ?></td>
              <td>
           <a href="../registration.php?edit=<?php echo $row['user_id']; ?>" class="btn btn-info">Edit</a>
             <a href="connect.php?delete=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endwhile;?>

        </table>
      </div>
      <?php
      function pre_r($array)
      {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
      }

    ?>
    </div>
  </header>

      </section>






   <?php
  require_once('php/CreateDb.php');
 require_once('php/component1.php');




 //create instance of CreateDb class
 $database=new CreateDb("Productdb","Producttb");


 $id=0;
$update=false;

$foodname='';
$foodprice='';



 if(isset($_POST['edit']))
 {
  $id=$_POST['product_id'];
    $update=true;

    $con=mysqli_connect("localhost","root","","productdb");
    $result = mysqli_query($con,"SELECT * FROM producttb WHERE id=$id")or die ($con->error());

    
      $row=$result->fetch_array();
      $foodname=$row['product_name'];
      $foodprice=$row['product_price'];
      
      # code...
    

    
  }
 if (isset($_POST['update']))
 {
  $id=$_POST['id'];
  $foodname=$_POST['fooditem'];
  $foodprice=$_POST['price'];
 
   $con=mysqli_connect("localhost","root","","productdb");
  $query="UPDATE  producttb SET product_name='$foodname',product_price='$foodprice' WHERE id=$id";
  mysqli_query($con,$query);

    

  echo "<script>alert('Image Updated')</script>";
    echo "<script>window.location='admin.php'</script>";
}




  if (isset($_POST['remove']))
 {
  
    $value=["product_id"];
      $id=$_POST['product_id'];
        

      
   $con=mysqli_connect("localhost","root","","productdb");
    $con->query("DELETE FROM producttb WHERE id=$id")or die ($con->error());
    echo "<script>alert('Image Deleted')</script>";
    echo "<script>window.location='admin.php'</script>";
     
    
  
}


?>


<section  id="displaymenu">
  <h2>.</h2>
  <div class="login-box boxy">
   <div class="card text-center">
            <div class="card-header">
              <h1 class="text-uppercase">upload image</h1>


            </div>
            <div class="card-body">
             <form action="" method="POST" enctype="multipart/form-data">


      <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control form-control-lg">
               


                <div class="input-group my-3">
                  

                  <input type="text"  name="fooditem" class="form-control form-control-lg" value="<?php echo $foodname; ?>"   required="true" placeholder="Enter food name" id="fooditem" class="form-control">

                </div>





                <div class="input-group my-3">
                  <?php
                     if($update==true):
                  ?>

                  <?php else: ?>  
                  <input type="file" name="file" class=" form-control-lg" required="true" id="foodimage" >
                  <?php endif;?> 

                </div>

               




                <div class="input-group my-3">

                   <input type="number"  name="price" class="form-control form-control-lg" value="<?php echo $foodprice; ?>" id="foodprice" class="form-control" placeholder="Enter Price" required="true">

                </div>

                 <?php
        if($update==true):
        ?>
            <button type="submit" name="update"class="btn btn-block btn-lg text-uppercase contact-btn"><i class="far fa-hand-point-right mr-2"></i>update</button>

              <?php else: ?>  
            <button type="submit" name="submitImage" class="btn btn-block btn-lg text-uppercase contact-btn"><i class="far fa-hand-point-right mr-2"></i>Upload</button>
             <?php endif;?>  




              </form>

            </div>


          </div>
        </div>



    </div>

 



<div class="container">
  <div>
      <h2 class="title-text" id="mnnn">Menu</h2>
    </div>
  <div class="row text-center py-5">
    <?php
    $result=$database->getData();
    while($row=mysqli_fetch_assoc($result))
    {
      component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
    }


    ?>

  </div>

</div>











    
  </section>

  <section id="orders">
    <?php
      $server="localhost";
  $username="root";
  $password="";
  $database="productdb";

  $con=mysqli_connect($server,$username,$password,$database);
      $result = mysqli_query($con,"SELECT * FROM numbero");
      //pre_r($result);
      //pre_r($result->fetch_assoc());
      ?>

      
      <div class="container">
         <div>
      <h2 class="title-text">Orders</h2>
    </div>
      <div class="row justify-content-center">
        <table class="meza">
          <thead>
          <tr>
          <th>User Name</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Total</th>
          
          
        </tr>
        </thead> 

    <?php
    $i=0;
      while($row=$result->fetch_assoc()): ?>
      <tr>
          <td class="text-uppercase" style="color: orange;font-size: 20px;"><?php echo $row["UserName"]; ?></td>
          <br><br>
          <td><?php echo $row["ProductName"]; ?></td>
          <td><?php echo $row["ProductPrice"]; ?></td>
          <td><?php echo $row["Total"]; ?></td>
         
             
        </tr>
      <?php endwhile;?>

        </table>
      </div>
      



  </section>



<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.ripples-min.js"></script>
<script src="../magnific-popup/jquery.magnific-popup.js"></script>
<script src="../js/script.js"></script>
</body>
</html>
