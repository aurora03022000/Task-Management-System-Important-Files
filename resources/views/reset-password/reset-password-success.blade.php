<?php
	if(isset($_GET["token"])){
		$token = $_GET['token']; ?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>Reset Password Success</title>
			<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
			<link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<meta http-equiv="X-Frame-Options" content="allow-from {{ route('reset-password') }}">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		</head>

		<script>
			if (window.self === window.top) {
				window.parent.location = '{{ route('reset-password', ['token' => $token]) }}';
			}
		</script>

		<body style="overflow: hidden">

			<!-- Display Successful message upon submitting -->
			@if(session('successReset') == 'yes')
				<p style="text-align: center; width: 100%; padding: 30px 20px; font-size: 15px; color: green">
					Password reset successfully
				</p>
				
				<script>
					setTimeout(function() {
						window.parent.location = '{{ route('login') }}';
					}, 2000);
				</script>
			@endif
			<!-- Display Successful message upon submitting -->

			<div id="sub-div" style="margin-left: 0px; padding: 20px 50px 10px 50px; position: relative; overflow: hidden">

				<!-- Display div none after submitting -->
					@if(session('successReset') == 'yes')
						<script>
							$("#sub-div").css({
								"display": "none"
							});
						</script>
					@endif
				<!-- Display div none after submitting -->

					<form id="form-id" method="POST" class="form-id" action="{{ route('resetPassword', ['token' => $token]) }}">
						@csrf
						<h1 class="fs-4 card-title fw-bold mb-4">Reset Password</h1>

						<p style="display: none" id="error" class="error"></p>

						<div style="margin-bottom: 10px;">
							<input id="new_password" type="password" class="input-new-password" placeholder="New password" name="new_password" value="" required autofocus>
						</div>

						<div class="mb-3">
							<input id="confirm_new_password" type="password" class="input-comfirm-new-password" placeholder="Confirm new password" name="confirm_new_password" value="" required autofocus>
						</div>

						<p class="form-text text-muted mb-3">
							Please enter your new password to reset
						</p>

						<div class="d-flex align-items-center">
							<button type="submit" onclick="blurBackground()" name="send-btn" class="submit-btn">Reset</button>
						</div>
					</form>

					<!-- Error Connection Alert -->
					@error('erroConnection')
						<script>
							alert('{{ $errors->first('erroConnection') }}');
							window.location.href = '{{ route('forgot-password') }}';
						</script>
					@enderror
					<!-- Error Connection Alert -->

					<div id="loading-main-div" class="loading-main-div"></div>
			</div>

			<script>
				function blurBackground(){
					const newPasswordValue = document.getElementById("new_password").value;
					const confirmNewPasswordValue = document.getElementById("confirm_new_password").value;

					if(newPasswordValue.length > 0 && confirmNewPasswordValue.length > 0){
						const newPassword = document.getElementById("new_password");
						const confirmNewPassword = document.getElementById("confirm_new_password");
						newPassword.blur();
						confirmNewPassword.blur();

						$(".loading-main-div").css({
							"display": "block"
						});

						if(newPasswordValue != confirmNewPasswordValue){
							const form = document.getElementById('form-id');
							form.addEventListener('submit', function(event) {
							event.preventDefault();
							});

							$(".loading-main-div").css({
								"display": "none"
							});

							const error = document.getElementById('error').innerHTML = "Password did not matched";
								
							$(".error").css({
								"display": "block"
							});
							$("#new_password").css({
								"border": "1px solid red"
							});
							$("#confirm_new_password").css({
								"border": "1px solid red"
							});

							const newPassword = document.getElementById('new_password');
							newPassword.focus();

							var height = document.documentElement.scrollHeight;

							// Send a message to the parent window with the height
							window.parent.postMessage({
								height: height
							}, '*');
						}

						else{
							if(newPasswordValue.length < 6){
								const form = document.getElementById('form-id');
								form.addEventListener('submit', function(event) {
								event.preventDefault();
								});

								$(".loading-main-div").css({
									"display": "none"
								});

								const error = document.getElementById('error').innerHTML = "Password must be atleast 6 characters in length";
									
								$(".error").css({
									"display": "block"
								});
								$("#new_password").css({
									"border": "1px solid red"
								});
								$("#confirm_new_password").css({
									"border": "1px solid red"
								});

								const newPassword = document.getElementById('new_password');
								newPassword.focus();

								var height = document.documentElement.scrollHeight;

								// Send a message to the parent window with the height
								window.parent.postMessage({
									height: height
								}, '*');
							}

							else{
								const form = document.getElementById('form-id');
								form.addEventListener('submit', function(event) {
								form.submit();
								});
							}
						}
						
					}
				}

				@if(session('success') != 'yes')
					@if (!$errors->has('errorEmail'))
						$('#form-id').addClass('slide-in-left');
							setTimeout(function() {
								$('#form-id').removeClass('slide-in-left');
							}, 500);
					@endif
				@endif
			</script>
		</body>
		</html>

	<?php }

	else{ ?>
		<script>
			window.parent.location = '{{ route('forgot-password') }}';
		</script>
	<?php }
?>