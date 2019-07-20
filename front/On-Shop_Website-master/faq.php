<!DOCTYPE html>
<html>
	<title>FAQ || On-Shop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
    <link rel="stylesheet" href="include/faq.css">
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

    <!-- Faq body -->
    <div class="container">

    <div class="page-header">
        <h1> FAQ <small>Frequently Asked Questions</small></h1>
    </div>
    <div class="container">
        <br />
        
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            This section contains a wealth of information, related to <strong>On-Shop</strong> and its store. If you cannot find an answer to your question, 
            make sure to contact us. 
        </div>

        <br />

        <div class="panel-group" id="accordion">
            <div class="faqHeader">General questions</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Account registration at <strong>On-Shop</strong> is only required if you will be selling or buying item's. 
                        This ensures a valid communication channel for all parties involved in any transactions. 
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Can I become a Seller?</a>
                    </h4>
                </div>
                <div id="collapseTen" class="panel-collapse collapse">
                    <div class="panel-body">
                        Yes you can, a lot of the content of the site has been submitted by the community. Whether it is a commercial element 
                        or a free one, you are encouraged to contribute. All credits are published along with the resources. 
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">What is the currency used for all transactions?</a>
                    </h4>
                </div>
                <div id="collapseEleven" class="panel-collapse collapse">
                    <div class="panel-body">
                        All prices for products, accessories and other items, including each seller's or buyer's account balance are in <strong>INR</strong>
                    </div>
                </div>
            </div>

            <div class="faqHeader">Sellers</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Who cen sell items?</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        Any registed user, who presents a work, which is genuine and appealing, can post it on <strong>PrepBootstrap</strong>.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">I want to sell my items - what are the steps?</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        The steps involved in this process are really simple. All you need to do is:
                        <ul>
                            <li>Register an account</li>
                            <li>Activate your account</li>
                            <li>Go to the <strong>Themes</strong> section and upload your theme</li>
                            <li>The next step is the approval step, which usually takes about 72 hours.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">How much do I get from each sale?</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        Here, at <strong>On-Shop</strong>, we offer a great, 70% rate for each seller, regardless of any restrictions, such as volume, date of entry, etc.
                        <br />
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Why sell my items here?</a>
                    </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">
                        There are a number of reasons why you should join us:
                        <ul>
                            <li>A great 70% flat rate for your items.</li>
                            <li>Fast response/approval times. Many sites take weeks to process a purchase order. And if it gets rejected, there is another iteration. We have aliminated this, and made the process very fast. It only takes up to 72 hours for a template/theme to get reviewed.</li>
                            <li>We are not an exclusive marketplace. This means that you can sell your items on <strong>PrepBootstrap</strong>, as well as on any other marketplate, and thus increase your earning potential.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">What are the payment options?</a>
                    </h4>
                </div>
                <div id="collapseEight" class="panel-collapse collapse">
                    <div class="panel-body">
                        The best way to transfer funds is via Paypal. This secure platform ensures timely payments and a secure environment. 
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">When do I get paid?</a>
                    </h4>
                </div>
                <div id="collapseNine" class="panel-collapse collapse">
                    <div class="panel-body">
                        Our standard payment plan provides for monthly payments for each product sold. At the end of each month, all accumulated funds are transfered to your account. 
                        The minimum amount of your balance should be at least 70 INR. 
                    </div>
                </div>
            </div>

            <div class="faqHeader">Buyers</div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">I want to buy a product - what are the steps?</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Buying a theme on <strong>On-Shop</strong> is really simple. Each product has a live preview. 
                        Once you have selected a product, which is to your liking, you can quickly and securely pay via Paypal or COD.
                        <br />
                        Once the transaction is complete, you gain full access to the purchased product. 
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Is this the latest version of an item</a>
                    </h4>
                </div>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        Each item in <strong>On-Shop</strong> is maintained to its latest version. This ensures its smooth operation.
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Faq body End -->

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
