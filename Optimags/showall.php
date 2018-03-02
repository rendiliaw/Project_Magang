	<?php
	include( '../Config/cekop.php' );
	include( '../Config/konek.php' );
	$namamu = $_SESSION[ 'usernamel' ];
	$namamu = ucwords( strtolower( $namamu ) );
	?>
	<html>
	<head>
		<title>Telkom</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/bootstrap-3.3.7.js"></script>
		<script>
			function deleteask() {
				if ( confirm( 'Are you sure you want to logout?' ) ) {
					return true;
				} else {
					return false;
				}
			}
			function ask() {
				if ( confirm( 'Are you sure you want to change your password?' ) ) {
					return true;
				} else {
					return false;
				}
			}
		</script>
	</head>
	<body>
		<div class="container">
			<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" alt="Placeholder image" width="307" class="img-responsive">
		</div>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="inverseNavbar1">
				<ul class="nav navbar-nav">
					<li>
						<a href=Index.php>Index</a>
					</li>
					<li>
						<a href=Arsip.php>Form Data Yang Sedang Diproses</a>
					</li>
					<li>
						<a href=Arsipccan.php>Arsip Berhasil</a>
					</li>
					<li>
						<a href=Arsip_cancel.php>Arsip Batal</a>
					</li>
					<li>
						<a href=laporan_3.php>Cetak Laporan</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span>Pemberitahuan</a>
						<ul class="dropdown-menu">
							<div class="scrollbar" id="style-2">
								<li class="alpha"></li>
							</div>
							<li><a href="showall.php" class="text-bold text-italic">Lihat selengkapnya</a>
							</li>
						</ul>
					</li>
					<div class="dropdown">
						<button class="dropbtn">selamat datang&nbsp;<?php echo $namamu; ?></button>
						<div class="dropdown-content">
							<a href="Uppass.php?ni=<?php echo $namamu; ?>" onclick="return ask();">Ganti password</a>
							<a href="../Config/logout.php" onclick="return logoutask();">Log Out</a>
						</div>
					</div>
				</ul>
			</div>
			</div>
		</nav>
		<?php
		$querys = "SELECT * FROM notif WHERE id != 'Optima Gs' ORDER BY waktu DESC, no_ccann DESC";
		$results = mysql_query( $querys );
		while ( $row = mysql_fetch_array( $results ) ) {
			echo'
			<a href="Detail.php?ni=' . $row[ "no_ccann" ] . '"  target="_blank">
			<Table rules="none" border="1" style="background-color: rgba(0,255,255, .5);">
			<tr>
			<Td>
			<strong> '. $row[ "komentar" ] .' </strong><br/>
			<small><em>' . $row[ "waktu" ] . '</em></small>
			</td>
			</tr>
			</table>
			</a>
			<br/>
			';
		}
		?>
		<footer>&copy; 2017-
			<?php echo date("Y");?>
		</footer>
	</body>

	</html>
