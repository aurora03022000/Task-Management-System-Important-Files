<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forgot Password Email Verification</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="overflow: hidden">

	<!-- Display Successful message upon submitting -->
	@if(session('success') == 'yes')
		<p style="text-align: center; width: 100%; padding: 30px 20px; font-size: 15px; color: green">
		    Password reset link sent successfully
        </p>
        
		<script>
			setTimeout(function() {
				window.parent.location = '{{ route('forgot-password') }}';
			}, 2000);
		</script>
	@endif
	<!-- Display Successful message upon submitting -->

	<div id="sub-div" style="margin-left: 0px; padding: 20px 50px 10px 50px; position: relative; overflow: hidden">

        <!-- Display div none after submitting -->
            @if(session('success') == 'yes')
                <script>
                    $("#sub-div").css({
                        "display": "none"
                    });
                </script>
            @endif
		<!-- Display div none after submitting -->

            <form id="form-id" method="GET" class="form-id" action="{{ route('verifyEmail') }}">
				@csrf
				<h1 class="fs-4 card-title fw-bold mb-4">Forgot Password</h1>

                <!-- Error Word -->
                @error('errorEmail')
                    <p class="error">{{ $errors->first('errorEmail') }}</p>
                @enderror
                <!-- Error Word -->

				<div class="mb-3">
					<input id="email" type="email" class="input-email" placeholder="Email Address" name="email" value="" required autofocus>
				</div>

                <!-- Error Word Input Border Color -->
                @error('errorEmail')
                    <script>
                        $(".input-email").css({
                            "border": "1px solid red"
                        });
                            
                        const emailValue = localStorage.getItem('emailValue');
                        const email = document.getElementById('email').value = emailValue;
                    </script>
                @enderror
                <!-- Error Word Input Border Color -->

                <p class="form-text text-muted mb-3">
                    Please enter your email for password reset link
                </p>

				<div class="d-flex align-items-center">
					<button type="submit" onclick="blurBackground()" name="send-btn" class="submit-btn">Send Link</button>
				</div>
			</form>

            <!-- Error Connection Alert -->
			@error('erroConnection')
				<script>
					alert('{{ $errors->first('erroConnection') }}');
					window.location.href = '{{ route('forgot-password-email-verify') }}';
				</script>
			@enderror
			<!-- Error Connection Alert -->

            <div id="loading-main-div" class="loading-main-div"></div>
	</div>

	<script>
		function blurBackground(){
			const email = document.getElementById("email").value;
			const emailValidity = document.getElementById("email");
            const emailValue = localStorage.setItem('emailValue', email);

			if(emailValidity.checkValidity()){
				const email = document.getElementById("email");
				email.blur();

				$(".loading-main-div").css({
					"display": "block"
				});
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

        function resizeIframe() {
            var iframe = document.getElementById("iframe");
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }
	</script>
</body>
</html>