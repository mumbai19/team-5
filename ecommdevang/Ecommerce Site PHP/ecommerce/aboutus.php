<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/pogo-slider01.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/about.css" rel="stylesheet" type="text/css" media="all" />

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
				
				
				    <section class="about-w3l" id="about">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 about-agileinfo1" data-aos="flip-right">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="1000" style="background-image:url(https://components.staticcodes.io/img/hotel/bistro-web/about1.jpg);background-position:center;"></div>
                    <div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="1000" style="background-image:url(https://components.staticcodes.io/img/hotel/bistro-web/about2.jpg);background-position:center;"></div>
                    <div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="1000" style="background-image:url(https://components.staticcodes.io/img/hotel/bistro-web/about3.jpg);background-position:center;"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 about-agileinfo2" data-aos="flip-left">
                <div class="aboutinfo">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam convallis sem at commodo maximus. Vivamus a urna et arcu semper sodales at ut nulla. Curabitur nunc ex, sollicitudin eu consequat eu, consequat non nulla. Ut nec mauris
                        velit. Quisque felis urna, vulputate quis euismod nec, vulputate a tortor. Etiam nec nulla lacinia, venenatis velit id, consequat urna. Duis quis molestie risus, cursus convallis metus.</p>
                    <p>Etiam nec nulla lacinia, venenatis velit id, consequat urna. Duis quis molestie risus, cursus convallis metus. Phasellus massa lacus, faucibus sit amet pretium sit amet, imperdiet ut purus.Cras laoreet nunc vitae nisl rutrum pretium.
                        Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

				
				
				
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/main01.js"></script>

<?php include 'includes/scripts.php'; ?>
</body>
</html>

