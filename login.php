<?php
session_start();
if(!empty($_SESSION)){
	header('location:index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css">
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<script type="text/javascript">

	

	function validateForm() {
    var name = document.forms["form_reg"]["name"].value;
    var email = document.forms["form_reg"]["email"].value;
    var password = document.forms["form_reg"]["password"].value;
    if (name == null || name == "", email == null || email == "", password == null || password == "") {
      alert("Please Fill All Required Field");
      return false;
    }
  }
</script>

<body id="background">
	<nav class="navbar">
		<a href="index.php" class="navbar-brand" ><h1  style="color: black;">Notes</h1></a>
	</nav>
	<div class="container mt-5">
		<div class="row mt-5">
			<div class="col-md-8 mt-5">
				<h2 class="font-large text-black">“A writer is a person for whom writing is more difficult than it is for other people.” ~Thomas Mann</h2>
				<span style="font-size: 70px;padding: 270px;"><i class="fa fa-pencil" aria-hidden="true"></i></span>
			</div>
			<div class="col-md-4">
				<div class="card" style="background-color: #FAFFD1;">
					<div class="card-body log-card">
						<h2>login here</h2>
						<?php
							if(!empty($_GET)){
								if($_GET['err']==1){
									echo "<p class='succ_fail_hint' style='color: green;'>Registration Successful</p>";
								}
								if($_GET['err']==2){
									echo "<p class='succ_fail_hint' style='color: red;'>Registration Failed</p>";
								}
								if($_GET['err']==3){
									echo "<p class='succ_fail_hint' style='color: red;'>Incorrect email/password</p>";
								}
							}
						?>
						<form name="form_login" action="login_validation.php" method="POST">
							<label>Email:</label><br>
							<input type="email" name="email" class="form-control"><br>
							<label>Password</label><br>
							<input type="password" name="password" class="form-control"><br>
							<input type="submit" name="" value="login" class="btn btn-btn btn-block text-black">
						</form>
						<p style="padding: 20px;padding-bottom: 0px;">Not a member? <a style="text-decoration: none; padding: 10px;padding-bottom: 0px;" href="#" data-toggle="modal" data-target="#signUpModal">
  						Sign Up</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">SignUp</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;	</span>
        			</button>
      			</div>
      			<div class="modal-body">
		        	<form name="form_reg" action="reg_validation.php" method="POST" onsubmit="return validateForm()">
		        		<label>Name:</label><br>
						<input type="text" name="name" class="form-control">
						<label>Email:</label><br>
						<input type="email" name="email" class="form-control">
						<label>Password</label><br>
						<input type="password" name="password" class="form-control"><br>
						<input type="submit" name="" value="signup" class="btn btn-btn btn-block text-black">
					</form>
		      	</div>
    		</div>
  		</div>
	</div>

</body>
</html>