<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

        header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In || On-Shop</title>
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="include/login.css">
</head>

<body id="login">
	
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
<!-- Header Nav End -->
	
<div  id="login">
    <div class="container" id="log-in-form">
        <div class="heading">
         	<h1>Log In Your Account</h1>''
        </div>
        <form method="POST" action="verify.php">
            <div class="form-group">
                <input type="email" class="form-control" name="username" placeholder="Enter email id" required="required" autofocus=" ">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pwd" placeholder="Enter password" required="required">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group form-group-btn">
                <button type="submit" class="btn btn-success btn-lg" value="Login"><i class="glyphicon glyphicon-user"></i> Log In</button>
            </div>
            <div class="clearfix"></div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
        </form>
    </div>
</div>
    
<!-- Include footer.php -->
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
</body>
</html>
