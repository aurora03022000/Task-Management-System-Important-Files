<?php
session_start();

use Illuminate\Support\Facades\DB;

	if(!isset($_GET["token"])){ ?>
		<script>
			window.parent.location = '{{ route('reset-password-error') }}';
		</script>
	<?php }

	else{ 
		$token = $_GET['token'];

		$validate_token = DB::select("SELECT * FROM user_credential WHERE reset_password_token = ?", [$token]);
        $count = count($validate_token);

        if($count > 0){ 
			$_SESSION['tokenSuccess'] = true;
			?>
			<script>
				window.parent.location = '{{ route('reset-password') }}';
			</script>
        <?php }

        else{ ?>
			<script>
				window.parent.location = '{{ route('reset-password-invalid-token') }}';
			</script>
        <?php }
	}
?>