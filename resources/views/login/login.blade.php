<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<div class="h-100" style="margin-top: 40px;">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9" style="position: relative;">
					<div  class="text-center" style="margin-bottom: 10px;">
						<img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 140px; height: 140px;">
					</div>
					<div class="card shadow-lg" style="border-top: 5px solid #236712;">
						<iframe id="iframe" onload="resizeIframe()" onchange="resizeIframe()" src="{{ route('login-verify-credential') }}" style="width: 100%; border-top-right-radius: 5px; border-top-left-radius: 5px;"></iframe>
						<div class="card-footer py-3 border-0">
							<div class="text-center" style="font-size: 15px; ">
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
		function resizeIframe() {
			var iframe = document.getElementById("iframe");
			iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
		}

		// Listen for the message event from the iframe
		window.addEventListener('message', function(event) {
		// Check that the message is from the iframe
		if (event.source !== iframe.contentWindow) {
			return;
		}

		// Set the height of the iframe container
		iframe.style.height = event.data.height + 'px';
		});
	</script>
</html>