<?php
include( '../Config/cekop.php');
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$ni		= $_GET['ni'];
?>
<html>
<head>
	<title>Daftar Login</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../css/stylelog.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		function logoustask() {
			if ( confirm( 'Are you sure you want to logout?' ) ) {
				return true;
			} else {
				return false;
			}
		}
		function backask() {
			if ( confirm( 'Are you sure you want to go back?' ) ) {
				return true;
			} else {
				return false;
			}
		}
	</script>
</head>

<body>
	<div class="container">
		<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" float="" alt="Placeholder image" width="307" class="img-responsive">
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="inverseNavbar1">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="javascript:window.history.go(-1)" onclick="return backask()">Kembali</a>
					</li>
					<div class="dropdown">
						<button class="dropbtn">selamat datang&nbsp;<?php echo $namamu ?></button>
						<div class="dropdown-content">
							<a href="../Config/logout.php" onclick="return logoutask();">Log Out</a>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="account-wall">
					<img src="../images/logo-tangan-telkom-2-600x400.png" width="150" class="center-block">
					<form role="form1" id="form1" method="post" action="../Config/updatepass.php" class="form-signin" onload="addSubject()">
						<input type="text" name="usernames" value="<?php echo $ni; ?>" readonly hidden=""> 
						<input type="password" name="passwords" class="form-control" placeholder="password Sebelumnya" id="form-password" required>
						<input type="password" name="password" class="form-control" placeholder="password Baru" id="form-password" required>
						<input type="password" name="repassword" class="form-control" placeholder="(Re)password" id="form-password" required>
						<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>