<?php
error_reporting( E_ERROR | E_PARSE );
include( '../Config/konek.php' );
include( '../Config/cekven.php' );
include( 'sound.php' );
$idven = $_SESSION[ 'vendor' ];
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
date_default_timezone_set( 'Asia/Hong_Kong' );
$_SESSION['dateaw'] = $_POST['dateaw'];
$_SESSION['date1ak'] = $_POST['dateak'];
$rawaw = $_REQUEST[ 'dateaw' ];
$rawwk = $_REQUEST[ 'dateak' ];
function ubahTanggalaw( $rawaw ) {
	$pisah = explode( '/', $rawaw );
	$tahun = substr( $rawaw, 0, 4 );
	$bulan = substr( $rawaw, 5, 2 );
	$tgl = substr( $rawaw, 8, 2 );
	$result = $tahun . "-" . $bulan . "-" . $tgl;
	return ( $result );
}
$tanggal_awal_I = ubahTanggalaw( $rawaw );

function ubahTanggalak( $rawwk ) {
	$pisah = explode( '/', $rawwk );
	$tahun = substr( $rawwk, 0, 4 );
	$bulan = substr( $rawwk, 5, 2 );
	$tgl = substr( $rawwk, 8, 2 );
	$result = $tahun . "-" . $bulan . "-" . $tgl;
	return ( $result );
}
$tanggal_akhir_I = ubahTanggalak( $rawwk );
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
		$( document ).ready( function () {
			function load_unseen_notification( view = '' ) {
				$.ajax( {
					url: "fetch.php",
					method: "POST",
					data: {
						view: view
					},
					dataType: "json",
					success: function ( data ) {
						$( '.alpha' ).html( data.notification );
						if ( data.unseen_notification > 0 ) {
							$( '.count' ).html( data.unseen_notification );
							var numbah =( data.unseen_notification);
							var newTitle = '('+ numbah +')'+ ' Telkom';
							document.title = newTitle;

						}
					}
				} );
			}
			load_unseen_notification();
			$( document ).on( 'click', '.dropdown-toggle', function () {
				$( '.count' ).html( '' );
				load_unseen_notification('yes');
				var newTitleback = 'Telkom';
				document.title = newTitleback;

			} );

			setInterval( function () {
				load_unseen_notification();;
			}, 5000 );

		} );

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
	<?php
	$sqll = mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON optima.no_ccan=vendor.no_ccanw WHERE optima.vdr='$idven'" )or die( mysql_error() );
	$sql = mysql_fetch_array( $sqll );
	$tanggalve = $sql[ 'time' ];
	$pisah_1 = explode( '-', $tanggalve );
	$tahun_1 = substr( $tanggalve, 0, 4 );
	$bulan_1 = substr( $tanggalve, 5, 2 );
	$tgl_1 = substr( $tanggalve, 8, 2 );
	$result = $tahun_1 . "-" . $bulan_1 . "-" . $tgl_1;
	$tanggalrawven = strtotime( $result );
	$tanggalveraw = date( 'Y-m-d', $tanggalrawven );
	$tanggal1_1 = new datetime( $tanggalveraw );
	$tanggal2_1 = new DateTime();
	$perbedaan_1 = $tanggal2_1->diff( $tanggal1_1 )->format( "%a" );
	if ( $sql[ 'stts_op' ] == 'Pelaksanaan' ) {
		if ( ( $perbedaan_1 >= 5 ) && ( $sql[ 'vdr' ] == $idven ) ) {
			$chooseno = mysql_query( "select ccan.*, optima.*, vendor.* from ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw where optima.vdr='$idven' OR vendor.time IS NOT NULL AND vendor.no_ccanw=optima.no_ccan ORDER BY vendor.id DESC" )or die( mysql_error() );
			$pilihano = mysql_fetch_array( $chooseno );
			$alert = array( $pilihano[ 'od' ] );
			foreach ( $alert as $isinya ) {
				?>
				<script type="text/javascript">
					play_sound2();
				</script>
				<div class="alert alert-info">Data order
					<strong>
						<?php echo $isinya ?>
					</strong>&nbsp;dengan tanggal
					<?php echo $sql['tgl'] ?>&nbsp;belum di tindak lanjuti selama 5 hari<br/>segera periksa</div>
					<?php
				}
			}
		}
		if ( $sql[ 'stts_op' ] == 'Pelaksanaan' ) {
			if ( ( $perbedaan >= 10 )  && ( $sql[ 'vdr' ] == $idven ) ) {
				$choosent = mysql_query( "select ccan.*, optima.*, vendor.* from ccan left join optima on ccan.no=optima.no_ccan LEFT JOIN vendor ON vendor.no_ccanw=optima.no_ccan where optima.vdr='$idven' OR vendor.time IS NOT NULL AND vendor.no_ccanw=optima.no_ccan ORDER BY vendor.id DESC " )or die( mysql_error() );
				$pilihant = mysql_fetch_array( $choosent );
				$alert1 = array( $pilihant[ 'od' ] );
				foreach ( $alert1 as $isinya1 ) {
					?>
					<script type="text/javascript">
						play_sound3();
					</script>
					<div class="alert alert-warning">Data order
						<strong>
							<?php echo $isinya1 ?>
						</strong>&nbsp;dengan tanggal
						<?php echo $sql['tgl'] ?>&nbsp;belum ditindak lanjuti selama 10 hari<br/>segera periksa</div>
						<?php
					}
				}
			}
			if ( $sql[ 'stts_op' ] == 'Pelaksanaan' ) {
				if ( ( $perbedaan >= 15 ) && ( $sql[ 'vdr' ] == $idven ) ) {
					$choosentr = mysql_query( "select ccan.*,optima.* from ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON vendor.no_ccanw=optima.no_ccan where optima.vdr='$idven' OR vendor.time IS NOT NULL AND vendor.no_ccanw=optima.no_ccan ORDER BY vendor.id DESC" )or die( mysql_error() );
					$pilihantr = mysql_fetch_array( $choosentr );
					$alert2 = array( $pilihantr[ 'od' ] );
					foreach ( $alert2 as $isinya2 ) {
						?>
						<script type="text/javascript">
							play_sound4();
						</script>
						<div class="alert alert-danger">Data order
							<strong>
								<?php echo $isinya2 ?>
							</strong>&nbsp;dengan tanggal
							<?php echo $sql['tgl'] ?>&nbsp;belum ditindak lanjuti selama 15 hari<br/>segera periksa</div>
							<?php
						}
					}
				}
				?>
				<div class="container">
					<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" alt="Placeholder image" width="307" class="img-responsive navbar-left">
				</div>
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="collapse navbar-collapse" id="inverseNavbar1">
							<ul class="nav navbar-nav">
								<li class="active"><a href=#>List Order <?php echo $idven ?></a>
								</li>
								<li>
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
				<form id="form2" name="form2" method="postform" action="VendorV.php">
					<h5>Masukan Tanggal:</h5>
					<table width="70%" border="0">
						<tbody>
							<tr>
								<td width="19%">Dari Tanggal</td>
								<td width="25%"><input name="dateaw" type="date" autofocus required="required" id="dateaw" value ="<?php echo $tanggal_awal_I; ?>">
								</td>
								<td width="20%">Sampai Tanggal</td>
								<td width="21%"><input name="dateak" type="date" required="required" id="dateak" value ="<?php echo $tanggal_akhir_I; ?>" >
								</td>
								<td width="15%"><input type="submit" name="cari" id="cari" value="Submit">
								</td>
								<td width="15%"><input type="reset" value="reset">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				<br>
				<form id="form3order" name="form3" method="post">
					<table border="0" align="center">
						<tbody>
							<tr>
								<td>
									<h1>Vendor&nbsp;<?php echo $namamu ?>&nbsp;</h1>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				&nbsp; &nbsp;
				<?php
				if ( isset( $_REQUEST[ 'cari' ] ) ) {
					if ( empty( $tanggal_awal_I ) || empty( $tanggal_akhir_I ) ) {
						?>
						<script language="JavaScript">
							alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
							document.location = 'VendorV.php';
						</script>
						<?php
					} else {
						?>
						<i>
							<b>Informasi:</b>
						</i>
						hasil pencarian data berdasarkan periode Tanggal
						<b>
							<?php echo $tanggal_awal_I?>
						</b>s/d
						<b>
							<?php echo $tanggal_akhir_I?>
						</b>
						<?php
						$query_I = mysql_query( "SELECT ccan.*, optima.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan WHERE ccan.tgl BETWEEN '$tanggal_awal_I' AND '$tanggal_akhir_I' AND optima.vdr='$idven' AND optima.stts_op LIKE '%Pelaksanaan%' ORDER BY ccan.tgl ASC, ccan.no ASC" )or die( mysql_error() );
					}
					?>
					<form id="form1" name="form1" method="post">
						<table width="83%" border="1" align="center" class="zebra-table">
							<thead>

								<tr style="text-align: center">
									<th width="15%">Order</th>
									<th width="12%">SID</th>
									<th width="18%">Tanggal</th>
									<th width="19%">Customer</th>
									<th width="16%">Tugas Kerja</th>
									<th width="20%">Status</th>
									<th width="20%"> Keterangan<br>
									</th>
								</tr>
							</thead>
							<?php
							while ( $data = mysql_fetch_array( $query_I ) ) {
								$raw = $data[ 'tgl' ];
								$bulanx = array(
									'01' => 'JANUARI',
									'02' => 'FEBRUARI',
									'03' => 'MARET',
									'04' => 'APRIL',
									'05' => 'MEI',
									'06' => 'JUNI',
									'07' => 'JULI',
									'08' => 'AGUSTUS',
									'09' => 'SEPTEMBER',
									'10' => 'OKTOBER',
									'11' => 'NOVEMBER',
									'12' => 'DESEMBER'
								);
								$pisah = explode( '-', $raw );
								$tahun = substr( $raw, 0, 4 );
								$bulan = substr( $raw, 5, 2 );
								$tgl = substr( $raw, 8, 2 );
								$result = $tgl . " " . ( strtolower( $bulanx[ $bulan ] ) ) . " " . $tahun;
								$tgl = $result;
								?>
								<tr style="text-align: center">
									<td>
										<?php echo $data['od']; ?>
									</td>
									<td>
										<?php echo $data['sid']; ?>
									</td>
									<td>
										<?php echo $tgl; ?>
									</td>
									<td>
										<?php echo $data['cus']; ?>
									</td>
									<td>
										<?php echo $data['wk']; ?>
									</td>
									<td>
										<?php echo $data['stts']; ?>
									</td>
									<td p align="center">
										<a type="button" class="btn btn-primary btn-sm center-block" href="detailVen.php?ni=<?php echo $data['no'];?>" title="Detail">Lihat Detail
										</a>
									</td>
								</tr>
								<?php
							}
							?>
							<tr>
								<td colspan="7" align="center">
									<?php
									if ( mysql_num_rows( $query_I ) == 0 ) {
										echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
									}
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<?php
				} else {
					unset( $_REQUEST[ 'cari' ] );
				}
				?>
			</form>
			<br/>
			<br/>
			<br/>
			<footer>&copy; 2017-
				<?php echo date("Y");?>
			</footer>
		</body>

		</html>