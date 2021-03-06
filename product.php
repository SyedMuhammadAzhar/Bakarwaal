<?php 
include('./util/db.php');
session_start();


if (isset($_POST['code']) && $_POST['code']!=""){
$code2 = $_POST['code'];
$result2 = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code2'");
$row2 = mysqli_fetch_assoc($result2);


$name2 = $row2['name'];
$code3=$row2['code'];
$price2=$row2['price'];
$image4 = $row2['image'];
$company2=$row2['company'];

$cartArray = array(
	$code2=>array(
	'name'=>$name2,
	'code'=>$code3,
	'price'=>$price2,
	'quantity'=>1,
	'image'=>$image4,
	'company'=>$company2)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {

	} 
	else {
		$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	
	}

}
}



$code=$_SESSION["code2"];

$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);


$name = $row['name'];
// $code=$row['code'];
$price=$row['price'];
$image=$row['largeimage'];
$image2=$row['largeimage2'];
$image3=$row['largeimage3'];
$company=$row['company'];

$cartArray2 = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image,
	'company'=>$company)
);
if(empty($_SESSION["product"])) {
	$_SESSION["product"] = $cartArray2;
	
}


$cart_count=0;
if(!empty($_SESSION["shopping_cart"])) {
	$cart_count = count(array_keys($_SESSION["shopping_cart"]));}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bakarwaal</title>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

	<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="./css/footer.css">

<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  margin-top: 100px;
  padding: 15px;
  display: flex;
}

.left-column {
  width: 65%;
  position: relative;
}
 
.right-column {
  width: 35%;
  margin-top: 60px;
}
.left-column img {
  width: 60%;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}
 
.left-column img.active {
  opacity: 1;
}
/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
/* Product Color */
.product-color {
  margin-bottom: 30px;
}
 
.color-choose div {
  display: inline-block;
}
 
.color-choose input[type=radio] {
  display: none;
}
 
.color-choose input[type=radio] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
}
 
.color-choose input[type=radio] + label span {
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
}
 
.color-choose input[type=radio]#red + label span {
  background-color: #C91524;
}
.color-choose input[type=radio]#blue + label span {
  background-color: #314780;
}
.color-choose input[type=radio]#black + label span {
  background-color: gray;
}
 
.color-choose input[type=radio]:checked + label span {
  background-image: url(images/check-icn.svg);
  background-repeat: no-repeat;
  background-position: center;
}
/* Cable Configuration */
.cable-choose {
  margin-bottom: 20px;
}
 
.cable-choose button {
  border: 2px solid #E1E8EE;
  border-radius: 6px;
  padding: 13px 20px;
  font-size: 14px;
  color: #5E6977;
  background-color: #fff;
  cursor: pointer;
  transition: all .5s;
}
 
.cable-choose button:hover,
.cable-choose button:active,
.cable-choose button:focus {
  border: 2px solid #86939E;
  outline: none;
}
 
.cable-config {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;

}
 
.cable-config a {
  color: #358ED7;
  text-decoration: none;
  font-size: 12px;
  position: relative;
  margin: 10px 0;
  display: inline-block;

}
.cable-config a:before {
  content: "?";
  height: 15px;
  width: 15px;
  border-radius: 50%;
  border: 2px solid rgba(53, 142, 215, 0.5);
  display: inline-block;
  text-align: center;
  line-height: 16px;
  opacity: 0.5;
  margin-right: 5px;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}


/* Responsive */
@media (max-width: 940px) {
  .container {
    flex-direction: column;
    margin-top: 100px;
  }
 
  .left-column,
  .right-column {
    width: 100%;
  }
 
  .left-column img {
    width: 300px;
    right: 0;
    top: -65px;
    left: initial;
    z-index: -1;
  }
  .product-description{
		max-width: 500px;
	}
}

@media (max-width: 768px) {
	.product-description{
		max-width: 380px;
	}
}
@media (max-width: 692px) {
 
  .product-description{
		max-width: 320px;
		margin-top: 80px;
	}
}
@media (max-width: 535px) {
  .left-column img {
    width: 220px;
    top: -65px;
  }
  .product-description{
		/*max-width: 380px;*/
		margin-top: 100px;
	}
}




	</style>
</head>
<body>



	<!--  Header  -->
  	<header>

      <div class="logo"> Bakarwaal
        <!-- <a href="index.html"><img src="logo.png" alt="" style="max-width:100%;height:auto;"></a> -->
      </div>

	    <nav class="active">  
	        <ul>
	          <li ><a href="index.php">Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="products.php">Products</a></li>
	          
	          <li><a href="cart.php">Cart <a id="cart_count"> <?php echo $cart_count; ?></a></a></li>
	          
	          <li><a href="contact.php">Contact Us</a></li>
	        </ul>
      	</nav>
	    <div class="menu-toggle">
	    	<i class="fa fa-bars" aria-hidden="true" style="color: #004289; "></i>
	    </div>
    
  	</header>

  	<main class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img data-image="black" src="<?php echo $image3;?>" alt="">
    <img data-image="blue" src="<?php echo $image2;?>" alt="">
    <img data-image="red" class="active" src="<?php echo $image;?>" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span><?php echo $company;?></span><br><br>
      <h1><?php echo $name;?></h1>
      <p>An active essential with casual flair, this track jacket from ID Ideology updates a classic silhouette with contemporary colorblocking. </p>
    </div>
 
    <!-- Product Configuration -->
    <div class="product-configuration">
 
      <!-- Product Color -->
      <div class="product-color">
        <span>Color</span>
 
        <div class="color-choose">
          <div>
            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
            <label for="red"><span></span></label>
          </div>
          <div>
            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
            <label for="blue"><span></span></label>
          </div>
          <div>
            <input data-image="black" type="radio" id="black" name="color" value="black">
            <label for="black"><span></span></label>
          </div>
        </div>
 
      </div>
 
      <!-- Cable Configuration -->
      <div class="cable-config" >
        <span >Size</span>
 		<br><br>
        <div class="cable-choose" style="">
          <button>Small</button>
          <button>Medium</button>
          <button>Large</button>
        </div>
 
        <a href="https://www.youtube.com/watch?v=0KKXvh2v1aE">How to unbox your product</a>
      </div>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span>$<?php echo $price;?></span><form method='post' action='./product.php'>
      <!-- <a href="#" class="cart-btn"> --> 
      	
			<input type='hidden' name='code' value="<?php echo $code;?>" />
			<input class="cart-btn" type="submit" name="" value="Add in cart">
		
	  <!-- </a> --></form>
    </div>
  </div>
</main>










<!-- Footer  -->
<footer>

	<div class="footer-top">

		<div class="" style=" margin: 0px 80px;">

			<div class="row">
				<div class="footer-info " >
					<h3>BakarWaal</h3>
					<p>Bakarwaal is a Peshawar based startup focused on representing handmade woolen products as a brand and providing an online platform to the artisans who are knitting these products. This project was carried out by the co-founders of the startup.</p>
				</div>
				<div class="footer-links ">
					<h4>Useful Links</h4>
						<ul>
              <li><a href="./index.php">Home</a></li>
              <li><a href="./aboutus.php">About us</a></li>
              <li><a href="./products.php">Products</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
				</div>


				<div class="footer-contact ">
					
					<h4>Contact Us</h4>
            <p>1-A, Sector E-5, Phase VII<br>
              Hayatabad, Peshawar 25000<br>
              Pakistan<br>
              <strong>Phone:</strong> +92 314 6930864<br>
              <strong>Email:</strong> bakarwaal1@gmail.com<br>
            </p>
      
            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a target="_blank" href="https://www.facebook.com/bakarwaal/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a target="_blank" href="https://www.instagram.com/bak_arwaal/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a target="_blank" href="https://www.linkedin.com/company/bakarwaal/" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

				</div>


				<div class="footer-newsletter ">
					<h4>Our Newsletter</h4>
						<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
						<form action="./controllers/ContactController.php" method="post">
						  <input type="email" name="email">
						  <input type="submit" value="Subscribe">
						</form>
					 
				</div>


			</div>


		</div>

	</div>

	<div class=" footer-bottom"  style=" margin: 0px 80px;">
		<div class="copyright">
			
			© Copyright <strong>Bakarwaal</strong> . All Rights Reserved

		</div>
		
		<div class="credits">
			Design By Azhar & Afaq
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
	<script >
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			});
			$('.color-choose input').on('click', function() {
      var headphonesColor = $(this).attr('data-image');
 
      $('.active').removeClass('active');
      $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
      $(this).addClass('active');
  });
		})

		function addClass() {
  			document.body.classList.add("sent");
		}

	</script>
  
</body>
</html>