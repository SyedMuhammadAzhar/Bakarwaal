<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

	<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="./css/footer.css">

<style type="text/css">


.product_wrapper {
  float:right;
  padding: 10px;
  text-align: center;
  }
.product_wrapper:hover {
  box-shadow: 0 0 0 2px #e5e5e5;
  cursor:pointer;
  }
.product_wrapper .name {
  font-weight:bold;
  }
.product_wrapper .buy {
  text-transform: uppercase;
    background: #F68B1E;
    border: 1px solid #F68B1E;
    cursor: pointer;
    color: #fff;
    padding: 8px 40px;
    margin-top: 10px;
}
.product_wrapper .buy:hover {
  background: #f17e0a;
    border-color: #f17e0a;
}
.message_box .box{
  margin: 10px 0px;
    border: 1px solid #2b772e;
    text-align: center;
    font-weight: bold;
    color: #2b772e;
  }
.table td {
  border-bottom: #F0F0F0 1px solid;
  padding: 10px;
  }
.cart_div {
  float:right;
  font-weight:bold;
  position:relative;
  }
.cart_div a {
  color:#000;
  } 
.cart_div span {
  font-size: 12px;
    line-height: 14px;
    background: #F68B1E;
    padding: 2px;
    border: 2px solid #fff;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    left: 13px;
    color: #fff;
    width: 14px;
    height: 13px;
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

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
	<!--  Header  -->
  	<header>

      <div class="logo"> Bakarwaal
        <!-- <a href="index.html"><img src="logo.png" alt="" style="max-width:100%;height:auto;"></a> -->
      </div>

	    <nav class="active">  
	        <ul >
	          <li ><a href="index.php">Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="#services">Products</a></li>
	          <li><a href="#portfolio">Portfolio</a></li>
	          <li><a href="#" class="active">Cart <?php echo $cart_count; ?></a></li>
	          
	          <li><a href="contact.php" >Contact Us</a></li>
	        </ul>
      	</nav>
	    <div class="menu-toggle">
	    	<i class="fa fa-bars" aria-hidden="true" style="color: #004289; "></i>
	    </div>
    
  	</header>

  	<section class="cd-intro" style="height: 60vh;">
		<div class="cd-intro-content mask" style="background-image: url('./css/intro-bg-2.png'); background-size: cover;">
			<h1 data-content="BAKARWAAL" style="margin-top: 60px;"><span>BAKARWAAL</span></h1>
			<h3 data-content="Woolen Clothing"><span>Woolen Clothing</span></h3>
		</div>
	</section>



<div style="width:700px; margin: 0 auto;">

<h2>Demo Shopping Cart</h2>   


<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart" style="position: relative;">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
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
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
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
			
			© Copyright <strong>BakarWaal</strong> . All Rights Reserved

		</div>
		
		<div class="credits">
			Design By Azhar&Afaq
		</div>

	</div>


</footer>








	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript">
				/* Set values + misc */
// var promoCode;
// var promoPrice;
// var fadeTime = 300;

/* Assign actions */
// $('.quantity input').change(function() {
//   updateQuantity(this);
// });

// $('.remove button').click(function() {
//   removeItem(this);
// });

		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			});
			
			// updateSumItems();

			// $('.promo-code-cta').click(function() {

			// 	  promoCode = $('#promo-code').val();

			// 	  if (promoCode == '10off' || promoCode == '10OFF') {
			// 	    //If promoPrice has no value, set it as 10 for the 10OFF promocode
			// 	    if (!promoPrice) {
			// 	      promoPrice = 10;
			// 	    } else if (promoCode) {
			// 	      promoPrice = promoPrice * 1;
			// 	    }
			// 	  } else if (promoCode != '') {
			// 	    alert("Invalid Promo Code");
			// 	    promoPrice = 0;
			// 	  }
			// 	  //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
			// 	  if (promoPrice) {
			// 	    $('.summary-promo').removeClass('hide');
			// 	    $('.promo-value').text(promoPrice.toFixed(2));
			// 	    recalculateCart(true);
			// 	  }
			// 	});
		})

		// function addClass() {
  // 			document.body.classList.add("sent");
		// }

		// sendLetter.addEventListener("click", addClass);




		// /* Recalculate cart */
		// function recalculateCart(onlyTotal) {
		//   var subtotal = 0;

		//   /* Sum up row totals */
		//   $('.basket-product').each(function() {
		//     subtotal += parseFloat($(this).children('.subtotal').text());
		//   });

		//   /* Calculate totals */
		//   var total = subtotal;

		//   //If there is a valid promoCode, and subtotal < 10 subtract from total
		//   var promoPrice = parseFloat($('.promo-value').text());
		//   if (promoPrice) {
		//     if (subtotal >= 10) {
		//       total -= promoPrice;
		//     } else {
		//       alert('Order must be more than £10 for Promo code to apply.');
		//       $('.summary-promo').addClass('hide');
		//     }
		//   }

		//   /*If switch for update only total, update only total display*/
		//   if (onlyTotal) {
		//     /* Update total display */
		//     $('.total-value').fadeOut(fadeTime, function() {
		//       $('#basket-total').html(total.toFixed(2));
		//       $('.total-value').fadeIn(fadeTime);
		//     });
		//   } else {
		//     /* Update summary display. */
		//     $('.final-value').fadeOut(fadeTime, function() {
		//       $('#basket-subtotal').html(subtotal.toFixed(2));
		//       $('#basket-total').html(total.toFixed(2));
		//       if (total == 0) {
		//         $('.checkout-cta').fadeOut(fadeTime);
		//       } else {
		//         $('.checkout-cta').fadeIn(fadeTime);
		//       }
		//       $('.final-value').fadeIn(fadeTime);
		//     });
		//   }
		// }

		// /* Update quantity */
		// function updateQuantity(quantityInput) {
		//   /* Calculate line price */
		//   var productRow = $(quantityInput).parent().parent();
		//   var price = parseFloat(productRow.children('.price').text());
		//   var quantity = $(quantityInput).val();
		//   var linePrice = price * quantity;

		//   /* Update line price display and recalc cart totals */
		//   productRow.children('.subtotal').each(function() {
		//     $(this).fadeOut(fadeTime, function() {
		//       $(this).text(linePrice.toFixed(2));
		//       recalculateCart();
		//       $(this).fadeIn(fadeTime);
		//     });
		//   });

		//   productRow.find('.item-quantity').text(quantity);
		//   updateSumItems();
		// }

		// function updateSumItems() {
		//   var sumItems = 0;
		//   $('.quantity input').each(function() {
		//     sumItems += parseInt($(this).val());
		//   });
		//   $('.total-items').text(sumItems);
		// }

		// /* Remove item from cart */
		// function removeItem(removeButton) {
		//   /* Remove row from DOM and recalc cart total */
		//   var productRow = $(removeButton).parent().parent();
		//   productRow.slideUp(fadeTime, function() {
		//     productRow.remove();
		//     recalculateCart();
		//     updateSumItems();
		//   });
		// }
	</script>
  
</body>
</html>