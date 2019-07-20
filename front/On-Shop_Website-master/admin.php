<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:account.php");
}

if($_SESSION["type"]!="admin") {
  header("location:account.php");
}

include 'config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || On-Shop</title>
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
<!-- Header Nav End -->

  <div class="container">
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
      <div class="jumbotron">
        <h2>Hey Admin!</h2>
      </div>
      
         <?php
           $result = $mysqli->query("SELECT * from products order by id asc");
           if($result) {
             while($obj = $result->fetch_object()) {
               echo '<div class="large-4 columns">';
               echo '<p><h3>'.$obj->product_name.'</h3></p>';
               echo '<img src="assets/img/product/'.$obj->product_img_name.'" style="width:300px; height:180px"/>';
               echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
               echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
               echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
               echo '<div class="large-6 columns" style="padding-left:0;">';
               echo '<form method="post" name="update-quantity" action="admin-update.php">';
               echo '<p><strong>New Qty</strong>:</p>';
               echo '</div>';
               echo '<div class="large-6 columns">';
               echo '<input type="number" name="quantity[]"/>';
               echo '</div>';
               echo '</div>';
             }
          }
        ?> 
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="btn btn-primary" value="Update"></p></center><hr>
  </div>
</div>
</div>
  
<!-- Footer ================================================================== -->
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
      $(document).foundation();
    </script>
  </body>
</html>
