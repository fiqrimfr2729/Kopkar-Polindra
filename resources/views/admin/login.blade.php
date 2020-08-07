<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kopkar-Polindra</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/loginassets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/loginassets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/loginassets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/loginassets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/vendor/pnotify/pnotify.custom.css" />
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <img src="/loginassets/images/kopkar.png" style="margin-left:auto;margin-right:auto;display:block;width:250px; margin-top:20px;">
                <div style="text-align:center; font-family: Poppins-Regular; font-size:30px;font-weight:bold; margin-top:20px">Login Admin </div>
				<form id="formLogin" method="POST" class="login100-form validate-form">
					{{ csrf_field() }}
					<div class="wrap-input100 validate-input m-b-26" data-validate="Masukan username">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Masukan username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Masukan Password">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Masukan password">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="/loginassets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/vendor/bootstrap/js/popper.js"></script>
	<script src="/loginassets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/vendor/daterangepicker/moment.min.js"></script>
	<script src="/loginassets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/loginassets/js/main.js"></script>
	<script src="/vendor/pnotify/pnotify.custom.js"></script>

		<script type="text/javascript">
			/*===================================================================
			[ Login ]*/
			var formLogin = $('#formLogin');
				formLogin.submit(function (e) {
					e.preventDefault();
					$.ajax({
						url:'/do_login_admin',
						type:formLogin.attr('method'),
						data:formLogin.serialize(),
						dataType:"json",
						success: function( res ){
							if(res.error == 1){
							if(res.message.email != null){
								new PNotify({
									title: 'Alert!',
									text: res.message.email,
									type: 'warning',
									icon: "fa fa-warning",
									delay:1500
								})
							}
							if(res.message.password != null){
								new PNotify({
									title: 'Alert!',
									text: res.message.password,
									type: 'warning',
									icon: "fa fa-warning",
									delay:1500
								})
							}
							}else if(res.error == 0){
								new PNotify({
									title: 'Success',
									text: 'Login Success <br><b><i>' + res.username,
									type: 'success',
									icon: "fa fa-check",
									delay:500,
															after_close: function(){
																	window.location.href = "{{ route('dashboard_admin') }}";
															}
								})
							}else{
								new PNotify({
								title: 'Failed',
								text: 'Login Failed, ' + res.message,
								type: 'error',
								icon: "fa fa-times",
								delay:500
								})
							}
						}
					});
				});
			//key f5
			document.onkeydown = fkey;
			document.onkeypress = fkey
			document.onkeyup = fkey;
			var wasPressed = false;
			function fkey(e){
					e = e || window.event;
				if( wasPressed ) return;
					if (e.keyCode == 116) {
						$('.input100').val('');
						wasPressed = true;
					}else {
					}
			}
			</script>

</body>
</html>