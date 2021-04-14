<!doctype html>
<?php
session_start();
include 'connection_start.php';
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
    <link type="text/css" rel="stylesheet" href="css/UserProfile.css">
</head>
<body >
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
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="browseProducts.php" class="nav-link">Browse Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="TeamPage.php" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="Userprofile.php" class="nav-link active">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Log Out</a>
                    </li>
                </ul>
          </nav>  
       </div>   
    </header>
    <!--Header Ends-->
    
    <section id="top">
        <div class="container">
            <h1 class="header-user-profile" style="margin-top: 13rem;">User Profile</h1>	
            <div class="card-wrapper">
			    <div class="row">
				   <div class="col-md-6">
						<div class="card" style="margin-right: 30px;">  
						  <img src="images/cardbg2.jpg" class="card-img">
						  <?php 
						    if(empty($_SESSION['user_data']['userimage'])){
						  ?>
						  <img src="images/usericon.jpg" alt="profile" class="profile">
						  <?php
						   }
						   else{
						  ?>
						  <img src="<?php echo $_SESSION['user_data']['userimage'] ?>" alt="profile" class="profile">
						  <?php
						   }
						   ?>
						  <h1><?php echo $_SESSION['user_data']['username'];?></h1>
						  <p class="profession">Customer</p>
                          <p class="about">
                            Thank You, <?php echo $_SESSION['user_data']['username'];?> for being our Customer.
                            Your details can only be viewed by you.
                         </p>
						  <p class="about">
                          <strong>Contact No. :</strong>  
                          <?php echo $_SESSION['user_data']['userphone'];?>
						  </p>
						  <a href="UpdateProfile.php" class="btn">Update Profile</a>
						  <ul class="social">
							  <li><i class="fas fa-envelope"></i></li>
							  <li><a class="profession" style="font-size: 20px;"href="<?php echo $_SESSION['user_data']['useremail'];?>"><?php echo $_SESSION['user_data']['useremail'];?></a></li>
						  </ul>
						</div>
				    </div>
				</div>	
            </div>
        </div> 
    </section>

    
   
    <?php include 'footer.php';?>      
          
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
  