<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bakarwaal</title>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

	<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="./css/footer.css">

<style >
	.message_box {
  margin: 10px 0px;
    border: 1px solid #2b772e;
    text-align: center;
    font-weight: bold;
    color: #2b772e;
  }
  #cart_count{
		font-size: 18px;
	    margin-left: -20px;
	    background:#1B4DBE;
	    padding: 5px;
	    border-radius: 50%;
	    color: white;
	}
	</style>
</head>
<body>
<?php 
	require './util/Database.php';
	class User{
		public static function namevalue($id) {

			$pdo = Database::makeConnection();
			$stmt = $pdo->prepare('SELECT name FROM products WHERE id= :id');
			$stmt->execute(array(
			':id' => $id
			));
			$name = $stmt->fetchColumn();
			return $name;
		}
		public static function companyvalue($id) {

			$pdo = Database::makeConnection();
			$stmt = $pdo->prepare('SELECT company FROM products WHERE id= :id');
			$stmt->execute(array(
			':id' => $id
			));
			$name = $stmt->fetchColumn();
			return $name;
		}
		public static function pricevalue($id) {

			$pdo = Database::makeConnection();
			$stmt = $pdo->prepare('SELECT price FROM products WHERE id= :id');
			$stmt->execute(array(
			':id' => $id
			));
			$name = $stmt->fetchColumn();
			return $name;
		}
	}
					     				              		
	


session_start();
include('./util/db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
$company = $row['company'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image,
	'company'=>$company)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
$cart_count=0;
if(!empty($_SESSION["shopping_cart"])) {

$cart_count = count(array_keys($_SESSION["shopping_cart"]));}
?>
	<!--  Header  -->
  	<header>

      <div class="logo"> Bakarwaal
        <!-- <a href="index.html"><img src="logo.png" alt="" style="max-width:100%;height:auto;"></a> -->
      </div>

	    <nav class="active">  
	        <ul >
	          <li ><a href="#" class="active" >Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="products.php">Products</a></li>
	          <li><a href="#portfolio">Portfolio</a></li>
	          <li><a href="cart.php">Cart <a id="cart_count"> <?php echo $cart_count; ?></a></a></li>
	          <!-- <li class="drop-down"><a href="">Drop Down</a>
	            <ul>
	              <li><a href="#">Drop Down 1</a></li>
	              <li class="drop-down"><a href="#">Drop Down 2</a>
	                <ul>
	                  <li><a href="#">Deep Drop Down 1</a></li>
	                  <li><a href="#">Deep Drop Down 2</a></li>
	                  <li><a href="#">Deep Drop Down 3</a></li>
	                  <li><a href="#">Deep Drop Down 4</a></li>
	                  <li><a href="#">Deep Drop Down 5</a></li>
	                </ul>
	              </li>
	              <li><a href="#">Drop Down 3</a></li>
	              <li><a href="#">Drop Down 4</a></li>
	              <li><a href="#">Drop Down 5</a></li>
	            </ul>
	          </li> -->
	          <li><a href="contact.php">Contact Us</a></li>
	        </ul>
      	</nav>
	    <div class="menu-toggle">
	    	<i class="fa fa-bars" aria-hidden="true" style="color: #004289; "></i>
	    </div>
    
  	</header>

  	<section class="cd-intro">
		<div class="cd-intro-content mask">
			<h1 data-content="BAKARWAAL"><span>BAKARWAAL</span></h1>
			<h3 data-content="Woolen Clothing"><span>Woolen Clothing</span></h3>
			<div class="action-wrapper">
				<p>
					<a href="#0" class="cd-btn main-action">Shop Now</a>
					<a href="#0" class="cd-btn">Learn More</a>
				</p>
			</div>
		</div>
	</section>
	
	<div class="div-card">
		
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('1')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('1')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('1')?></span>
					            <span class="add-to-cart">
					            	<form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr01" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
				
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('2')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('2')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('2')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="pr02" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

  				
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('3')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('3')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('3')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr03" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

  				
<!-- 
	</div>

	<div class="div-card">
 -->
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('4')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('4')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('4')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr04" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
				
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('5')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('5')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('5')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr05" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

  				
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('6')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('6')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price" >$<?php echo $product = User::pricevalue('6')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr06" />
					              		<span class="txt"><input class="txt txt2" type="submit" name="" value="Add in cart"></span>
					               </form>
					            </span>
					          </a>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>

	</div>
	<div style="clear:both;  text-align: center;"></div>
		<div class="message_box" style="text-align: center;">
		<?php echo $status; ?>
	</div>

	<div class="div-btn">
		<a href="#0" class="cd-btn2 main-action">Browse All Products 
			<i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size: 20px"></i>
		</a>
	</div>



	<div class="banner"><img src="sm2.jpg" style="width: 80%; height: 40%;"></div>



	<div class="container2">
	  <div id="marketing" class="section2">
	    <div class="content">
	      <i class="fa fa-truck" aria-hidden="true" style=""></i>
	      <h1>FREE SHIPPING</h1>
	      <p>We offer free shipping all over Pakistan</p>
	    </div>
	    <div class="overlay"></div>
	  </div>
	  <div id="technology" class="section2">
	    <div class="content">
	      <i class="fa fa-money" aria-hidden="true" ></i>
	      <h1>30 DAYS MONEY BACK</h1>
	      <p>We have 30 days money back guarantee policy</p>
	    </div>
	    <div class="overlay"></div>
	  </div>
	  <div id="advertising" class="section2">
	    <div class="content">
	      <i class="fa fa-phone" aria-hidden="true"  ></i>
	      <h1>SUPPORT 24/7</h1>
	      <p>24/7 online suport is available for customer queries</p>
	    </div>
	    <div class="overlay"></div>
	  </div>
	</div>




	<div class="testimonials">
      <div class="inner">
        <h1>Testimonials</h1>
        <div class="border"></div>

        <div class="row">
          <div class="col">
            <div class="testimonial">
              <img src="p1.png" alt="">
              <div class="name">Nouman Khan</div>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <img src="p1.png" alt="">
              <div class="name">Fahad Zaman</div>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <img src="p1.png" alt="">
              <div class="name">Obaid Khan</div>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="widget widget_blog_subscription">
	  <form action="./controllers/IndexController.php" method="post" accept-charset="utf-8" id="subscribe-blog">
	    <p>Subscribe to our newsletter.</p>
	    <p>
	      <input type="text" name="email" style="width: 95%; padding: 1px 2px" placeholder="Enter your email address" value="" id="subscribe-field">
	    </p>
	    <p>
	      <input type="submit" value="Subscribe">
	    </p>
	  </form>
	</section>



<!-- Footer  -->
<footer>

	<div class="footer-top">

		<div class="container">

			<div class="row">
				<div class="footer-info ">
					<h3>BakarWaal</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis consequuntur voluptate, assumenda officiis
						 possimus vitae ad hic veritatis impedit illum? Error, ullam quo minus soluta dignissimos excepturi maxime
						  perspiciatis molestias?</p>
				</div>
				<div class="footer-links ">
					<h4>Useful Links</h4>
						<ul>
						  <li><a href="#">Home</a></li>
						  <li><a href="#">About us</a></li>
						  <li><a href="#">Services</a></li>
						  <li><a href="#">Terms of service</a></li>
						  <li><a href="#">Privacy policy</a></li>
						</ul>
				</div>


				<div class="footer-contact ">
					
					<h4>Contact Us</h4>
						<p>
						  A108 Adam Street <br>
						  New York, NY 535022<br>
						  United States <br>
						  <strong>Phone:</strong> +1 5589 55488 55<br>
						  <strong>Email:</strong> info@example.com<br>
						</p>
			
						<div class="social-links">
						  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
						  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
						  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
						  <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
						  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>

				</div>


				<div class="footer-newsletter ">
					<h4>Our Newsletter</h4>
						<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
						<form action="./controllers/IndexController.php" method="post">
						  <input type="email" name="email">
						  <input type="submit" value="Subscribe">
						</form>
					 
				</div>


			</div>


		</div>

	</div>

	<div class=" footer-bottom container">
		<div class="copyright">
			
			© Copyright <strong>Bakarwaal</strong> . All Rights Reserved

		</div>
		
		<div class="credits">
			Design By Azhar&Afaq
			<p style="margin:0; margin-top: 10px;">
				<a href="#">
				    <img style="border:0;width:88px;height:31px;"
				        src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
				        alt="Valid CSS!" />
				    </a>
				</p>
		</div>

	</div>


</footer>








	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script>
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			})
		})
	</script>
  
</body>
</html>