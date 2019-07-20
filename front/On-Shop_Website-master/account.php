<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include 'config.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account || On-Shop</title>
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
  <div class="jumbotron">
        <p><?php echo '<h3>Hi ' .$_SESSION['fname'] .',</h3>'; ?></p>
        <h4>User Details</h4>
        <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form method ="POST" class="form-horizontal" action="update.php">
        <fieldset>
          <div class="form-group">
            <label class="col-sm-2 control-label" id="right-label" for="textinput">First&nbsp;Name&nbsp;:</label>
            <div class="col-sm-10">
      
          <?php

                 $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                 if($result === FALSE){
                   die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
              
                  echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="form-group">';
                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">Last&nbsp;Name&nbsp;:</label>';
                  echo '<div class="col-sm-10">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="fname" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="form-group">';
                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">Email&nbsp;Id&nbsp;:</label>';
                  echo '<div class="col-sm-10">';
                  echo '<input type="email" id="right-label" placeholder="'. $obj->email. '" name="email" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="form-group">';
                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">City&nbsp;:</label>';
                  echo '<div class="col-sm-4">';
                  echo '<input type="text" id="right-label" placeholder="' .$obj->city. '" name="city" class="form-control" required="">';
                  echo '</div>';

                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">Pin&nbsp;Code&nbsp;:</label>';
                  echo '<div class="col-sm-4">';
                  echo '<input type="number" id="right-label" placeholder="'. $obj->pin. '" name="pin" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';
                  
                  echo '<div class="form-group">';
                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">Phone&nbsp;No&nbsp;:</label>';
                  echo '<div class="col-sm-10">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->phone_no. '" name="fname" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="form-group">';
                  echo '<label class="col-sm-2 control-label" id="right-label" for="textinput">Address&nbsp;:</label>';
                  echo '<div class="col-sm-10">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->address. '" name="address" class="form-control" required="">';
                  echo '</div>';
                  echo '</div>';
                }
                echo '<div class="form-group">
                    <label class="col-sm-2 control-label" id="right-label" for="textinput">Password&nbsp;:</label>
                    <div class="col-sm-10">
                      <input type="password" id="right-label" placeholder="***********" name="pwd" class="form-control" required="">
                    </div>
                    </div>';
        ?>

          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <div class="pull-right">
              <input type="submit" id="right-label" value="Update" class="btn btn-primary">
              <input type="reset" id="right-label" value="Reset" class="btn btn-primary">
            </div></div>
          </div>
        </div>
        </fieldset>
      </form>
    </div>
</div><hr>

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
