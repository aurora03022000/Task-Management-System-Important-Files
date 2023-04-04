<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forgot Password Email Verification</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="overflow: hidden">

	<!-- Display Successful message upon submitting -->
	@if(session('directToDashboard') == 'yes')
		<p style="text-align: center; width: 100%; padding: 30px 20px; font-size: 15px; color: green">
			Logged in successfully
		</p>
		<script>
			setTimeout(function() {
				window.parent.location = '{{ route('dashboard') }}';
			}, 1500);
		</script>
	@endif
	<!-- Display Successful message upon submitting -->

	<div id="sub-div" style="margin-left: 0px; padding: 20px 50px 0px 50px; position: relative; overflow: hidden">

		<!-- Display div none after submitting -->
		@if(session('directToDashboard') == 'yes')
			<script>
				$("#sub-div").css({
					"display": "none"
				});
			</script>
		@endif
		<!-- Display div none after submitting -->

        <form id="form-id" method="GET" action="{{ route('loginVerify') }}">
			@csrf
			<h1 class="fs-4 card-title fw-bold mb-4" style="text-align: center">Task Management System</h1>

				@error('errorCredentials')
					<p class="error">{{ $errors->first('errorCredentials') }}</p>
				@enderror
							
				<div style="margin-bottom: 10px;">
					<div style="position: relative;">
							<input id="username" oninput="getInputValues()" type="text" class="input-username" name="username" placeholder="Username" value="" required autofocus>
					</div>
				</div>

				<div class="mb-3">
					<div style="position: relative;">
						<input id="password" oninput="getInputValues()" type="password" class="input-password" placeholder="Password" name="password" required>
					</div>
				</div>

				<script>
					function getInputValues(){
						const username = document.getElementById('username').value;
						const password = document.getElementById('password').value;
												
						localStorage.setItem('username', username);
						localStorage.setItem('password', password);
					}
				</script>

				@error('errorCredentials')
					<script>
						const usernameValue = localStorage.getItem('username');
						const passwordValue = localStorage.getItem('password');
													
						const username = document.getElementById('username').value = usernameValue;
						const password = document.getElementById('password').value = passwordValue;

						$(".input-username").css({
							"border": "1px solid red"
						});

						$(".input-password").css({
							"border": "1px solid red"
						});
					</script>					
				@enderror
									
				<p class="form-text text-muted" style="font-size: 14px; margin-top: 10px; margin-bottom: 30px;">All fields are requried</p>

				<div class="d-flex align-items-center" style="margin-top: -10px;">
					<button  onclick="blurBackground()"  type="submit" name="submit-btn" class="submit-btn">Login</button>
				</div>
				
				<p class="ms-auto" style="font-size: 15px; text-align: center; margin-top: 20px;"><a href="#" id="forgot-a" class="forgot-a">Forgot Password</a></p>
			</form>

            <!-- Error Connection Alert -->
			@error('erroConnection')
				<script>
					alert('{{ $errors->first('erroConnection') }}');
					window.location.href = '{{ route('login-verify-credential') }}';
				</script>
			@enderror
			<!-- Error Connection Alert -->

            <div id="loading-main-div" class="loading-main-div"></div>
	</div>

	<script>
		var anchor = document.getElementById("forgot-a");
		anchor.addEventListener("click", function(event) {
			event.preventDefault();
			window.parent.location = '{{ route('forgot-password') }}';
		});

		function blurBackground(){
			const username = document.getElementById("username").value;
            const usernameValue = localStorage.setItem('username', username);
			const password = document.getElementById("password").value;
            const passwordValue = localStorage.setItem('password', password);

			if(username.length > 0 || password.length > 0){
				const username = document.getElementById("username");
				const password = document.getElementById("password");
				username.blur();
				password.blur();

				$(".loading-main-div").css({
					"display": "block"
				});
			}
		}

        @if(!$errors->has('errorCredentials'))
            $('#form-id').addClass('slide-in-left');
            setTimeout(function() {
                $('#form-id').removeClass('slide-in-left');
            }, 500);
        @endif

        function resizeIframe() {
            var iframe = document.getElementById("iframe");
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }
	</script>
</body>
</html>