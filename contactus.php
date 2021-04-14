<!DOCTYPE html>

<?php
session_start();
include 'connection_start.php';

$error = '';
$name = '';
$email = '';
$message = '';

function clean_text($string)
{
$string = trim($string);
$string = stripslashes($string);
$string = htmlspecialchars($string);
return $string;
}

if(isset($_POST["submit"]))
{
	
	if(empty($_POST["user_name"]))
	{
		$error .= '<p><label class="text-danger">Name Is Not Given</label></p>';
	}
	else
	{
	$name = clean_text($_POST["user_name"]);
	if(!preg_match("/^[a-zA-Z ]*$/",$name))
	{
		$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
	}
	}
	if(empty($_POST["user_email"]))
	{
		$error .= '<p><label class="text-danger">Email Is Not Provided</label></p>';
	}
	else
	{
		$email = clean_text($_POST["user_email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$error .= '<p><label class="text-danger">Invalid email format</label></p>';
	}
	}
	if(empty($_POST["message"]))
	{
		$error .= '<p><label class="text-danger">Message Is Not Written</label></p>';
	}
	else
	{
		$message = clean_text($_POST["message"]);
    }
	
	
	
    if($error==''){
		
	    $sqlInsert = "INSERT INTO usercontact (Email,Name,Message)
		VALUES ('".$email."','".$name."','".$message."')";
		header('Location:http://localhost/Crafty%20Commerce/index.php');
		echo '<script>alert("Message Sent!")</script>';
		$resultInsert = mysqli_query($link,$sqlInsert);
		$lastNumberInsert = mysqli_query($link);
		
	}
}

include 'connection_end.php';


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
                        <a href="index.php" class="nav-link">Home</a>
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
    
	<div class="title" id="top">
	  <div class="container">
	    <h2 class="sub-headline">
            <span class="first-letter">C</span>rafty Commerce            
        </h2>
	  </div>
	</div>
	
	
	  <div class="container">
	    <h1 style="text-align: center; font-size: 50px ; margin-bottom: 50px;">Contact Us</h1>
	    <div class="secondaryblock2" style="margin-bottom: 100px; margin-top: 50px; box-shadow: 5px 5px 15px #8a8383;">
					<form action="" method="POST">
						<?php echo $error;?>
						<div class="form-group mb-3">
						   <label style="color:#ffffff">Email:</label> 
						   <input type="email" placeholder="Enter your email" name="user_email" value="" class="form-control" style="height: 30px;"/> 
						</div>
						<div class="form-group mb-3">
						  <label style="color:#ffffff">Name:</label>
						  <input type="text" placeholder="Enter your name" name="user_name" value="" class="form-control" style="height: 30px;"/>
						</div>
						<div class="form-group mb-3">
						  <label style="color:#ffffff">Message:</label>
						  <textarea name="message" placeholder="Enter your message" class="form-control"></textarea>
						</div>
						<div class="form-group mb-3">
						  <input name="submit" type="submit" value="Send" class="btn btn-success"  style=" font-size: 13px;display: block; margin:auto; height: 30px; margin-top: 20px;"/>
						</div>
					 </form>
		</div>
	  </div>
	
	
	<?php include 'footer.php';?>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
