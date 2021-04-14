<?php
session_start();
include 'connection_start.php';	
?>

<!doctype html>
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
	<link type="text/css" rel="stylesheet" href="css/aboutus.css">
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
                        <a href="browseProducts.php" class="nav-link">Browse Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="TeamPage.php" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link active">About Us</a>
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
    <section class="aboutusbanner">
        <div class="container">
           <h1 class="aboutustitle head1" >About</h1>
		   <h1 class="aboutustitle head2">Us</h1>
        </div> 
    </section>
  <!--Main Title Ends-->
  
  
    <?php
	
    $sql = "SELECT * FROM aboutus"; 
	
	$runquery= mysqli_query($link,$sql) or die(mysqli_error($link));
	$num = mysqli_num_rows($runquery);
	
	if($num>0)
	{
		while($data = mysqli_fetch_array($runquery)){
		
	
	?>
  
    <div class="aboutusSection" id="#top">
	  <div class="container">
	    <?php
		$num = (int) $data['ID'];
		if($num%2==0){
		?>
	    <div class="row">
		  <div class="col-md-6">
			<h1 class="aboutusHeaders" ><?php echo $data['Title'];?></h1>
			<p class="aboutusTexts" ><?php echo $data['Text'];?></p>
		  </div>
		  <div class="col-md-6 animate-right">
		    <img  src="<?php echo $data['Image'];?>" style="margin-left: 30px; animation: spin 0.5s forwards;" class="aboutusGridimages" />
		  </div>
		</div>
		<?php
		}
		else{
		?>
		<div class="row">
		  <div class="col-md-6 animate-left">
		    <img src="<?php echo $data['Image'];?>" style=" width: 90%; margin-right: 20px; animation: scale 0.5s backwards;" class="aboutusGridimages"  />
		  </div>
		  <div class="col-md-6">
			<h1 class="aboutusHeaders" ><?php echo $data['Title'];?></h1>
			<p class="aboutusTexts" ><?php echo $data['Text'];?></p>
		  </div>
        </div>
		<?php
		}
		?>
	  </div>
	</div>
	
		 
  
	<?php
	    
		}
	}
	include 'connection_end.php';	
	?>
    
	<?php include 'footer.php';?>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
