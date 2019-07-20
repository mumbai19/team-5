<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart || On-Shop</title>
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" type="text/css" href="include/display.css">
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
  <div class="team_columns_carousel_wrapper">
  <div class="jumbotron">
    <p><h1><center>Your Shopping Cart</center></h1></p>
  </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-md-12"></div>
        <div class="alert alert-success" style="display:none;">
          <span class="glyphicon glyphicon-ok"></span> Drag table row and cange Order</div>

          <?php

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table class="table"><thread>';
            echo '<tr>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th></thread>';
            echo '</tr>';
            echo '<tbody>';

            foreach($_SESSION['cart'] as $product_id => $quantity) {

            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


            if($result){

              while($obj = $result->fetch_object()) {
                $cost = $obj->price * $quantity; //work out the line cost
                $total = $total + $cost; //add to the total cost

                echo '<tr class="active">';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>'.$quantity.'&nbsp;<a class="add-to-cart" style="padding:5px;" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="add-to-cart" style="padding:5px;" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
                echo '<td>'.$cost.'</td>';
                echo '</tr>';
              }
            }

          }

          echo '<tr class="success">';
          echo '<td colspan="3" align="left">Total</td>';
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';

          echo '</tr>';
          echo '</tbody>';
          echo '</table><hr>';
          echo '<a href="update-cart.php?action=empty"><button class="add-to-cart">Empty Cart</button></a>&nbsp;<a href="product.php"><button class="add-to-cart">Continue Shopping</button></a>';

          if(isset($_SESSION['username'])) {
            echo '<a href="orders-update.php"><button class="add-to-cart" style="float:right;">Check Out</button></a>';
          }

          else {
            echo '<a href="login.php" class="add-to-cart" style="float:right">Login</a>';
          }
          echo '<hr>';
        }

        else {
          echo "<h4><center>You have no items in your shopping cart!!.</center></h4>";
        }

          echo '</div>';
          echo '</div>';
          ?>
    </div>
  </div><br>
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
