<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<div class="container h-100" style="margin-top: 40px;">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center" style="margin-bottom: 10px;">
						<img src="img/logo.png" alt="logo" style="width: 140px; height: 140px;">
					</div>

					<div class="card shadow-lg">
						<div style="padding: 20px 50px 0px 50px; border-top: 5px solid #236712; border-radius: 5px;">

							<h1 class="fs-4 card-title fw-bold mb-4" style="text-align: center">Task Management System</h1>

							<form method="GET" action="{{ route('loginVerify') }}">
							@csrf
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
									<button type="submit" name="submit-btn" class="submit-btn">Login</button>
								</div>
								<p class="ms-auto" style="font-size: 15px; text-align: center; margin-top: 20px;"><a href="{{ route('forgot-password') }}" class="forgot-a">Forgot Password</a></p>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center" style="font-size: 15px;">
								Don't have an account? <a href="{{ route('register') }}" class="text-dark create-a">Create One</a>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center text-muted" style="margin-bottom: 40px; margin-top: 40px;">
					Task Management System &copy; 2023-2024 &mdash; Notre Dame of Marbel University
				</div>
			</div>
		</div>
	</div>
</body>
	<script>
		history.pushState(null, null, location.href);
			window.onpopstate = function(event) {
				window.location.href = '{{ route('register') }}';
			};
	</script>
</html>
