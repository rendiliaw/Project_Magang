<?php
include( '../config/ceksuper.php');
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
?>
<html>
<head>
	<title>Daftar Login</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link href="../css/stylelog.css" rel="stylesheet" type="text/css">
	<script language='javascript' type="text/JavaScript">
		function addSubject() {
			var selectedSubject = document.getElementById('form1').levels.value;
			if (selectedSubject == 'Vendor') {
				document.getElementById('nvendor').style.display = 'block'; }
				else{
					document.getElementById('nvendor').style.display = 'none'; 
					document.getElementById('nvendor').value="";} 
				}
				
				function logoutask() {
					if ( confirm( 'Are you sure you want to logout?' ) ) {
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
						<ul class="nav navbar-nav">
							<a class="navbar-brand" href="#"></a>
							<li >
								<a href=Beranda.php>Menu Utama</a>
							</li>
							<li class="active">
								<a href=#>Daftar Akun Baru</a>
							</li>
							<li>
								<a href=BackupRestore.php>Backup dan Restore</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
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
						<h1 class="text-center login-title">Silahkan Mendaftarkan Akun</h1>
						<div class="account-wall">
							<img src="../images/logo-tangan-telkom-2-600x400.png" width="150" class="center-block">
							<form role="form1" id="form1" method="post" action="../Config/saveadmin.php" class="form-signin" onload="addSubject()">
								<input type="text" name="usernames" class="form-control" placeholder="username" id="form-username" required autofocus>
								<input type="password" name="password" class="form-control" placeholder="password" id="form-password" required>
								<input type="password" name="repassword" class="form-control" placeholder="(Re)password" id="form-password" required>
								<input type="email" name="email" class="form-control" placeholder="Email" id="form-email" required>
								<select name="levels" id="levels" class="form-control" onChange="addSubject()">
									<option value="Ccan">CCAN</option>
									<option value="Optimags">OPTIMA GS</option>
									<option value="Vendor">VENDOR</option>
								</select>
								<input type="type" name="nvendor" class="form-control" placeholder="nama vendor" id="nvendor" style="display:none;">
								<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-lg btn-primary btn-block">
							</form>
						</div>
					</div>
				</div>
			</div>
		</body>

		</html>
