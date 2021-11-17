<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
	<link href="csseshop/main.css" rel="stylesheet">
	<link href="csseshop/responsive.css" rel="stylesheet">
    
    <link href="css/salomon.css" rel="stylesheet">
    
<!--datatable-->
	<script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    <style type="text/css">
    #welcome {
    background: #fff;
    padding: 15px;
    vertical-align: middle;
    border: dotted 2px #9C0;
    font-weight: bold;
}
</style>
        <?php
	session_start();
	include_once("connection.php");
	?>
    
  </head>
  <body>
  
  <?php
    include_once("connection.php"); 
  ?>
		<div class="header-middle" style="background: url(images/toyshop.jpg)"><!--header-middle-->
			<div class="container" >
				<div>
					<div class="col-sm-6" >
						<div class="logo pull-left" >
                            <a href="index.php">
                            <img src="images/logoatn.gif" width="400" height="70"></a>
						</div>
					</div>  
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=adidas">Animals</a></li>
										<li><a href="?page=nike">Action</a></li> 
										<li><a href="?page=puma">Electronic toys</a></li>
                                        <li><a href="?page=jordan">Spinning toys</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Management<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=category_management">Category</a></li>
										<li><a href="?page=product_management">Product</a></li>
                                        <li><a href="?page=shop_management">Shop</a></li>
                                    </ul>
                                </li>
                                <?php
                                if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
                                ?>
                                <li><a href="?page=update_customer"><i class="fa fa-lock"></i>Hi, <?php echo $_SESSION['us']?></a></li>
                                <li><a href="?page=logout"><i class="fa fa-crossharis"></i>Logout</a></li>
                                <?php
                                }
                                else{
                                ?>
                                <li><a href="?page=login">
                                <i class="fa fa-lock"></i>Login</a></li>
                                <li><a href="?page=register"><i class="fa fa-star"></i>Register</a></li>
                                <?php
                                }
                                ?>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    <div id="welcome">
            <marquee direction="left" behavior="scroll" scrollamount="4">
            Welcome to the ATN shop, a store that specializes in toys for teenagers
            </marquee>
    </div>
  
    <?php
if(isset($_GET['page']))
{
$page = $_GET['page'];
if($page=="register"){
include_once("Register.php");
}
elseif($page=="login"){
include_once("Login.php");
}
elseif($page=="category_management"){
include_once("Category_management.php");
}
elseif($page=="product_management"){
include_once("Product_Management.php");
}
elseif($page=="add_category"){
include_once("Add_Category.php");
}
elseif($page=="addshop"){
include_once("Add_Shop.php");
}
elseif($page=="update_category"){
include_once("Update_Category.php");
}
elseif($page=="shop_management"){
include_once("Shop_management.php");
}
elseif($page=="add_product"){
include_once("Add_Product.php");
}
elseif($page=="update_product"){
include_once("Update_Product.php");
}
elseif($page=="logout"){
    include_once("Logout.php");
}
elseif($page=="adidas"){
    include_once("Adidas.php");
}
elseif($page=="nike"){
    include_once("Nike.php");
}
elseif($page=="puma"){
    include_once("Puma.php");
}
elseif($page=="jordan"){
    include_once("Jordan.php");
}
elseif($page=="quanly_chitietsanpham"){
    include_once("Quanly_chitietsanpham.php");
}
elseif($page=="update_customer"){
    include_once("Update_customer.php");
}
}
else{
include_once("Content.php");
}

?>
      
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <?php
                            if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
                            ?>
                            <li><a href="?page=update_customer">Account</a></li>
                            <?php
                            }
                            else{
                            ?>
                            <li><a href="?page=login">Login</a></li>
                            <?php
                            }
                            ?>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Category</h2>
                        <ul>
                            <li><a href="?page=adidas">Animals</a></li>
							<li><a href="?page=nike">Action</a></li> 
						    <li><a href="?page=puma">Electronic toys</a></li>
                            <li><a href="?page=jordan">Spinning toys</a></li> 
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">News</h2>
                        <p>Sign up for our newsletter and get our exclusive deals.</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Enter Email Address">
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 797 975 374</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> quanlx44@gmail.com</a></li>
                                <li><a href="https://www.facebook.com/Sport-Shop-103065235287910/" target="_blank"><i class="fa fa-facebook">  Facebook</i></a></li>
							</ul>
						</div>
				</div>	
            </div>
        </div>
    </div> <!-- End footer top area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
    
    <!--data table - dat dung vi tri nay-->
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
    
    
  </body>
</html>