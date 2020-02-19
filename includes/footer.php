
<?php
include("includes/dbcon.php");
?>

<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<?php 
                        $get_p_cats = "select * from product_categories";

                        $run_p_cats = mysqli_query($con, $get_p_cats);

                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                            $p_cat_id = $row_p_cats['p_cat_id'];

							$p_cat_title = $row_p_cats['p_cat_title'];

							?>

						<li class="p-b-10">
							<a href="showroom.php?p_cat=<?php echo $p_cat_title; ?>" class="stext-107 cl7 hov-cl1 trans-04">
							<?php echo $p_cat_title; ?>
							</a>
						</li>
						<?php  } 	?>
                        
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>
					<ul>
						<li class="p-b-10">
							<a href="cart.php" class="stext-107 cl7 hov-cl1 trans-04">
								Shopping cart
							</a>
						</li>

						<li class="p-b-10">
							<a href="contact.php" class="stext-107 cl7 hov-cl1 trans-04">
								Contact us 
							</a>
						</li>

						<li class="p-b-10">
							<a href="showroom.php" class="stext-107 cl7 hov-cl1 trans-04">
								Showroom
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>
					<?php 
                $customer_id = 2;
                $get_address = "select * from customer_info where customer_id=$customer_id";
                $run_address = mysqli_query($conn, $get_address);
               $row_add= mysqli_fetch_array($run_address);
                    $first_name = $row_add['firstname'];
                    $last_name = $row_add['lastname'];
                    $email = $row_add['email'];
                   $phone = $row_add['phone_number'];
                   $address = $row_add['address'];
                   $state = $row_add['state'];
                   $country = $row_add['country'];   
               ?>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at <?php echo $address; ?>, <?php echo $state; ?>, <?php echo $country; ?> or call us on <?php echo $phone; ?>
					</p>

					<div class="p-t-27">
					<?php 
                $get_social = "select * from social_link";
                $run_social = mysqli_query($con, $get_social);
               $row_social= mysqli_fetch_array($run_social);
                   $fb = $row_social['facebook'];
                   $tweet = $row_social['twitter'];
                   $insta = $row_social['instagram'];
                   $whatsapp = $row_social['whatsapp'];
                   $email = $row_social['email'];


?>
						<a href="https://<?php echo $fb; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://<?php echo $insta; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://<?php echo $tweet; ?>" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-twitter"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
				<img class="img-fluid" src="images/paystackimg.png" width="200" height="50" alt="Paystack Image">
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is modified with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="mailto:josephlagbalu@gmail.com">Joseey</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>