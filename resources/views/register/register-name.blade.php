<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register Name</title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="overflow: hidden">
	<div style="margin-left: 0px; padding: 25px 50px 10px 50px; ">

		<form id="form-id" action="{{ route('backRegisterEmail') }}">
		@csrf
			<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

			<!-- Error Connection Alert -->
			@error('erroConnection')
				<script>
					alert('{{ $errors->first('erroConnection') }}');
					window.location.href = '{{ route('register-name') }}';
				</script>
			@enderror
			<!-- Error Connection Alert -->

			<input id="hidden_id_number" type="hidden" name="hidden_id_number" value="" required autofocus>

			<div class="mb-3">
				<input id="first_name" type="text" class="input_first_name" placeholder="First Name" name="first_name" value="" required autofocus>
			</div>
			<div class="mb-3">
				<input id="middle_name" type="text" class="input_middle_name" placeholder="Middle Name" name="middle_name" value="" autofocus>
			</div>
			<div class="mb-3">
				<input id="last_name" type="text" class="input_last_name" placeholder="Last Name" name="last_name" value="" required autofocus>
			</div>
			<div class="mb-3">
				<input id="suffix" type="text" class="input_suffix" placeholder="Suffix" name="suffix" value="" autofocus>
			</div>
	
			<p class="form-text text-muted mb-3">
				Please enter your name
			</p>
	
			<button type="submit" onclick="blurBackground()" class="submit-btn">
				Next
			</button>
		</form>

		<div id="loading-main-div" class="loading-main-div">
		</div>

	</div>
	<script>
		function blurBackground(){
			const firstNameValue = document.getElementById("first_name").value;
			const middleNameValue = document.getElementById("middle_name").value;
			const lastNameValue = document.getElementById("last_name").value;
			const suffixValue = document.getElementById("suffix").value;

			localStorage.setItem('firstNameValue', firstNameValue);
			localStorage.setItem('middleNameValue', middleNameValue);
			localStorage.setItem('lastNameValue', lastNameValue);
			localStorage.setItem('suffixValue', suffixValue);


			if(firstNameValue.length > 0 && lastNameValue.length > 0){
				const firstName = document.getElementById("first_name");
				const lastName = document.getElementById("last_name");

				firstName.blur();
				lastName.blur();
				
				$(".loading-main-div").css({
					"display": "block"
				});
			}
		}
		
		history.pushState(null, null, location.href);
		window.onpopstate = function(event) {
			$(".loading-main-div").css({
					"display": "block"
			});

			window.location.href = '{{ route('backPressedRegisterID') }}';
		};

		@if(session('backRegisterName') == 'no')
			$('#form-id').addClass('slide-in-left');
				setTimeout(function() {
					$('#form-id').removeClass('slide-in-left');
				}, 500);	

		@elseif(session('backRegisterName') == 'yes')
			$('#form-id').addClass('slide-out-back');
				setTimeout(function() {
					$('#form-id').removeClass('slide-out-back');
				}, 500);	
		@endif
	</script>
</body>
</html>