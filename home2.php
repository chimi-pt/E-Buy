<?php

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role']!="client" )
{
    header("location:registration.php");
}
$conn = mysqli_connect("localhost", "root", "", "ebuy");
$names=$_SESSION ['username'];

  $results = mysqli_query($conn, "SELECT *from user_details where User_name='$names'");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food</title>
  <link rel="stylesheet"  href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <script src="js/all.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet"  href="magnific-popup/magnific-popup.css">
</head>
<body>
	<!--Navbar------------------------------------------</!-->
	<div class="menu" id="menu" >
		<div id="menu-bar" onclick="onClickMenu()">
			<div class="bar" id="bar1"></div>
			<div class="bar" id="bar2"></div>
			<div class="bar" id="bar3"></div>
			<ul class="nav" id="nav">
				<li class="navi"><a href="#home">Home</a></li>
				<li class="navi"><a href="#about">About</a></li>
				<li class="navi"><a href="#food">Menu</a></li>
				<li class="navi"><a href="#contact">Contacts</a></li>
				<li ><a class="navo" href="logout.php">LogOut</a></li>
			</ul>
		</div>

		
	</div>
	<div id="username">
		 <?php foreach ($users as $user): ?>
     <p ><img src="<?php echo 'profileimages/' . $user['Profile_image'] ?>" width="50" height="50" border-radius="50%"  alt=""><?=  $_SESSION ['username'] ?></p>
 <?php endforeach; ?>
    </div>












	<!--End of navbar-----------------------------------</!-->
	<!--Header-------------------------------------------</!-->
	<header class="header" id="home" >
		<div class="hero">
			<div class="h1 title">E-Buy</div>
			<a href="shopping/index.php" class="hero-button pulsate">Order Now</a>
		</div>
	</header>
	  <a href="#about" class="btn header-link primay-color"><i class="fas fa-arrow-down"></i></a>
  </header>

	<!--End of header/!-->
	<!--About us------------------------------------------------</!-->

	<section id="about">
		<div>
			<h2 class="title-text">About Us</h2>
		</div>

		<div class="about-center">
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-mug-hot abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">Drinks</h2>
					<p class="about-info">We offer the widest selection on drinks.</p>
				</div>
			</article>
			<!--End of the article-------------</!-->
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-utensils abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">Healthy Food</h2>
					<p class="about-info">Care about your Health ,we gat you.</p>
				</div>
			</article>
			<!--End of the article-------------</!-->
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-mortar-pestle abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">Organic Food</h2>
					<p class="about-info">We gat you too whatever that is.</p>
				</div>
			</article>
			<!--End of the article-------------</!-->
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-drumstick-bite abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">White Meat</h2>
					<p class="about-info">If you're racist towards your meat we won't judge you.</p>
				</div>
			</article>
			<!--End of the article-------------</!-->
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-fish abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">Sea Food</h2>
					<p class="about-info">We have the widest selection on sea food</p>
				</div>
			</article>
			<!--End of the article-------------</!-->
			<!--Start of the article----------</!-->
			<article class="about">
				<div class="about-icon"><i class="fas fa-pepper-hot abicon"></i></div>
				<div class="about-text">
					<h2 class="about-subtitle">Hot $ Spicy</h2>
					<p class="about-info">If you're looking for a bit of cha cha in your food.</p>
				</div>
			</article>
			<!--End of the article-------------</!-->


		</div>
	</section>


	<!--End of About Us-------------------------------------------</!-->

	<!--Menu Section-----------------------------------------</!-->
	<section class="menu" id="menu">
		<article class="menu-image"></article>
			<article class="menu-text">
				<div class="menu-text-center">
					<h1 style="font-weight: bold;">Our Menu</h1>
					<p>Our menu has the widest selection on meals.Designed carefully to meet your needs and satisfaction.</p>
					<a href="shopping/index.php" class="hero-button " style="background: rgba(10,10,10); color: orange;">Explore</a>
				</div>

			</article>	








	</section>









	<!--End of Menu Section</!-->
	<!--Social Icons</!--------------->
	<section id="social-icons">
		<a href="#"><i class="fab fa-facebook facebook"></i></a>
		<a href="#"><i class="fab fa-twitter twitter"></i></a>
		<a href="#"><i class="fab fa-instagram instagram"></i></a>
		<a href="#"><i class="fab fa-yelp yelp"></i></a>
	</section>
	<!--End of Social icons-------------------------</!-->

	<!--Numbers------------------</!-->

	<section id="numbers">
		<article class="number">
			<i class="fas fa-cloud-meatball numbero"></i>
			<p>35</p>
			<h3>Cheese V</h3>
		</article>
		<article class="number">
			<i class="fas fa-cheese numbero"></i>
			<p>50</p>
			<h3>Cheese Dishes</h3>
		</article>
		<article class="number">
			<i class="fas fa-pizza-slice numbero"></i>
			<p>20</p>
			<h3>Pizzas</h3>
		</article>
		<article class="number">
			<i class="fas fa-ice-cream numbero"></i>
			<p>50</p>
			<h3>Desserts</h3>
		</article>
		
	</section>




	<!--End of Numbers----------------------</!-->
	<!--Card Section----------------------</!-->
	<section id="food">
		<div>
			<h2 class="title-text">Food Fusion</h2>
		</div>
		<div class="food-container">
			
			<!--Start of the article----------</!-->
			<article class="food-card">
				<img src="img/steak-meat-raw-herbs-65175.jpg" alt="" class="food-img">
				<div class="img-text">
					<h1>Breakfast</h1>
				</div>
				<div class="img-footer">
					<div class="footer-icon">
						<i class="fas fa-dollar-sign ndollar">25</i>
					</div>
					<div class="footer-btn"><button type="button" href="shopping/index.php"  class="food-btn">Order Now</button>
					</div>
				</div>
			</article>

			<!--End of the article-------------</!-->

			<!--Start of the article----------</!-->
			<article class="food-card">
				<img src="img/food1.jpg" alt="" class="food-img">
				<div class="img-text">
					<h1>Lunch</h1>
				</div>
				<div class="img-footer">
					<div class="footer-icon">
						<i class="fas fa-dollar-sign ndollar">35</i>
					</div>
					<div class="footer-btn"><button type="button" href="shopping/index.php" class="food-btn">Order Now</button>
					</div>
				</div>
			</article>

			<!--End of the article-------------</!-->

			<!--Start of the article----------</!-->
			<article class="food-card">
				<img src="img/sliced-meats-on-wooden-chopping-board-1927383.jpg" alt="" class="food-img">
				<div class="img-text">
					<h1>Dinner</h1>
				</div>
				<div class="img-footer">
					<div class="footer-icon">
						<i class="fas fa-dollar-sign ndollar">45</i>
					</div>
					<div class="footer-btn"><button type="button" href="shopping/index.php" class="food-btn">Order Now</button>
					</div>
				</div>
			</article>

			<!--End of the article-------------</!-->


		</div>
	</section>


















	<!--End of Card Section-----------------------</!-->
	<!--Gallery-------------------</!-->
	<section id="gallery">
		<div>
			<h2 class="title-text">Main Dishes</h2>
		</div>
		<div id="gallery-center">
			<article class="gallery-item">
				<a href="img/picha120.jpg">
					<img src="img/picha120.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha116.jpg">
					<img src="img/picha116.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha121.jpg">
					<img src="img/picha121.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha115.jpg">
					<img src="img/picha115.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha14.jpg">
					<img src="img/picha14.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha114.jpg">
					<img src="img/picha114.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha113.jpg">
					<img src="img/picha113.jpg" alt="">
				</a>
			</article>
			<article class="gallery-item">
				<a href="img/picha16.jpg">
					<img src="img/picha16.jpg" alt="">
				</a>
			</article>
		</div>
	</section>

<!--Contact</!-->
<section id="contact">
  <div class="container-fluid no-padding">
    <div class="row">
        <div class="col-md-6 my-3 ">
          <div class="embed-responsive embed-responsive-21by9 height-60">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.112564302424!2d36.81832!3d-1.308352!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6b8a8d512ce8fe2d!2sKAFOCA-Mukuru%20Studyville!5e0!3m2!1sen!2ske!4v1596108527818!5m2!1sen!2ske" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>








        <div class="col-md-6 my-3 align-self-center">
          
          <div class="card text-center">
            <div class="card-header">
              <h1 class="text-uppercase">contact list</h1>


            </div>
            <div class="card-body">
              <form>
               


                <div class="input-group my-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="input-text">
                      

                      <i class="fas fa-user"></i>
                    </span>
                  </div>

                  <input type="text" id="text" class="form-control form-control-lg " placeholder="Enter your name">

                </div>





                <div class="input-group my-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="input-phone">
                      

                      <i class="fas fa-phone"></i>
                    </span>
                  </div>

                  <input type="number" id="phone" class="form-control form-control-lg " placeholder="Enter your phone number">

                </div>

               




                <div class="input-group my-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="input-email">
                      

                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>

                  <input type="email" id="text" class="form-control form-control-lg " placeholder="Enter your name">

                </div>

            <button type="submit" class="btn btn-block btn-lg text-uppercase contact-btn"><i class="far fa-hand-point-right mr-2"></i>click here</button>




              </form>

            </div>


          </div>
        </div>



    </div>




  </div>



</section>



<!--End of Contact</!-->














	<!--End of Gallery------------</!-->

	<!--Footer</!-->
	<div class="container-fluid info p-3" style="background: #ffa500c9;">
    <div class="row">
      <div class="col d-flex justify-content-between align-items-baseline flex-wrap">
        <div class="info-icons p-2">
          <a href="#" class="mr-2 primary-color"><i class="fab fa-facebook facebook fa-2x"></i></a>
          <a href="#" class="mr-2 primary-color"><i class="fab fa-instagram instagram fa-2x"></i></a>
          <a href="#" class="mr-2 primary-color"><i class="fab fa-twitter twitter fa-2x"></i></a>
          <a href="#" class="mr-2 primary-color"><i class="fab fa-yelp yelp fa-2x"></i></a>
        </div>
        <h2 class="primary-color p-2 text-uppercase">&copy;copyright 2020</h2>
      </div>
    </div>
  </div>  

	<!--End of Footer</!-->
	<a href="#home" id="back-to-top" class="p-1"><i class="fas fa-arrow-up primary-color fa-3x"></i></a> 
	

	
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.ripples-min.js"></script>
<script src="magnific-popup/jquery.magnific-popup.js"></script>
<script src="js/script.js"></script>
</body>
</html>
