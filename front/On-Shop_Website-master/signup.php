<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}

?>

<!DOCTYPE html>
<html>
    <title>Sign Up || On-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
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
<!-- Header Nav End --><br>

  <div class="container">
    <div class="row team_columns_carousel_wrapper">
      <div class="col-lg-8 col-lg-offset-2">
        <h1>Sign In</h1>
                
      <form method="POST" action="insert.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="form_name">Firstname :</label>
                <input id="form_name" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required" autofocus="">
                <div class="help-block with-errors"></div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="form_lastname">Lastname :</label>
                <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required">
                <div class="help-block with-errors"></div>
            </div>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <label for="form_email">E-Mail :</label>
              <input type="email" id="form_email" class="form-control" placeholder="Your Email id *" name="email" required="required">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <label for="form_password">Password :</label>
              <input type="password" id="form_password" class="form-control" placeholder="Enter Your Password *" name="pwd" required="required">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="form_name">City :</label>
                <input id="form_name" type="text" name="city" class="form-control" placeholder="Please enter City name *" required="required">
                <div class="help-block with-errors"></div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                  <label for="form_phone">Pin Code :</label>
                  <input id="form_lastname" type="number" name="pin" class="form-control" placeholder="Please enter your pincode *" required="required">
                  <div class="help-block with-errors"></div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
              <label for="form_password">Phone No :</label>
              <input type="number" id="form_name" class="form-control" placeholder="Enter Your Contact No *" name="phone_no" required="required">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label for="form_message">Address :</label>
                <textarea id="form_message" name="address" class="form-control" placeholder="Address *" rows="4" required="required"></textarea>
                <div class="help-block with-errors"></div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div><br>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form> 
  </div></div>
</div><br>
    
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
    <script src="include/bootstrap/js/validator.js"></script>
    <script src="include/bootstrap/js/contact.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
