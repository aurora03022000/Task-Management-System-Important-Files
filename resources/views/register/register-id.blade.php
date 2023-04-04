<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register ID Verification/title>
	<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="overflow: hidden">
	
	<div style="margin-left: 0px; padding: 20px 50px 10px 50px; position: relative; overflow: hidden">
		
		<!-- Form -->
		<form id="form-id" method="GET" action="{{ route('verifyID') }}">
		@csrf
			<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

			<input type="hidden" name="id-verified" value="0">

			<!-- Error Word -->
			@error('errorID')
				<p class="error">{{ $errors->first('errorID') }}</p>
				
				<script>
					var height = document.documentElement.scrollHeight;

					window.parent.postMessage({
						height: height
					}, '*');
				</script>
				
			@enderror
			<!-- Error Word -->

			<div class="mb-2">
				<input id="id-number" oninput="getInputValues()" style="font-size:14px" type="text" class="input_ID" placeholder="ID Number" name="id-number" value="" required autofocus>
			</div>

			<!-- Error Word Input Border Color -->
			@error('errorID')
				<script>
					$(".input_ID").css({
						"border": "1px solid red"
					});
						
					const idNumberValue = localStorage.getItem('id-number');
					const idNumber = document.getElementById('id-number').value = idNumberValue;

				</script>
			@enderror
			<!-- Error Word Input Border Color -->

			<!-- Error Connection Alert -->
			@error('erroConnection')
				<script>
					alert('{{ $errors->first('erroConnection') }}');
					window.location.href = '{{ route('register-id') }}';
				</script>
			@enderror
			<!-- Error Connection Alert -->
	
			<p class="form-text text-muted mb-3">
				Please enter your ID Number
			</p>
	
			<button onclick="blurBackground()" type="submit" name="verify" id="verify" class="submit-btn">Verify</button>
		</form>
		<!-- Form -->

		<div id="loading-main-div" class="loading-main-div"></div>

	</div>

	<script>
		function blurBackground(){
			const IDValue = document.getElementById("id-number").value;

			if(IDValue.length > 0){
				const IDNumber = document.getElementById("id-number");
				IDNumber.blur();

				$(".loading-main-div").css({
					"display": "block"
				});
			}
		}

		@if(session('backRegisterID') == 'no')
			$('#form-id').addClass('slide-in-left');
				setTimeout(function() {
					$('#form-id').removeClass('slide-in-left');
				}, 500);	

		@elseif(session('backRegisterID') == 'yes')
			$('#form-id').addClass('slide-out-back');
				setTimeout(function() {
					$('#form-id').removeClass('slide-out-back');
				}, 500);	
		@endif

		function getInputValues(){
			const idNumber = document.getElementById('id-number').value;
												
			localStorage.setItem('id-number', idNumber);
		}
		
	</script>
</body>
</html>