<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}
 ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curlytops</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="assets/images/logo1.png" type="image/jpeg"> 
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
			<a href="index.php" class="navbar-brand">
    <img src="assets/images/logo2.jpg" alt="Curlytops Logo" class="navbar-logo">
</a>

			
		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>₱</b></div>
					</div>
					<br><br>
					<div id='cartdetail'>
				
					</div>
					
					<div class="panel-footer">

					</div>
				</div>
				<button class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Checkout</button>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div>

			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>	
</body>
</html>