<?php
session_start();
include( "Config/ceklog.php" );
?>
<html>

<head>
	<title>Login</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/stylelog.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<h1 class="text-center login-title">Silahkan Masuk Untuk Melanjutkan</h1>
				<div class="account-wall">
					<img src="images/logo-tangan-telkom-2-600x400.png" width="150" class="center-block">
					<form role="form" action="" method="post" class="form-signin">
						<input type="text" name="username" class="form-control" placeholder="username" id="form-username" required autofocus>
						<input type="password" name="password" class="form-control" placeholder="password" id="form-password" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
						<?php echo $error; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>