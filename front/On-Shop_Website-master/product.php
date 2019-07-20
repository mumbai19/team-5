<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
  include 'config.php';
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products || On-Shop</title>
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

  <!-- Product Menu ====================================================== -->
  <div class="team_columns_carousel_wrapper">
        <div class="item active">
        <a href="signup.php"><img src="assets/slides/oppo.jpg" style="width:100%;"></a>
      </div>
    </div><br>
  <!-- Product Menu End -->

<!-- Index Product ============================================================ -->

      <div class="container">
         <div class="row team_columns_carousel_wrapper">
            <?php

          $sql = $mysqli->query("SELECT * FROM products");

          if($sql){
              
              while($obj = $sql->fetch_object()) {
                echo '<div class="item">';
                echo '<div class="col-xs-12 col-sm-6 col-md-3 team_columns_item_image">';
                echo '  <a><img src="assets/product/'.$obj->product_img_name.'" width="100%" data-toggle="modal" data-target="#'.$obj->id.'"></a>';    
                echo '<div class="team_columns_item_caption">';
                echo '<h5 data-toggle="modal" data-target="#'.$obj->id.'"><a>'.$obj->product_name.'</a></h5>';
                echo '<hr>';
                echo '<h5>₹ '.$obj->price.'</h5>';
                echo '</div>';         
                echo '</div>';
                echo '</div>';
                echo '<div class="modal fade" id="'.$obj->id.'" role="dialog">';
                echo '<div class="modal-dialog modal-lg">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                echo '<h4 class="modal-title">'.$obj->product_name.'</h4>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo '<div class="col-lg-4"><img src="assets/product/'.$obj->product_img_name.'"></div>
                               <p><h3>'.$obj->product_name.'</h3></p>
                               <p><h4><strong>Description</strong>: '.$obj->product_desc.'</h4></p>
                               <p><h3><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</h3></p>
                               <p><strong>Units Available</strong>: '.$obj->qty.'</p><br>';
              
                if($obj->qty > 0) {
                    
                    echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" class="add-to-cart" value="Add To Cart" style=";">';
                    echo '</div></div>';
                }

                else {
                    
                    echo 'Out Of Stock!!!';
                }
                
                  echo '</div></div>';
            }
         }
         ?>
         <hr></div>
      </div><br>
<!-- Index Product End -->

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
