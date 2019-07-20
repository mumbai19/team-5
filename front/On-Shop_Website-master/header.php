<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}



?>

<!DOCTYPE html>
<html>
	<title>Online Shopping India</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="include/header.css">
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
								<li role="presentation"><a href="product.php">Smart Phones</a></li>
								<li role="presentation"><a href="product.php">Laptops</a></li>
								<li role="presentation"><a href="product.php">Accessories</a></li>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" target="_self">
						<div class="form-group">
							<label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label>
								<input class="form-control search-field" type="search" name="search" id="search-field">
						</div>
					</form>
					<div class="pull-right">
			
						<p class="navbar-text navbar-right">
							<?php
								if(isset($_SESSION['username'])){								echo '<a  class="navbar-link login" href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i> Cart</a>';
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
			</div>
		</nav>
    	</div>
<!-- Header Nav End -->

    <script src="include/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="include/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
