<?php
include( '../config/konek.php');
include( '../config/ceksuper.php');
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$ccan=mysql_query("select * from login where level LIKE '%Ccan%' and level !=''");
$optima=mysql_query("select * from login where level LIKE '%Optimags%' and level !=''");
$vendor=mysql_query("select * from login where vendor !=''");
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap-3.3.7.js"></script>
	<script type="text/javascript">
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
					<li class="active">
						<a href=#>Menu Utama</a>
					</li>
					<li>
						<a href=Daftar.php>Daftar Akun Baru</a>
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
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#menu1">Ccan</a>
		</li>
		<li><a data-toggle="tab" href="#menu2">Optima Gs</a>
		</li>
		<li><a data-toggle="tab" href="#menu3">Vendor</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="menu1" class="tab-pane fade in active">
			<table border="1" id="tabelku" width="30%" align="center" class="zebra-tables">
				<tr>
					<th>Username</td>
						<th>Email</td>
							<th>Keterangan</th>
							<th colspan="2">Pilihan</th>
						</tr>
						<tbody>
							<tr>
								<?php
								while ( $_data = mysql_fetch_array( $ccan ) ) {
									?>
									<td>
										<?php echo $_data['username']; ?>
									</td>
									<td>
										<?php echo $_data['email']; ?>
									</td>
									<td>
										<?php echo $_data['level']; ?>
									</td>
									<td>
										<a type="button" class="btn btn-primary btn-sm center-block" href="EditSU.php?ni=<?php echo $_data['no'];?>" title="Edit siswa ini">Edit </a>
									</td>
									<td>
										<a type="button" class="btn btn-primary btn-sm center-block" href="../Config/HapusSU.php?ni=<?php echo $_data['no'];?>" onclick="return confirm('Yakin mau di hapus?');">Hapus</a>
									</td>

								</tr>
							</tbody>
							<?php
						}
						?>
					</table>
				</div>
				<div id="menu2" class="tab-pane fade">
					<table border="1" id="tabelku" width="30%" align="center" class="zebra-tables">
						<tr>
							<th>Username</td>
								<th>Email</td>
									<th>Keterangan</th>
									<th colspan="2">Pilihan</th>
								</tr>
								<tbody>
									<tr>
										<?php
										while ($_data0= mysql_fetch_array($optima)) {
											?>
											<td>
												<?php echo $_data0['username']; ?>
											</td>
											<td>
												<?php echo $_data0['email']; ?>
											</td>
											<td>
												<?php echo $_data0['level']; ?>
											</td>
											<td>
												<a type="button" class="btn btn-primary btn-sm center-block" href="EditSU.php?ni=<?php echo $_data0['no'];?>" title="Edit siswa ini">Edit </a>
											</td>
											<td>
												<a type="button" class="btn btn-primary btn-sm center-block" href="../Config/HapusSU.php?ni=<?php echo $_data0['no'];?>" onclick="return confirm('Yakin mau di hapus?');">Hapus</a>
											</td>
										</tr>
									</tbody>
									<?php
								}
								?>
							</table>
						</div>
						<div id="menu3" class="tab-pane fade">
							<table border="1" id="tabelku" width="30%" align="center" class="zebra-tables">
								<tr>
									<th>Username</td>
										<th>Email</td>
											<th>Vendor</th>
											<th colspan="2">Pilihan</th>
										</tr>
										<tbody>
											<tr>
												<?php
												while ( $_data1= mysql_fetch_array($vendor) ) {
													?>
													<td>
														<?php echo $_data1['username']; ?>
													</td>
													<td>
														<?php echo $_data1['email']; ?>
													</td>
													<td>
														<?php echo $_data1['vendor']; ?>
													</td>
													<td>
														<a type="button" class="btn btn-primary btn-sm center-block" href="EditSU.php?ni=<?php echo $_data1['no'];?>" title="Edit siswa ini">Edit </a>
													</td>
													<td>
														<a type="button" class="btn btn-primary btn-sm center-block" href="../Config/HapusSU.php?ni=<?php echo $_data1['no'];?>" onclick="return confirm('Yakin mau di hapus?');">Hapus</a>
													</td>
												</tr>
											</tbody>
											<?php
										}
										?>
									</table>
								</div>
							</div>
							<br/>
							<br/>
							<br/>
							<footer>&copy; 2017-<?php echo date("Y");?>
							</footer>
						</body>
						</html>
