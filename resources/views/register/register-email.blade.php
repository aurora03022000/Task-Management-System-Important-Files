
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register Email</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
</head>

<body id="body" style="overflow: hidden">

	<!-- Display Successful message upon submitting -->
	@if(session('directToLogin') == 'yes')
		<p style="text-align: center; width: 100%; padding: 30px 20px; font-size: 15px; color: green">
			Registered successfully
		</p>
		<script>
			setTimeout(function() {
				window.parent.location = '{{ route('login') }}';
			}, 2000);
		</script>
	@endif
	<!-- Display Successful message upon submitting -->

	<div id="sub-div" style="margin-left: 0px; padding: 25px 50px 10px 50px; ">

		<!-- Display div none after submitting -->
		@if(session('directToLogin') == 'yes')
			<script>
				$("#sub-div").css({
					"display": "none"
				});
			</script>
		@endif
		<!-- Display div none after submitting -->
	
		<form method="POST" id="form-id" action="{{ route('insertEmployeeInformation') }}">
		@csrf
			<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

			<!-- Error Connection Alert -->
			@error('erroConnection')
				<script>
					alert('{{ $errors->first('erroConnection') }}');
				</script>
			@enderror
			<!-- Error Connection Alert -->

			<input id="hidden_id_number" type="hidden" name="hidden_id_number" value="" required autofocus>
			<input id="hidden_first_name" type="hidden" name="hidden_first_name" value="" required autofocus>
			<input id="hidden_middle_name" type="hidden" name="hidden_middle_name" value="" required autofocus>
			<input id="hidden_last_name" type="hidden" name="hidden_last_name" value="" required autofocus>
			<input id="hidden_suffix" type="hidden" name="hidden_suffix" value="" required autofocus>

			<div class="mb-3">
				<input id="email" type="text" class="input_email" placeholder="Email Address" name="email" value="" required autofocus>
			</div>
	
			<p class="form-text text-muted mb-3">
				Please enter your Email Address
			</p>
	
			<button onclick="blurBackground()" type="submit" id="register-btn" class="submit-btn">
				Register
			</button>
		</form>

		<div id="loading-main-div" class="loading-main-div"></div>
	</div>
	<script>
		const idNumber = document.getElementById('hidden_id_number').value = localStorage.getItem('id-number');
		const firstName = document.getElementById('hidden_first_name').value = localStorage.getItem('firstNameValue');
		const middleName = document.getElementById('hidden_middle_name').value = localStorage.getItem('middleNameValue');
		const lastName = document.getElementById('hidden_last_name').value = localStorage.getItem('lastNameValue');
		const suffix = document.getElementById('hidden_suffix').value = localStorage.getItem('suffixValue');

		function blurBackground(){
			const emailValue = document.getElementById("email").value;

			if(emailValue.length > 0){
				const email = document.getElementById("email");
				email.blur();

				$(".loading-main-div").css({
					"display": "block"
				});
			}
		}

		history.pushState(null, null, location.href);
		window.onpopstate = function(event) {
			window.location.href = '{{ route('backPressedRegisterName') }}';
		};

		@if(session('backRegisterEmail') == 'no')
			$('#form-id').addClass('slide-in-left');
				setTimeout(function() {
					$('#form-id').removeClass('slide-in-left');
				}, 500);	

		@elseif(session('backRegisterEmail') == 'yes')
			$('#form-id').addClass('slide-out-back');
				setTimeout(function() {
					$('#form-id').removeClass('slide-out-back');
				}, 500);	
		@endif
	</script>
</body>
</html>