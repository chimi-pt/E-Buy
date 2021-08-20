<?php
session_start();
//$identity = $_SESSION['username'];
require_once("connect.php");

if(filter_input(INPUT_GET, 'action') == "delete")
		{
		//loop through cart untill it matches with get ID variable
		foreach($_SESSION['shopping_cart'] as $key => $products)
		{
			if($products['id'] == filter_input(INPUT_GET, 'id'))
			{
				//remove product from cart when it matches with the ID
				unset($_SESSION['shopping_cart'][$key]);
			}

		}
		//reset session array keys so that they match with $product_ids numeric array
		$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CheckOut</title>
	<link rel="stylesheet" type="text/css" href="CheckoutStyle.css">
</head>
<body>
	<div class="TopPart">
		<?php
		if(isset($_SESSION['username']))
		{
			$id = $_SESSION['username'];
			$sqlimage = "SELECT * FROM profileimage WHERE Username='$id';";
			$resultImage = mysqli_query($link, $sqlimage);
			while ($rowImage = mysqli_fetch_assoc($resultImage))
			{

				if($rowImage['Status'] == 0)
				{
					//echo "<h1 id='uname'>USER PROFILE</h1>";
					//echo "<h3>Change profile photo</h3>";
					//echo "<h4 id = 'warn'>ALERT: Only .jpg file types are allowed</h4>";
					
					echo "<div class='container'>";
					echo "<a id='useruser' title='Back To Menu' href='BreakFastMenu.php'>".$_SESSION['username']."'s Plate</a>";
					echo "<a href='FoodSite.php'> <img id='profile' title='To HomePage' src='assets/profile".$id.".jpg'> </a>";
					//include_once("upload_image.php");
					echo "</div>";
				}
				else
				{
					//echo "<h5 id='uname'>".$_SESSION['username']."</h5>";
					//include_once("upload_image.php");
					echo "<div class='container'>";
					echo "<p id='useruser'>".$_SESSION['username']."'s Plate</p>";
					echo "<img id='profileDefault' title='ME' src='default.png'>";
					echo "</div>";
					//echo "<a href='LogoutProcess.php'> Logout </a>";
				}
			}
		}
	
		?>
	<form action="BreakFastMenu.php" method="GET">
	<div class="table-responsive">
					<table class="table">
						<tr><th colspan="5"><h1 id="myplate">My Plate</h1></th></tr>

						<tr>
							<th width="20%" id="FoodItem">FoodName</th>
							<th width="10%" id="Qnty">Quantity</th>
							<th width="20%" id="Price">Price</th>
							<th width="15%" id="Sum">Total</th>
							<th width="5%" id="act">Action</th>
						</tr>

						<?php 
							if(!empty($_SESSION['shopping_cart'])):

								$total = 0;

								foreach ($_SESSION['shopping_cart'] as $key => $product):	

						?>
						<tr>
							<td id="FoodName"><?php echo $product['name']; ?></td>
							<td><?php echo $product['quantity']; ?></td>
							<td><?php echo $product['price']; ?></td>
							<td><?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
							<td>
								<a href="Checkout.php?action=delete&id=<?php echo $product['id']; ?>">
								<form action="Checkout.php" method="POST">
									<div class="btn-danger" onclick="message()">Remove</div>
								</form>
								</a>
							</td>
						</tr>
						<?php
							$total = $total + ($product['quantity'] * $product['price']);
						endforeach;
						?>
						<tr>
							<td colspan="3" align="right" id="TotalWord">Total</td>
							<td align="right">Ksh. <?php echo number_format($total, 2); ?> </td>
							<td></td>
						</tr>
						<tr>
							<!-- Show checkout button if cart is not empty -->

							<td colspan="5">
								<?php
								if(isset($_SESSION['shopping_cart'])):
								if(count($_SESSION['shopping_cart']) > 0):
								?>
								<form action="Checkout.php" method="GET">
								<a href="Checkout.php?now=checkingout" class="button" name="Check" onclick="loadmessage()">Checkout</a>
							</form>

								<?php
									$rr = $_GET['now'];
									if($rr == 'checkingout')
									{
										$id = $_SESSION['username'];
										$price = $product['price'];
										$namee = $product['name'];
										$qnty = $product['quantity'];
											
										$sql = "INSERT INTO orders(Username, FoodName, Price, Quantity, TotalPrice)VALUES('$id','$namee', '$price','$qnty','$total');";
										mysqli_query($link, $sql);
									}

								?>
							<?php endif; endif; ?>
							</td>
						</tr>
						<?php
						endif;
						?>
					</table> 
			</div>
		</form>
		<script>
			function loadmessage()
			{
				alert("Successful purchase. Eat here again or we sue! XD");
			}

			function message()
			{
				window.confirm("Do you want to remove this item from the cart?");
			}
		</script>
</body>
</html>