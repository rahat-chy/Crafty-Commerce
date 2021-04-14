<!doctype html>
<?php
session_start();


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crafty Commerce</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
   <header>
       <div class="container">
          <nav class="nav">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <a href="index.php" class="logo"><img src="images/logo.png" alt="" class="logo"></a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="browseProducts.php" class="nav-link">Browse Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="TeamPage.php" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link">About Us</a>
                    </li>
					<?php
					if(isset($_SESSION['user_data'])){
					?>
					<li class="nav-item">
                        <a href="userprofile.php" class="nav-link">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Log Out</a>
                    </li>
					<?php
					}
					else{
					?>
					<li class="nav-item">
                        <a href="login.php" class="nav-link">Log In</a>
                    </li>
					<?php
					}
					?>
                </ul>
          </nav>  
       </div>   
    </header>
    <!--Header Ends-->
    <section class="banner_01" id="top" >
        <div class="container">
            <h2 class="sub-headline">
                 <span class="first-letter">W</span>elcome            
            </h2>
            <h1 class="main-title" style="color: #ffffff">Crafty Commerce</h1>
            <div class="title-description">
             <div class="separator">
                <div class="line line-left"></div>
                <div class="line line-right"></div>
             </div>
            </div>
            <div class="animation">
                 <a href="browseProducts.php"class="btn cta-btn">Browse</a>
            </div>
        </div> 
    </section>
  <!--Main Title Ends-->
    <section class="section-01">
        <div class="container">
             <div class="row">
			    <div class="col-md-6 animate-left">
                 <img src="images/gridimage2.jpg" />
				</div>
				<div class="col-md-6">
                 <div class="sub-section-02 animate-right">
                    <div class="global-headline">
                           <h2 class="sub-headline">
                           <span class="first-letter">B</span>rowse            
                          </h2>
                          <h1 class="main-title main-title-dark">Products</h1> 
                    </div>  
                    <p style="text-align: center;">
                        Click the button below to browse our store.
                    </p>
                    <a href="browseProducts.php" class="btn body-btn" >View the all Products</a>
                 </div>
                </div>
             </div>
        </div>
    </section>
    <!--Section 01 Ends-->
	<section class="banner-02">
       
    </section>
    <!-- banner 02 ends-->
    <section class="section-02">
        <div class="container">
		<div class="row">
		 <div class="col-md-6">
          <div class="sub-section">
               <div class="sub-section-02 padding-right animate-left">
                   <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">T</span>eam            
                        </h2>
                        <h1 class="main-title main-title-dark">Page</h1> 
                   </div>
                   <p>This project is Developed By Samin Ahsan Tausif and Rahat Chowdhury. To know more about our team click below..</p>
                <a href="TeamPage.php" class="btn body-btn2">Team page</a>              
                </div>
          </div>
		  </div>
		  <div class="col-md-6 animate-right">
		     <img src="images/gridimage3.jpeg" />
		  </div>
		  </div>
        </div>
    </section>
    <!--Section 02 Ends-->
    <section class="banner-04">
       
    </section>
    <!--Banner 02 Ends-->
    <section class="section-02">
        <div class="container">
		 <div class="row">
		 <div class="col-md-6 animate-left">
		     <img src="images/gridimage5.jpg" />
		  </div>
		  <div class="col-md-6">
          <div class="sub-section">
               <div class="sub-section-02 padding-right animate-right">
                   <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">A</span>bout            
                        </h2>
                        <h1 class="main-title main-title-dark">Us</h1> 
                        <div class="asterisk-03"></div>
                   </div>
                   <p>This is a e-commerce website where you can browse and buy various products with a very cheap price and free home delivery. To know more about us click below..</p>
                <a href="AboutUs.php" class="btn body-btn2">About Us</a>              
                </div>
          </div>
		  </div>
		  </div>
        </div>
    </section>
    <!--Section 02 Ends-->
    <section class="banner-03">

    </section>
     <!--Banner 03 Ends-->
	
	<?php include 'footer.php';?>

  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
