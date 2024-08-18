<!DOCTYPE html>
<html>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <!-- <link rel="stylesheet" href="assets/css/bootstrap.theme.min.css">  
   <link rel="stylesheet" href="assets/css/custom.css">	-->
<?php
//session_start();
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
	
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
//include("include/login_header.php");

?>
<head>
<title>Index</title>
<style>
	.alert alert-denger
	{
		color:red;
	}
	</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
 
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
	
		<h1 style="color: white;text-shadow: 1px 1px 8px black;">Login here..</h1><br>
		
		<div class="header-main">
		<div style="padding-top:50px;padding-bottom:50px">
			<div class="main-icon">
				
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
            
				<!-- invalid user name and password -->
				<br>
			<?php if(isset($info)){ ?>
			  <h5 class="alert alert-danger"><?php 
			     
				echo $info;
				
				 ?></h5>
			  <?php } ?>
				<form action="#" method="post">		
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" placeholder="username" name="username"  required=""/>
					</div>
					<div class="icon1">
					<div class="form-group">
			  
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Password" name="admin_password"  required=""/>
	</div>
					</div>
					
			       <center>
					<div class="bottom">
						<button class="btn" type="submit" name="login_btn" class="btn btn-info pull-right">Log In</button>
					</div>
			</center>
			</div>
				</form>	
			</div>
		</div>
		
	</div>
</div>	
<!-- //main -->



</body>
</html>