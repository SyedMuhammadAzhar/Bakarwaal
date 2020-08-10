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



<style >
.cart-main{
	width:900px; 
	margin: 0 auto;
	padding-top: 40px;
	padding-bottom: 40px;
}
.message_box .box{
  	margin: 10px 0px;
    border: 1px solid #2b772e;
    text-align: center;
    font-weight: bold;
    color: #2b772e;
  }
.table th {
  border-bottom: #F0F0F0 1px solid;
  padding: 18px;
  vertical-align: middle;
  }
.table td {
  border-bottom: #F0F0F0 1px solid;
  padding: 18px;
  vertical-align: middle;
  }
.cart_div {
  float:right;
  font-weight:bold;
  position:relative;
  margin-right: 30px;
  margin-bottom: 20PX;
}
.cart_div a {
  color:#000;
  } 
.cart_div span {
  	font-size: 20px;
    line-height: 14px;
    background: #F68B1E;
    padding: 1px;
    border: 1px solid #fff;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    left: 13px;
    color: #fff;
    width: 20px;
    height: 20px;
    text-align: center;
  }
.cart .remove {
    background: none;
    border: none;
    color: #0067ab;
    cursor: pointer;
    padding: 0px;
    
  }
.cart .remove:hover {
  text-decoration:underline;
  }

table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}


table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}


@media only screen and (max-width: 920px) {
.cart-main{
	width:600px; 
}
.table td {
  padding: 8px;
  }
.table th {
  padding: 8px;
}


}


@media only screen and (max-width: 620px) {
.cart-main{
	width:300px; 
}
.cart_div {
  display: none;
 }

.carthead{
	text-align: center;
}

  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }

}

</style>

</head>
<body>

	<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
$cart_count=0;
if(!empty($_SESSION["shopping_cart"])) {
	$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}

	// <!--  Header  -->
  	echo '<header>

      <div class="logo"> Bakarwaal
        <!-- <a href="index.html"><img src="logo.png" alt="" style="max-width:100%;height:auto;"></a> -->
      </div>

	    <nav class="active">  
	        <ul >
	          <li ><a href="index.php">Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="products.php">Products</a></li>
	          <li><a href="#portfolio">Portfolio</a></li>
	          <li><a href="#" class="active">Cart <a id="cart_count"> '. $cart_count .'</a></a></li>
	          
	          <li><a href="contact.php" >Contact Us</a></li>
	        </ul>
      	</nav>
	    <div class="menu-toggle">
	    	<i class="fa fa-bars" aria-hidden="true" style="color: #004289; "></i>
	    </div>
    
  	</header>

  	<section class="cd-intro" style="height: 60vh;">';
		echo '<div class="cd-intro-content mask" style="background-image: url('.'./css/intro-bg-2.png'.'); background-size: cover;">
			<h1 data-content="BAKARWAAL" style="margin-top: 60px;"><span>BAKARWAAL</span></h1>
			<h3 data-content="Woolen Clothing"><span>Woolen Clothing</span></h3>
		</div>
	</section>';?>



<div class="cart-main">

<h2 class="carthead">My Shopping Cart</h2>   


<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" alt="Cart" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>


<div class="cart" style="position: relative;">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
	<thead>
		<tr class="headtr">
			<th>IMAGE</th>
			<th>NAME</th>
			<th>QUANTITY</th>
			<th>ITEM PRICE</th>
			<th>ITEM TOTAL</th>
		</tr>	
	</thead>
<tbody>
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>

<tr>
<td data-label="IMAGE"><img alt="Product"  src='<?php echo $product["image"]; ?>' width="50" height="50"  ></td>
<td data-label="NAME"><?php echo $product["name"]; ?><br/>
<form method='post' action=''>
<input type='hidden' name='code' value='<?php echo $product["code"]; ?>' />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td data-label="QUANTITY">
<form method='post' action=''>
<input type='hidden' name='code' value='<?php echo $product["code"]; ?>' />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td data-label="PRICE"><?php echo "$".$product["price"]; ?></td>
<td data-label="ITEM TOTAL"><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right" style="text-align: right;">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	// echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>

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
						<form action="./controllers/ContactController.php" method="post">
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
			});
			
		})

	</script>
  
</body>
</html>