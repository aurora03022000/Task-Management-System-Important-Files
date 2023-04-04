<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "task_management_system";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link rel="stylesheet" href="css/register.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="overflow: hidden">
	
	<div style="margin-left: 0px; padding: 25px 50px 10px 50px; position: relative; overflow: hidden">
		
		<form id="form-id" method="POST" >
			<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

			<div class="mb-3">
				<input id="id-number" type="text" class="input_ID" placeholder="ID Number" name="id-number" value="" required autofocus>
			</div>
	
			<p class="form-text text-muted mb-3">
				Please enter your ID Number
			</p>
	
			<button type="submit" name="verify" id="verify" class="submit-btn">
				Verify
			</button>

			<script>
				
			</script>
		</form>


		<div id="loading-main-div" class="loading-main-div">
			<div id="loading-div" class="loading-div">
			</div>
	
			<div class="loading-bar">
				<img src="img/loading.gif" style="width: 300px; height: 230px;"/>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#form-id").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: $(this).attr("action"),
				method: $(this).attr("method"),
				data: $(this).serialize(),
				beforeSend: function() {
					const idNumber = document.getElementById("id-number");
					idNumber.blur();
				},
				success: function(response) {
					
					if(response == "Error"){

					}

					else{
						$('#form-id').addClass('slide-out-right');
						setTimeout(function() {
							$('#form-id').removeClass('slide-out-right');
						}, 500);
					}

				},
				error: function(xhr, status, error) {
				},
				complete: function() {
				}

				});
			});
		});
	</script>

	<script src="js/login.js"></script>
</body>
</html>