<!DOCTYPE html>
<?php

include 'connection_start.php';

$error = '';
$name = '';
$email = '';
$contact = '';
$pass = md5('');
$conpass= md5('');

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
	if(empty($_POST["user_phone"]))
	{
	$error .= '<p><label class="text-danger">ContactNo Is Not Given</label></p>';
	}
	else
	{
	$contact = clean_text($_POST["user_phone"]);
	}
	if(empty($_POST["user_password"]))
	{
	$error .= '<p><label class="text-danger">Password Is Not Written</label></p>';
	}
	else if(empty($_POST["user_confirmpassword"]))
	{
		$error .= '<p><label class="text-danger">Confirm Password Is Not Written</label></p>';
	}
	else
	{
		$pass = clean_text($_POST["user_password"]);
		$conpass = clean_text($_POST["user_confirmpassword"]);
		if($pass!=$conpass)
		{
			$error .= '<p><label class="text-danger">Password and Confirm Password does not match!</label></p>';
		}
	}

    if($error==''){
	$sqlCheck = "SELECT * FROM users WHERE  Email='".$email."'"; 
	$resultCheck = mysqli_query($link,$sqlCheck);
	$no_of_data = mysqli_num_rows($resultCheck);



	if(!$no_of_data){
		$sqlInsert = "INSERT INTO users (Email,Name,Password,Phone)
		VALUES ('".$email."','".$name."','".md5($pass)."','".$contact."')";
		
		header('Location:http://localhost/Crafty%20Commerce/login.php');
		
		$resultInsert = mysqli_query($link,$sqlInsert);
	  

		$lastNumberInsert = mysqli_query($link);
	}
	else
	{
		$error .= '<p><label class="text-danger">User with this Email already exists!</label></p>';
	}
	
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
                        <a href="login.php" class="nav-link active">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link">About Us</a>
                    </li>
                </ul>
          </nav>  
       </div>   
    </header>
    <!--Header Ends-->
    
	<div class="title animate-right" id="top">
	  <div class="container">
	    <h2 class="sub-headline-extra3">
            <span class="first-letter">C</span>rafty Commerce            
        </h2>
	  </div>
	</div>
	
	<h2 style="margin-top: 100px; text-align:center;">Sign Up and Join Crafty Commerce Family</h2>
	  <div class="container">
	    <div class="secondaryblock" style="margin-bottom: 100px; margin-top: 50px;">
			<form  action="" method="POST">
			<br />
		<?php echo $error;?> 
				<div class="form-group mb-3">
					<label>Email:</label> 
					<input type="email" placeholder="Enter your email" name="user_email" value="" class="form-control" style="height: 30px;"/> 
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group mb-3">
					<label>Name:</label>
					<input type="text" placeholder="Enter your name" name="user_name" value="" class="form-control" style="height: 30px;"/>
				</div>
				<div class="form-group mb-3">
					<label>Password:</label>
					 <input type="password" placeholder="Enter your password" name="user_password" value="" class="form-control" style="height: 30px;"/>
				</div>
			    <div class="form-group mb-3">
					<label>Confirm Password:</label>
					<input type="password" placeholder="Enter your password again" name="user_confirmpassword" value="" class="form-control" style="height: 30px;"/>
				</div>
				<div class="form-group mb-3">
					<label>Phone</label>
					<input type="tel" placeholder="Enter your phone" name="user_phone" value="" class="form-control" style="height: 30px;"/>
			    </div>
				<div class="form-group mb-3">
					 <input name="submit" type="submit" value="Sign Up" class="btn btn-success"  style=" font-size: 13px;display: block; margin:auto; height: 30px; margin-top: 20px;"/>
			    </div>
			</form>
		</div>
	  </div>
	
	
	<?php include 'footer.php';?>	
  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
