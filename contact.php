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
	          <li ><a href="index.php">Home</a></li>
	          <li ><a href="aboutus.php">About Us</a></li>
	          <li><a href="#services">Services</a></li>
	          <li><a href="#portfolio">Portfolio</a></li>
	          <li><a href="#team">Team</a></li>
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
	          <li><a href="#" class="active">Contact Us</a></li>
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

	<div class="contact-in">
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.311937761199!2d71.41426791479827!3d33.9588209806315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d9116246305f35%3A0x8862646785e05b7e!2sBakarwaal!5e0!3m2!1sen!2s!4v1595437724180!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
		<div class="contact-form">
 			<h1>Contact Us</h1>
				<form>
					<input type="text" placeholder="Name" class="contact-form-txt" />
					<input type="text" placeholder="Email" class="contact-form-txt" />
					<textarea placeholder="Message" class="contact-form-textarea"></textarea>
					<input type="button" name="Send" value="Send" class="contact-form-btn" />
				</form>
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
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active');
			})
		})

		function addClass() {
  			document.body.classList.add("sent");
		}

		sendLetter.addEventListener("click", addClass);
	</script>
  
</body>
</html>