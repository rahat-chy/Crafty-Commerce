<!DOCTYPE html>
<?php
session_start();
include 'connection_start.php';	

//echo $_SESSION['product_data']['productid'];
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
    <link type="text/css" rel="stylesheet" href="css/Product.css">
</head>
<body>
    <header>
       <div class="container">
          <nav class="nav">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <a href="index.html" class="logo"><img src="images/logo.png" alt="" class="logo"></a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="browseProducts.php" class="nav-link active">Browse Products</a>
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
	
	<section class="productBanner" id="top">
        
    </section>
	

    <div class="title">
        <div class="container">
            <h2 class="sub-headline-extra2" style="color: green;">
                <span class="first-letter" >P</span>roduct Details           
            </h2>
        </div>
    </div>

    <?php
	
	$sql = "SELECT * FROM product WHERE ID = '".$_GET['id']."'"; 
	$runquery= mysqli_query($link,$sql) or die(mysqli_error($link));
	$num = mysqli_num_rows($runquery);
	
	if($num>0)
	{
		while($product = mysqli_fetch_array($runquery)){
	
	?>
	
	<div class="container">
	  <div class="productimageblock" >
	    <img class="productimage" src="<?php echo $product['Image']; ?>" />
	  </div>
	  <div style="padding: 20px; width: 100%; height: 100%; margin-bottom: 100px; box-shadow: 3px -3px 15px #8a8383; border: 5px solid orange;">
	    <h1 style="font-size: 50px; margin-top: 50px; margin-bottom: 40px;"><?php echo $product['Name'];?></h1>
		<p style="font-size: 25px;">Price: <?php echo $product['Price'];?> BDT</p>
		<p style="font-size: 25px;">Category: <?php echo $product['Category']; ?></p>
		<p style="font-size: 25px;">Brand: <?php echo $product['Brand']; ?></p>
		<p style="font-size: 25px;">Availability: <?php echo $product['Availability']; ?></p>
		<p style="font-size: 25px;">Description: <?php echo $product['Description']; ?></p>
	  </div>
    </div>

	<?php
	
	
	}
	}
	?>
	
    
	<?php include 'footer.php';?>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>