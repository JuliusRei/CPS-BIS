<!DOCTYPE html>
<?php 
session_start();
session_destroy();
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Barangay San Isidro Galas, Quezon City</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap2.css" rel="stylesheet">
    <!--external css-->
    <link href="font-awesome/css/font-awesome2.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->


	  
	<div id="login-page">
	  	<div class="container">
	  	    
		    <form class="form-login" action="" method="POST">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User ID" name="user" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a href="" class="forgot_link">Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit" id="submit" name="btnsignin" value="Sign in"><i class="fa fa-lock"></i> SIGN IN</button>
					
		            <br>
		            
		           
		
		        </div>
		
		          <!-- Modal -->
		        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		            <div class="modal-dialog">
		                <div class="modal-content">
		                    <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                    </div>
		                      
		                </div>
		            </div>
		        </div>
		          <!-- modal -->
		
		    </form>	  	<br>
			  
			<div class="wrap">
				<div> <center>
					<button> <a href="index.php" class="back">Back to Home &gt;&gt;</a> </button>
				</div> </center>
			</div>
	
	  	
	  	</div>
	</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
	
<?php
session_start();
	
	if(isset($_POST['btnsignin'])){	
		require("connection.php");
		
		$num = 0;
		$strUsername = $_POST['user'];
		$strPassword = $_POST['password'];
				
		$sql = mysqli_query($con, "select `strUsername`, `strPassword`, `strOfficerFName` from tblaccount where strUsername = '$strUsername' and strPassword = '$strPassword'");
		
		$num = mysqli_num_rows($sql);
		$row = mysqli_fetch_array($sql);
		
		if($num > 0){
			if(isset($_SESSION['strUsername']))$_SESSION['strUsername'];
			if(isset($_SESSION['strPassword']))$_SESSION['strPassword'];
			if(isset($_SESSION['strOfficerFName']))$_SESSION['strOfficerFName'];
			
			$_SESSION['strUsername'] = $row['strUsername'];
			$_SESSION['strPassword'] = $row['strPassword'];
			
			$strUsername = $_SESSION['strUsername'];
			$strPassword = $_SESSION['strPassword'];
			$strOfficerFName = $row['strOfficerFName'];
				
			if($_SESSION['strUsername']=="admin")
			{
				if($_SESSION['strPassword'] == "admin")	{
					
					$url = "validitycheck.php";
					if (!headers_sent()) {
						header('Location: '.$url);
						exit;            }
						
														}
				
			}
					}
									}

?>


  </body>
</html>
