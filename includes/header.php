<?php

session_start();
if(isset($_SESSION['customer_email'])){
  
$customer_email = $_SESSION['customer_email'];

}

include("includes/dbcon.php");
include("functions/functions.php");

?>

<?php


if(isset($_GET['pro_id'])){

    $product_id = $_GET['pro_id'];

    $get_product = "select * from products where product_id='$product_id'";

    $run_product = mysqli_query($con, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_title = $row_product['product_title'];

    $pro_price = $row_product['product_price'];

    $pro_desc = $row_product['product_desc'];

    $pro_img1 = $row_product['product_img1'];

    $pro_img2 = $row_product['product_img2'];

    $pro_img3 = $row_product['product_img3'];

    $get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";

    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];

    $p_size = $row_p_cat['size_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iris store</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
				<?php  
						$get_logo = "select * from logo";
						$run_logo = mysqli_query($con, $get_logo);

						$row_logo = mysqli_fetch_array($run_logo);

									
									$b_name = $row_logo['b_name'];
						?>
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
					<span class="logo-head"><?php echo $b_name; ?></span>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="showroom.php">Showroom</a>
							</li>
							<?php 
                
									if(!isset($_SESSION['customer_email'])){

										echo  "<li>
												  <a href='customer/my_account.php'>My Account</a>
											   </li>";
									}else{
										echo "<li>
												<a href='customer/my_account.php?my_orders'>My Account</a>
											  </li>";                   
									}
															
							?>
							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php items(); ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
			<a href="index.php" class="logo">
					<span class="logo-head"><?php echo $b_name; ?></span>
					</a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php items(); ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
		
			<ul class="main-menu-m">
				<li class="active-menu">
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="showroom.php">Showroom</a>
							</li>
							<?php 
                
									if(!isset($_SESSION['customer_email'])){

										echo  "<li>
												  <a href='customer/my_account.php'>My Account</a>
											   </li>";
									}else{
										echo "<li>
												<a href='customer/my_account.php?my_orders'>My Account</a>
											  </li>";                   
									}
															
							?>
							<li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<?php

                $ip_add = getRealIpUser();

                $select_cart ="select * from cart where ip_add='$ip_add'";

                $run_cart = mysqli_query($con, $select_cart);

                $count =mysqli_num_rows($run_cart);
              
              ?>
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					 <?php

                      $total =0;

                      while($row_cart = mysqli_fetch_array($run_cart)){

                        $pro_id = $row_cart['p_id'];

                        $pro_size = $row_cart['size'];

                        $pro_qty = $row_cart['quantity'];

                        $get_products = "select * from products where product_id='$pro_id'";

                        $run_products = mysqli_query($con, $get_products);

                        while($row_products=mysqli_fetch_array($run_products)){

                            $product_title = $row_products['product_title'];

                            $product_img1 = $row_products['product_img1'];

                            $product_price = $row_products['product_price'];

                            $sub_total = $row_products['product_price']*$pro_qty;

                            $total += $sub_total;
                        
                      ?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="admin_area/product_images/<?php echo $product_img1; ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="details.php?pro_id=<?php echo $pro_id; ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							<?php echo $product_title; ?>
							</a>

							<span class="header-cart-item-info">
							<?php echo $pro_qty; ?>  x  &#8358;<?php echo $product_price; ?> 
							</span>
						</div>
					</li>
					<?php } }?>
					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: &#8358; <?php echo $total; ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a  href="checkout.php"  class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
