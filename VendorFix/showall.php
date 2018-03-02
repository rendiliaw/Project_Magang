<?php
include( '../Config/konek.php' );
include( '../Config/cekven.php' );
$idven = $_SESSION[ 'vendor' ];
$namamu = $_SESSION[ 'usernamel' ];
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap-3.3.7.js"></script>
	<script>

		function logoutask() {
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
	<div class="container"><img src="../images/Logo-Telkom-Indonesia-transparent-background.png" alt="Placeholder image" width="307" class="img-responsive navbar-left">
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="inverseNavbar1">
					<ul class="nav navbar-nav">
						<li>
							<a href=VendorV.php>List Order Cui</a>
						</li>
						<li">
							<a href=Arsip.php>Form Data Yang Sedang Diproses</a>
						</li>
						<li>
							<a href=Arsipccan.php>Arsip Berhasil</a>
						</li>
						<li>
							<a href=arsip_cancel.php>Arsip Batal</a>
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
							<button class="dropbtn">selamat datang&nbsp;<?php echo $namamu ?></button>
							<div class="dropdown-content">
								<a href="Uppass.php?ni=<?php echo $namamu ?>" onclick="return ask();">Ganti password</a>
								<a href="../Config/logout.php" onclick="return logoutask();">Log Out</a>
							</div>
						</div>
					</ul>
				</div>
		</div>
	</nav>
	<?php
	$idven = $_SESSION[ 'vendor' ];
	$querys = "SELECT * FROM notif WHERE komentar LIKE '%$idven%' AND id = 'Optima Gs' order by waktu DESC, id_v DESC";
	$results = mysql_query( $querys );
	while ( $row = mysql_fetch_array( $results ) ) {
		echo'
		<a href="detailVen.php?ni=' . $row[ "no_ccann" ] . '" target="_blank">
		<Table rules="none" border="1" style="background-color: rgba(0,255,255, .5);">
		<tr>
		<Td>
		<li>
		<strong>' . $row[ "komentar" ] . '</strong><br/></strong><br />
		<small><em>' . $row[ "waktu" ] . '</em></small>
		</td>
		</tr>
		</table>
		</a>
		<br/>
		';
	}
	?>
	<br/>

	<footer>&copy; 2017-
		<?php echo date("Y");?>
	</footer>
</body>

</html>
