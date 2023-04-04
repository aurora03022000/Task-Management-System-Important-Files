<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reset Password Error Request</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<div class="main-div">
		<div class="container h-100" style="margin-top: 40px;">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center" style="margin-bottom: 10px;">
						<img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 140px; height: 140px;">
					</div>
					<div class="card shadow-lg">
						<div id="sub-div" style="margin-left: 0px; padding: 20px 50px 10px 50px; position: relative; overflow: hidden">
							<p style="text-align: center; width: 100%; padding: 30px 20px; font-size: 15px; color: red;">
								Invalid request, please try again.
								<script>
									setTimeout(function() {
										window.parent.location = '{{ route('forgot-password') }}';
									}, 3000);
								</script>
							</p>
						</div>						
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Remember your password? <a href="{{ route('login') }}" class="login-a">Login</a>
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
</html>
