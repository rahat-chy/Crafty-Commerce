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
	<link type="text/css" rel="stylesheet" href="css/TeamPage.css">
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
                        <a href="TeamPage.php" class="nav-link active">Team</a>
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
    <!--Team Page Starts-->
	
	
    <h1 class="header-team-page animate-left" id="top" style="margin-top: 13rem;">Team Members</h1>
    <?php
	$query = "select * from teampage";
	$runquery = mysqli_query($link , $query);

	$num = mysqli_num_rows($runquery);

	if($num>0)
	{
		while($team_page = mysqli_fetch_array($runquery))
		{
	?>
    
		<section>
        <div class="container">
            <div class="card-wrapper">
			    <div class="row">
				   <div class="col-md-6">
						<div class="card" style="margin-right: 30px;">  
						  <img src="images/cardbg2.jpg" class="card-img">
						  <img src="<?php echo $team_page['Image'];?>" alt="profile" class="profile">
						  <h1><?php echo $team_page['Name'];?></h1>
						  <p class="profession"><?php echo $team_page['Profession'];?></p>
						  <p class="about">
                          <?php echo $team_page['Roll'];?>
                          <?php echo $team_page['Section'];?>
                          <?php echo $team_page['Lab_Group'];?>
						  </p>
						  <a href="" class="btn">Contact <?php echo $team_page['NickName']?></a>
						  <ul class="social">
							  <li><a href="<?php echo $team_page['fb'];?>"><i class="fab fa-facebook-square"></i></a></li>
							  <li><a href="<?php echo $team_page['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a></li>
							  <li><a href="<?php echo $team_page['insta'];?>"><i class="fab fa-instagram"></i></a></li>
							  <li><a href="<?php echo $team_page['gmail'];?>"><i class="fas fa-envelope"></i></a></li>
						  </ul>
						</div>
				    </div>
				</div>	
            </div>
        </div> 
    </section>

    <?php
		}
		}
		include 'connection_end.php';
	?>
    <!--Team Page Ends-->
    <?php include 'footer.php';?>
                
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
  