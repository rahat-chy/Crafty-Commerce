
<?php
session_start();
include 'connection_start.php';	

if(isset($_POST['addtocart']))
{
	if(isset($_SESSION['shoppingcart']))
	{
		$item_array_id = array_column($_SESSION['shoppingcart'],"item_id");
		if(!in_array($_GET['id'] , $item_array_id))
		{
			$count = count($_SESSION['shoppingcart']);
			$item_array = array(
		  'item_id' => $_GET['id'],
		  'item_name' => $_POST['hidden_name'],
		  'item_price' => $_POST['hidden_price'],
		  'item_quantity' => $_POST['quantity']
		   ); 
		   $_SESSION['shoppingcart'][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added!")</script>';
		}
	}
	else
	{
		$item_array = array(
		  'item_id' => $_GET['id'],
		  'item_name' => $_POST['hidden_name'],
		  'item_price' => $_POST['hidden_price'],
		  'item_quantity' => $_POST['quantity']
		);
		$_SESSION['shoppingcart'][0] = $item_array;
	}
}

?>

<!DOCTYPE html>

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
	<link type="text/css" rel="stylesheet" href="css/browseproducts.css">
</head>
<body style="height: 100%;  ">
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
	
	<section class="browseproductsBanner" id="top">
        
    </section>
	
	<div class="title">
        <div class="container">
            <h2 class="sub-headline-extra2 animation" style="color: green;">
                <span class="first-letter" >O</span>ur Products           
            </h2>
        </div>
    </div>
	
	<?php
	if(!isset($_SESSION['user_data'])){
	?>
	<h1  style="text-align: center; margin-top: 10px; margin-bottom: 100px; animation: scale 0.5s forwards;">Please Login to See All Products and Ordering Products</h1>
	<?php
	}
	?>
	
	<?php
	if(isset($_SESSION['user_data'])){
	$sql = "SELECT * FROM product"; 
	}
	else
	{
		$sql = "SELECT * FROM product WHERE Exclusive = 'Yes'"; 
	}
	$runquery= mysqli_query($link,$sql) or die(mysqli_error($link));
	$num = mysqli_num_rows($runquery);
	
	if($num>0)
	{
		while($product = mysqli_fetch_array($runquery)){
		
	
	?>
	
	<div class="container">
	<div class="bpMainblock" style="margin-bottom: 100px; box-shadow: 3px -3px 15px #8a8383;">
	   <div class="bpImageblock">
	     <img style="height: 100%;" class="productimage" src="<?php echo $product['Image']; ?>" />
	   </div>
	   <div class="bpTextblock" style="	padding: 10px; border: 5px solid orange;  background: #f2f2f2;">
	     <?php
		    if(!strcmp($product['Exclusive'],'Yes')){
		 ?>
		 <img src="images/exclusive.jpg" style="height:120px; width: 120px;" />
		 <?php
			}
		 ?>
	     <h1><?php echo $product['Name'];?></h1>
		 <p>Price: <?php echo $product['Price'];?> BDT</p>
		 <p>Category: <?php echo $product['Category']; ?></p>
		 <p>Availability: <?php echo $product['Availability']; ?></p>
		 
		 <form  style="margin-top: 50px;" action="product.php?action=add&id=<?php echo $product['ID']; ?>" method="POST">
		    <div class="form-group mb-3">
			     <input name="submit" type="submit" value="View Details" class="btn btn-success"  style=" font-size: 15px;display: block; margin:auto; height: 30px; margin-top: 20px;"/>
			</div>
		 </form>
		 <?php
		 if(isset($_SESSION['user_data']) && !strcmp($product['Availability'],'Yes')){
			 
		 ?>
		 <form  style="margin-top: 50px;" action="browseProducts.php?action=add&id=<?php echo $product['ID']; ?>" method="POST">
			<div class="form-group mb-3">
				 <input type="hidden" name="hidden_name" value="<?php echo $product['Name']; ?>">
			</div>
			<div class="form-group mb-3">
				 <input type="hidden" name="hidden_price" value="<?php echo $product['Price']; ?>">
			</div>
			<div class="row">
			  <div class="col-md-6">
			   <div class="form-group mb-3">
			    <input type="text" name="quantity" placeholder="Enter Quantity" class="quan" >
				</div>
			  </div>
			  <div class="col-md-6">
			     <div class="form-group mb-3">
			    <input name="addtocart" type="submit" value="Add to Cart" class="btn btn-success addc" >
				</div>
			  </div>
			</div>
		  </form>
		 <?php
		 }
		 ?>
	   </div>
	</div>
    </div>
	
	<?php
	
	
	}
	}
	?>
	
	<h3 style="margin-bottom: 30px; color: green; text-align: center; font-size: 50px;">Your Cart</h3>
	<div  style="font-size: 30px; margin-bottom: 100px;">
	   <table class="table table-bordered">
         <tr>
		    <th width="40%">Name</th>
			<th width="20%">Quantity</th>
			<th width="20%">Price per Unit</th>
			<th width="20%">Total Price</th>
		 </tr>
		 <?php
		    if(!empty($_SESSION['shoppingcart']))
			{
				$total = 0;
				foreach($_SESSION['shoppingcart'] as $keys => $values)
				{
		?>
        <tr>
		   <td><?php echo $values['item_name']; ?></td>
		   <td><?php echo $values['item_quantity']; ?></td>
		   <td><?php echo $values['item_price']; ?></td>
		   <td><?php echo number_format($values['item_quantity'] * $values['item_price'] , 2) ?></td>
		</tr>
        <?php		
		           $total = $total + ($values['item_quantity'] * $values['item_price']);
				}
		?>
		<tr>
		  <td colspan="3" align="right">Total</td>
		  <td align="right"><?php echo number_format($total,2); ?> BDT</td>
		  
		</tr>
		<?php
			}
		 ?>
       </table>	 
	</div>
	
	<?php
	 include 'footer.php'; 
	 
	 ?>
    
	
  <script src="js/main.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>