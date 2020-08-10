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
.team-section{
  text-align: center;
  overflow: hidden;
  background:#0774BE; 
  margin-top: 20px;
}
.inner-width{
  max-width: 1200px;
  margin: auto;
  padding: 40px;
  color: #333;
  overflow: hidden;
}
.team-section h1{
  font-size: 20px;
  text-transform: uppercase;
  display: inline-block;
  border-bottom: 4px solid;
  padding-bottom: 10px;
}
.pe{
  float: left;
  width: calc(100% / 3);
  overflow: hidden;
  padding: 40px 0;
  transition: 0.4s;
}
.pe:hover{
  background: #008FFF;
}
.pe img{
  width: 120px;
  height: 120px;
}
.p-name{
  margin: 16px 0;
  text-transform: uppercase;
}
.p-des{
  font-style: italic;
  color: white;
}
.p-sm{
  margin-top: 12px;
}
.p-sm a{
  margin: 0 4px;
  display: inline-block;
  width: 30px;
  height: 30px;
  transition: 0.4s;
}
.p-sm a:hover{
  transform: scale(1.3);
}
.p-sm a i{
  color: #333;
  line-height: 30px;
}
@media screen and (max-width:600px) {
  .pe{
    width: 100%;
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
	        <ul >
	          <li ><a href="index.php" >Home</a></li>
	          <li ><a href="#" class="active">About Us</a></li>
	          <li><a href="#services">Products</a></li>
	          <li><a href="#portfolio">Portfolio</a></li>
	          <li><a href="cart.php">Cart</a></li>
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

	

	<div class="about-section">
        <div class="inner-container">
            <h1>About Us</h1>
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
            <div class="skills">
                <span>Woolen</span>
                <span>Organic</span>
                <span>Biodegradable</span>
            </div>
        </div>
    </div>

   

        <div class="team-section">
		    <div class="inner-width">
		      <h1>Meet Our Team</h1>
		      <div class="pers">

		        <div class="pe">
		          <img src="img/p1.png" alt="">
		          <div class="p-name">Afaq Mansoor Khan</div>
		          <div class="p-des">Web Developer</div>
		          <div class="p-sm">
		            <a href="#"><i class="fa fa-facebook-f"></i></a>
		            <a href="#"><i class="fa fa-twitter"></i></a>
		            <a href="#"><i class="fa fa-instagram"></i></a>
		          </div>
		        </div>

		        <div class="pe">
		          <img src="img/p2.png" alt="">
		          <div class="p-name">Syed Muhammad Azhar</div>
		          <div class="p-des">Web Developer</div>
		          <div class="p-sm">
		            <a href="#"><i class="fa fa-facebook-f"></i></a>
		            <a href="#"><i class="fa fa-twitter"></i></a>
		            <a href="#"><i class="fa fa-instagram"></i></a>
		          </div>
		        </div>

		        <div class="pe">
		          <img src="img/p3.png" alt="">
		          <div class="p-name">John Doe</div>
		          <div class="p-des">Web Designer</div>
		          <div class="p-sm">
		            <a href="#"><i class="fa fa-facebook-f"></i></a>
		            <a href="#"><i class="fa fa-twitter"></i></a>
		            <a href="#"><i class="fa fa-instagram"></i></a>
		          </div>
		        </div>

		      </div>

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
						<form action="./controllers/AboutUsController.php" method="post">
						  <input type="email" name="email">
						  <input type="submit" name="submit" value="Subscribe">
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
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			})
		})
	</script>
  
</body>
</html>