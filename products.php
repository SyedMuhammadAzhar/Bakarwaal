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
		public static function image($id) {

			$pdo = Database::makeConnection();
			$stmt = $pdo->prepare('SELECT image FROM products WHERE id= :id');
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






if (isset($_POST['product'])){
	$code2 = $_POST['product'];
	$result2 = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code2'");
	$row2 = mysqli_fetch_assoc($result2);
	$_SESSION["code2"] = $row2['code'];

	header("location:./product.php");


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
	          <li ><a href="index.php">Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="products.php" class="active">Products</a></li>
	         
	          <li><a href="cart.php">Cart <a id="cart_count"> <?php echo $cart_count; ?></a></a></li>
	          <li><a href="contact.php">Contact Us</a></li>
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
	
	<div class="div-card">
		
  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">


					        <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="<?php echo $product = User::image('1')?>" alt=""/>
					            <input  type='hidden' name='product' value="pr01" />
					        </form>

					          <div class="img-info">
					            <div class="info-inner">

					              	<span class="p-name" ><?php echo $product = User::namevalue('1')?>
					              	</span>


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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr02" />
					          </form>

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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr03" />
					          </form>

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

  				

	<!-- </div>

	<div class="div-card"> -->

  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">

					            <form method='post' action='./products.php'>
						          	<input type="image" class="img" src="t-shirt.png" alt=""/>
						            <input  type='hidden' name='product' value="pr04" />
					          	</form>

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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr05" />
					          </form>

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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr06" />
					          </form>

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
<!-- 
	</div>


	<div class="div-card"> -->

  					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr07" />
					          </form>

					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('7')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('7')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('7')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr07" />
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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr08" />
					          </form>

					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('8')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('8')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('8')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr08" />
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

					          <form method='post' action='./products.php'>
					          	<input type="image" class="img" src="t-shirt.png" alt=""/>
					            <input  type='hidden' name='product' value="pr09" />
					          </form>

					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('9')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('9')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price" >$<?php echo $product = User::pricevalue('9')?></span>
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



					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('7')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('7')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('7')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr07" />
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
					              <span class="p-name"><?php echo $product = User::namevalue('8')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('8')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('8')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr08" />
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



					<div class="container page-wrapper" >
					  <div class="page-inner">
					    <div class="row">
					      <div class="el-wrapper">
					        <div class="box-up">
					          <img class="img" src="t-shirt.png" alt="">
					          <div class="img-info">
					            <div class="info-inner">
					              <span class="p-name"><?php echo $product = User::namevalue('7')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('7')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('7')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr07" />
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
					              <span class="p-name"><?php echo $product = User::namevalue('8')?></span>
					              <span class="p-company"><?php echo $product = User::companyvalue('8')?></span>
					            </div>
					            <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div>
					          </div>
					        </div>

					        <div class="box-down">
					          <div class="h-bg">
					            <div class="h-bg-inner"></div>
					          </div>

					          <a class="cart" href="#">
					            <span class="price">$<?php echo $product = User::pricevalue('8')?></span>
					            <span class="add-to-cart">
					              <form method='post' action=''>
					            		<input type='hidden' name='code' value="Pr08" />
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

	

	



<!-- Footer  -->
<footer>

	<div class="footer-top">

		<div class="container">

			<div class="row">
				<div class="footer-info ">
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
						<form action="./controllers/ProductController.php" method="post">
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
	<script>
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			});
			$(".pname").click(function(){

    			
				document.getElementById("myForm").submit(); 
			});
		})
	</script>
  
</body>
</html>