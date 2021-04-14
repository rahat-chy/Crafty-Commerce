<?php
session_start();
include 'connection_start.php';

$error = '';
$name = '';
$email = '';
$contact = '';
$pass = md5('');
$conpass= md5('');

//echo $_SESSION['user_data']['userid'];

function clean_text($string)
{
$string = trim($string);
$string = stripslashes($string);
$string = htmlspecialchars($string);
return $string;
}


if(isset($_POST["update"]))
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
	if(empty($_POST["user_contact"]))
	{
	$error .= '<p><label class="text-danger">ContactNo Is Not Given</label></p>';
	}
	else
	{
	$contact = clean_text($_POST["user_contact"]);
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
	  
	  $userData = array(
					 "userid" => $_SESSION['user_data']['userid'],
					 "username" => $name,
					 "useremail" => $email,
					 "userphone" => $contact,
					  "userimage" => $_SESSION['user_data']['userimage']
					);
	$_SESSION['user_data'] = $userData;
	header('Location:http://localhost/Crafty%20Commerce/UserProfile.php');
    $query = "UPDATE users SET Name = '".$name."', Phone='".$contact."',Email='".$email."',Password='".md5($pass)."' WHERE ID = ".$_SESSION['user_data']['userid'] ; 
    $result= mysqli_query($link,$query) or die(mysqli_error($link));
    $no_of_data = mysqli_num_rows($resultCheck);
     

    }
  }
  

  include 'connection_end.php'; 
?>

<!doctype html>
<html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crafty Commerce</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/UpdateProfile.css">
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
                     <a href="UserProfile.php" class="nav-link active">User Profile</a>
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

 <section id="top">
        <div class="wrapper" >
          <h1 class="header-team-page animate-left" style="margin-top: 13rem; margin-bottom: 8rem;">USER PROFILE UPDATE</h1>
            <div class="contact-form">
              <div class="input-fields">
                <form action="upload.php" method="POST" enctype="multipart/form-data"> 
                 <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" />
                 <input type="file" class="text-center center-block file-upload" name="file">  
				 <button type="submit" name="submit">UPLOAD</button>
                </form>
				<?php echo $error; ?>
				<form action="" method="POST" enctype="multipart/form-data"> 
                  <div class="form-group" style="border: 2px black;">
                    <div class="col-xs-6">
                      <label for="name"><h2>Name</h2></label>
                      <input type="text" class="form-control" name="user_name" placeholder="Enter Your Name">
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                       <label for="phone"><h2>Phone</h2></label>
                       <input type="text" class="form-control" name="user_contact" placeholder="Enter Contact Number">
                      </div>
                  </div>
                 <div class="form-group">
                    <div class="col-xs-6">
                      <label for="email"><h2>Email</h2></label>
                      <input type="email" class="form-control" name="user_email" placeholder="you@email.com">
                    </div>
                 </div>
                 <div class="form-group">
                     <div class="col-xs-6">
                      <label for="password"><h2>Password</h2></label>
                      <input type="password" class="form-control" name="user_password" placeholder="password">
                    </div>
                </div>
                <div class="form-group" style="border: 2px black;">
                   <div class="col-xs-6">
                     <label for="password2"><h2>Verify</h2></label>
                     <input type="password" class="form-control" name="user_confirmpassword" placeholder="confirm password">
                  </div>
               </div>
               <div class="form-group">
                <div class="col-xs-6">
                    <br>
                    <button class="btn btn-lg btn-success" name="update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                    <button class="btn btn-lg" type="reset" value="Reset" style="background-color: firebrick;"><i class="glyphicon glyphicon-repeat"></i>Reset</button>
               </div>
			   </div>
            </form>
             </div>	
           </div>    
     </div>
</section>
     
<?php include 'footer.php'; ?>

<script src="js/main.js"></script>
<script src="js/UpdatePhoto.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>