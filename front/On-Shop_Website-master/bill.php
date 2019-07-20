<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment || On-Shop</title>
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
<!-- Header Nav End -->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php

          if(isset($_SESSION['cart'])) {
        		echo '<div class="invoice-title">';
        		echo '<h2>Invoice</h2>';
        		echo '</div><hr>';
        		echo '<div class="row">';
        		echo '<div class="col-xs-6">';
        		echo '<address>';
        		echo '<strong><h4><u> Billed To</u>&nbsp;:</h4></strong><br>';

            ?>

            <?php
                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);
                // $result1 = $mysqli->query('SELECT date FROM order');
                    if($result === FALSE){
                       die(mysql_error());
                    }

                    if($result) {
                      $obj = $result->fetch_object();
                		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : &nbsp;'. $obj->fname. '&nbsp;&nbsp;'. $obj->lname. '<br>';
                		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address : &nbsp;'. $obj->address. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email : &nbsp;'. $obj->email. '<br>';
                		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone No. : &nbsp;' . $obj->phone_no. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; City : &nbsp;' . $obj->city. '<br>';
                		echo '</address>';
                		echo '</div>';
                
                        echo '<div class="col-xs-6 text-right">';
                        echo '<address>';
                        echo '<div class="container text-left">';
                        echo '<strong><h4><u> Shipped To</u>&nbsp;:</h4></strong><br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name : &nbsp;'. $obj->fname. '&nbsp;&nbsp;'. $obj->lname. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Address : &nbsp;'. $obj->address. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email : &nbsp;'. $obj->email. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone No. : &nbsp;'. $obj->phone_no. '<br>';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; City : &nbsp;'. $obj->city. '<br>';
                        echo '</div>';
                        echo '</address>';
                        echo '</div>';

                		echo '</div>';
                		echo '<div class="row">';
                		echo '<div class="col-xs-6 text-left">';
                		echo '<address>';
                		echo '<strong><h4><u>Order Date</u>&nbsp;:</h4></strong>';
                        echo '</address>';
                		echo '</div>';
                		echo '</div>';
                	    echo '</div>';
                        echo '</div>';
                    }
                }

            ?>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
                        <?php

                          if(isset($_SESSION['cart'])) {

                          $total = 0;
    		        	  echo '<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Name</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>';
    						foreach($_SESSION['cart'] as $product_id => $quantity) {

                            $result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = ".$product_id);


                            if($result){

                              while($obj = $result->fetch_object()) {
                                $cost = $obj->price * $quantity; //work out the line cost
                                $total = $total + $cost; //add to the total cost
                                echo '<tr>
    								<td>'.$obj->product_code.'</td>
    								<td class="text-center">'.$obj->product_name.'</td>
    								<td class="text-center">'.$cost.'</td>
    								<td class="text-center">'.$quantity.'</td>
                                    <td class="text-right">'.$cost.'</td>
    							</tr>';
                                	}
                                }
                            }

                                    echo '<tr>
                                    <td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">'.$total.'</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">'.$total.'</td>
    							</tr>
    						</tbody>
    					</table>';
                        echo '<a href="payment.php"><button class="add-to-cart" style="float:left;">Pay Online</button></a>';
                        echo '<a href="success.php"><button class="add-to-cart" style="float:right;">COD</button></a>';
                    }

                    ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </div></div>
</div></div><br>
        
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
