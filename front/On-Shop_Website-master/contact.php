<!DOCTYPE html>
<html>
    <title>Contact Us || On-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
</head>

<body id="contactus">

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

    <!-- Contact -->
        <div class="container">
            <div class="row team_columns_carousel_wrapper">
                <div class="col-lg-8 col-lg-offset-2">
                <h1>Contact Us</h1>
                    <form id="contact-form" method="post" action="contact.php" role="form">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="form_name">Firstname :</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Lastname :</label>
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Email :</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone :</label>
                                        <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message :</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input href="#" type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><hr>
    <!-- Contact End -->

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
</body>
</html>
