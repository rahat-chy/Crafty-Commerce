<!DOCTYPE html>
<?php
session_start();
include 'connection_start.php';

$error = '';
$email = '';
$pass = md5('');

if(isset($_POST["submit"]))
{
    if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
	{
		$error .= '<p><label class="text-danger">Please insert Email and Password!</label></p>';
	}
	else{
	$email = $_POST["user_email"];
	$pass = md5($_POST["user_password"]);
	$sql = "SELECT * FROM users WHERE  Email='".$email."'"; 
	$result= mysqli_query($link,$sql) or die(mysqli_error($link));

	$no_of_data = mysqli_num_rows($result);

		if($no_of_data){
			while($row=mysqli_fetch_assoc($result)){
				if($row['Password']==$pass){
					$userData = array(
					 "userid" => $row['ID'],
					 "username" => $row['Name'],
					 "useremail" => $row['Email'],
					 "userphone" => $row['Phone'],
					 "userimage" => $row['Image']
					);
					$_SESSION['user_data'] = $userData;
					header('Location:http://localhost/Crafty%20Commerce/index.php');
				}elseif($row['Password']!=$pass){
					$error .= '<p><label class="text-danger">Wrong Email or Password!</label></p>';
				}
			}

		}
		else
		{
			$error .= '<p><label class="text-danger">Wrong Email or Password!</label></p>';
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                        <a href="login.php" class="nav-link active">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="AboutUs.php" class="nav-link">About Us</a>
                    </li>
                    
                </ul>
          </nav>  
       </div>   
    </header>
    <!--Header Ends-->
    
	<!-- Login Starts -->
	 <div class="container-fluid" id="top">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="title">
                       <div class="container">
                            <h2 class="sub-headline-extra">
                                  <span class="first-letter">C</span>rafty Commerce            
                            </h2>
                        </div>
                    </div>
					<div class="heading mb-3">
						<h4>Login into your account</h4>
					</div>
				<form method="POST">
				<?php echo $error;?> 
					<div class="form-input">
		 				<span><i class="fa fa-envelope"></i></span>
							<input name="user_email" type="email" placeholder="Email Address" required>
					</div>
					<div class="form-input">
						<span><i class="fa fa-lock"></i></span>
							<input name="user_password" type="password" placeholder="Password" required>
					</div>
					<div class="row mb-3">
						<div class="col-6 d-flex">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Remember me</label>
							</div>
						</div>
					</div>
                        <div class="text-left mb-3">
							<button name="submit" type="submit" class="btn">Login</button>
						</div>
                        <div class="text-white">Don't have an account?
							<a href="signup.php" class="register-link">Sign Up here</a>
						</div>
		 		</form>
		      </div>
		    </div>
               <div class="col-lg-6 col-md-6 image-container"></div>
		</div>
	  </div>
    <!--Login Ends-->
	
	
	
	<?php include 'footer.php';?>

  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
