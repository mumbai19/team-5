<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

    if($result){

      if($obj = $result->fetch_object()) {

        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];

        $query = $mysqli->query("INSERT INTO payment (product_code, product_name, product_desc, price, units, total, email, payed) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user', 'Online_Payment')");        
        }
      }
    }
  }

	unset($_SESSION['cart']);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Details || On-Shop</title>
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <link rel="stylesheet" type="text/css" href="include/payment.css">
  </head>
  <body>

<!-- Header Nav ============================================================== -->
	<div class="header-blue">
    <nav class="navbar navbar-default navigation-clean-search">
      <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">On-Shop</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
            <li class="active" role="presentation"><a href="index.php">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">All Catagories <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="product.php">Smart Phones</a></li>
                <li><a href="product.php">Laptops</a></li>
                <li><a href="product.php">Accessories</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" target="_self" method="GET" action="search.php">
            <div class="form-group">
              <label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label>
                <input class="form-control search-field" type="search" name="search" id="search-field">
            </div>
          </form>
          <p class="navbar-text navbar-right">
            <?php
              if(isset($_SESSION['username'])){
                echo '<a  class="navbar-link login" href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a>';
                echo '<a class="navbar-link login" href="logout.php"><i class="glyphicon glyphicon -log-out"></i> Log Out</a>';
                echo '<a class="btn btn-default action-button" href="account.php"><i class="glyphicon glyphicon-user"></i> My Account</a>';
              }
              else {
                echo '<a class="navbar-link login" href="login.php"><i class="glyphicon glyphicon glyphicon-user"></i> Log In</a>';
                echo '<a class="btn btn-default action-button" href="signup.php"><i class="glyphicon glyphicon-log-in"></i> Sign Up</a>';
              }
            ?>

          </p>
        </div>
      </div>
        </nav>
    </div>
<!-- Header Nav End --><hr><br>

	<div class="container">
    	<!-- CREDIT CARD FORM STARTS HERE -->
        <div class="panel panel-default credit-card-box customwidth center-block">
        <div class="panel-heading display-table" >
	        <div class="row display-tr" >
		        <h3 class="panel-title display-td">Payment Details</h3>
		        <div class="display-td" >
		        <img class="img-responsive pull-right" src="assets/bg-img/card.webp">
		        </div>
	        </div>                    
        </div>

        <div class="panel-body">
	        <form role="form" action="success.php" id="payment-form">
	        <div class="row">
		        <div class="col-xs-12">
			        <div class="form-group">
				        <label for="cardNumber">CARD NUMBER</label>
				        <div class="input-group">
				        	<input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" required autofocus>
				            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card" id="cardlogo" style="color:purple;font-size:2rem;"></i></span>
				        </div>
				    </div>                            
		        </div>
	        </div>
	        
	        <div class="row">
	            <div class="col-xs-7 col-md-7">
	                <div class="form-group">
	                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
	                    <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required>
	                </div>
	            </div>
	         	<div class="col-xs-5 col-md-5 pull-right">
	                <div class="form-group">
	                    <label for="cardCVC">CV CODE</label>
	                    <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-xs-12">
	                <button class="btn btn-success btn-lg btn-block" type="submit">Pay Now</button>
	            </div>
	        </div>
	        <div class="row" style="display:none;">
		        <div class="col-xs-12">
		            <p class="payment-errors"></p>
		        </div>
	        </div>
	        </form>
        </div>
    </div>            
    <!-- CREDIT CARD FORM ENDS HERE -->
    </div><hr>

    <footer id="myFooter">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 myCols">
					<h5>Get started</h5>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="signup.php">Sign up</a></li>
						<li><a href="login.php">Log In</a></li>
					</ul>
				</div>
				<div class="col-sm-3 myCols">
					<h5>About us</h5>
						<ul>
							<li><a href="about.php">Company Information</a></li>
							<li><a href="contact.php">Contact us</a></li>
							<li><a href="rev.php">Reviews</a></li>
						</ul>
				</div>
				<div class="col-sm-3 myCols">
					<h5>Support</h5>
						<ul>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="contact.php">Help desk</a></li>
							<li><a href="index.php">Forums</a></li>
						</ul>
				</div>
				<div class="col-sm-3 myCols">
					<h5>Legal</h5>
						<ul>
							<li><a href="tns.php">Terms of Service</a></li>
							<li><a href="tns.php">Terms of Use</a></li>
							<li><a href="tns.php">Privacy Policy</a></li>
						</ul>
				</div>
			</div>
		</div><hr>		
		<div class="footer-copyright">
			<p><a href="admin_login.php">© 2017-2018 Copyright by On-Shop, All rights reserved</a></p>
        </div>
    </footer>
<!-- Footer End -->

    <script src="include/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="include/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$("[name='cardNumber']").change(function(){
	var input = $("[name='cardNumber']");
	if(input.val().substring(0, 1) == 4) {
		$('#cardlogo').addClass('fa-cc-visa');
	}
	if(input.val().substring(0, 2) == 34 || input.val().substring(0, 2) == 37) {
		$('#cardlogo').addClass('fa-cc-amex');
	}
	if(input.val().substring(0, 2) == 51 || input.val().substring(0, 2) == 52 || input.val().substring(0, 2) == 53 || input.val().substring(0, 2) == 54 || input.val().substring(0, 2) == 55) {
		$('#cardlogo').addClass('fa-cc-mastercard');
	}
	if(input.val().substring(0, 4) == 6011 || input.val().substring(0, 2) == 65) {
		$('#cardlogo').addClass('fa-cc-discover');
	}
	else if(input.val().length === 0) {
		$('#cardlogo').removeClass('fa-cc-visa fa-cc-amex fa-cc-mastercard fa-cc-discover');
	};
});
</script>
</body>
</html>
