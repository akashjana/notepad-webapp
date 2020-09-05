<?php
session_start();

$conn = mysqli_connect("localhost","root","","notePad");
//print_r($_SESSION);
$user_id = $_SESSION['user_id'];
//echo $user_id;
if(empty($_SESSION)){
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>edit</title>


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
	
	$(document).ready(function(){

		//alert("aaaaaaaaa");
		$('.edit').click(function(){
			//var text_note =$(this).data('text-note');
			var text_id =$(this).data('text-id');
			var text_note =$(this).data('text-note');
			//alert(text_note);
			$('#text_note').val(text_note);

			
			//alert(text_id);
			$('#text_id').val(text_id);
			
			$('#exampleModalLong_edit').modal('show');
		});
		$('.delete').click(function(){
			var text_id =$(this).data('text-id');
			$.ajax({
				url:'delete_note.php?text_id='+text_id,
				success: function(response){

				},
				error: function(){
					alert("Unable to delete.");
				}
			});
		});
	});
</script>

<body >
	<nav class="navbar" id="background">
		<a href="index.php" class="navbar-brand" ><h3  style="color: black;">Notes</h3></a>
		<span style="float: right;"><h5 style="display: inline;font-size: 20px;" class="text-black"><?php echo $_SESSION['user_name']; ?></h5>&emsp;<a id="logout_btn" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></span>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="card mt-3 ">
					<div class="card-body" style="padding: 0px;">
						<a data-toggle="modal" data-target="#exampleModalLong_new" class="btn btn-btn btn-block text-black" href=""><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Create new</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-12">
				<?php
					$query = "SELECT * FROM user_text WHERE user_id=$user_id";

					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_assoc($result)) {
						//$text_id=$row['text_id'];
						//echo $row['text_id'];
						$text_note=$row['text_note'];
						echo '<div class="card mb-2">
								<div class="card-body" style="padding:8px;">
									<p>'.$text_note.'</p><hr style="margin:0px;">
									<span style="float:right;"><a href="#" class="edit" data-text-note="'.$text_note.'" data-text-id="'.$row['text_id'].'"  style="font-size: 20px;color:#26ffba;text-decoration:none;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									</a>
									&emsp;
									<a onClick="window.location.reload()" href="#" data-text-id="'.$row['text_id'].'" class="delete" style="font-size: 20px;color:#26ffba;text-decoration:none;">
									<i class="fa fa-trash-o" aria-hidden="true"></i></a></span>
								</div>
							</div>
							
							';
					}
				?>
			</div>
			
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLongTitle">Write Something Here</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<form action="create_new.php" method="POST">
        				<textarea class="form-control" rows="5" name="text"></textarea><br>
        				<input  type="submit" name="" class="btn btn-btn btn-block text-black">
        			</form>
	      		</div>
	      		
	    	</div>
	  	</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLongTitle">Write Something Here</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<form action="edit.php" method="POST" >
	      				<input type="hidden" name="text_id" id="text_id">
						<textarea  id='text_note' class="form-control" rows="5" name="text" >hello</textarea><br>
        				<input  type="submit" name="" class="btn btn-btn btn-block text-black">
        			</form>
	      		</div>
	      		
	    	</div>
	  	</div>
	</div>
		
</body>
</html>