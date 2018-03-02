<?php
include( '../Config/konek.php' );
include( '../Config/cekadmin.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
if ( isset( $_GET[ 'ni' ] ) ) {
	$id = $_GET[ 'ni' ];
	$query_D = mysql_query( 'SELECT ccan.*, optima.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan WHERE ccan.no = "' . $id . '"' )or die( mysql_error() );
	$_data = mysql_fetch_array( $query_D );
	$no = $_data[ 'no' ];
	$ord = $_data[ 'od' ];
	$sd = $_data[ 'sid' ];
	$tanggal = $_data[ 'tgl' ];
	$cus = $_data[ 'cus' ];
	$serv = $_data[ 'service' ];
	$ko = $_data[ 'koor' ];
	$cp = $_data[ 'cp' ];
	$nota = $_data[ 'nota' ];
	$gambar = $_data[ 'gambar' ];
	$rab = $_data[ 'rab' ];
	$vendor = $_data[ 'vdr' ];
	$stts = $_data[ 'stts' ];
	$wk = $_data[ 'wk' ];
}
?>
<html>
<head>
	<title>Telkom
	</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="../js/bootstrap.js"></script>
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
		function backask() {
			if ( confirm( 'Are you sure you want to go back?' ) ) {
				return true;
			} else {
				return false;
			}
		}
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
	<div class="container">
		<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" alt="Placeholder image" width="307" class="img-responsive">
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="inverseNavbar1">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href=#>Edit Order</a>
					</li>
					<li>
						<a href=Arsip.php>Arsip Berhasil</a>
					</li>
					<li>
						<a href=arsip_cancel.php>Arsip Batal</a>
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
					<li>
						<a href="Index.php" onclick="return backask();">Kembali</a>
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
	<form id="form1" name="form1" method="post">
		<table width="100%" height="178" border="1" class="zebra-table" align="center">
			<thead>
				<tr>
					<?php
					if ($stts != 'Close 2'){
						?>
						<td colspan="14" width="113">
							<a type="button" class="btn btn-primary btn-sm center-block" href="Edit_Order.php?ni=<?php echo $no;?>" title="lihat">Update Order</a>
							<?php
						}
						?>
					</td>
				</tr>
				<tr>
					<th width="3%">No</th>
					<th width="6%">Order</th>
					<th width="6%">SID</th>
					<th width="9%">Tanggal</th>
					<th width="14%">Customer</th>
					<th width="7%">Service</th>
					<th width="7%">Koordinat</th>
					<th width="9%">Contact Person</th>
					<th width="7%">Gambar</th>
					<th width="7%">Rancangan Biaya</th>
					<th width="8%">Vendor</th>
					<th width="9%">Nota Dinas</th>
					<th width="15%">Keterangan</th>
					<th width="7%">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php echo $no; ?>
					</td>
					<td>
						<?php echo $ord; ?>
					</td>
					<td>
						<?php echo $sd; ?>
					</td>
					<td>
						<?php echo $tanggal; ?>
					</td>
					<td>
						<?php echo $cus; ?>
					</td>
					<td>
						<?php echo $serv; ?>
					</td>
					<td>
						<?php echo $ko; ?>
					</td>
					<td>
						<?php echo $cp; ?>
					</td>
					<?php
					if ( !empty( $gambar ) && !empty( $rab ) ) {
						echo '
						<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm" target="_blank">Lihat Gambar</a></td>
						<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Lihat Rancangan Biaya</a></td>
						';
					} else if ( !empty( $gambar ) && empty( $rab ) ) {
						echo '
						<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm " target="_blank">Lihat Gambar</a></td>
						<td>&nbsp;</td>
						';
					} else if ( !empty( $rab ) && empty( $gambar ) ) {
						echo '
						<td>&nbsp;</td>
						<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm" target="_blank">Lihat Rancangan Biaya</a></td>
						';
					} else {
						echo '
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						';
					}
					?>
					<td>
						<?php echo $vendor; ?>
					</td>
					<?php
					if ( !empty( $nota )  ) {
						echo '
						<td><a href="../nota/' . $nota . '" class="btn btn-primary btn-sm" target="_blank">Lihat Nota</a></td>
						';
					} else {
						echo '
						<td>&nbsp;</td>
						';
					}
					?>
					<td>
						<?php echo $wk; ?>
					</td>
					<td>
						<?php echo $stts; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<table border="1" id="tabelku" width="30%" align="center" class="zebra-tables">
			<thead>
				<tr>
					<th>Waktu</th>
					<th>ID</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<?php
			$query_D_kom = mysql_query( "select * from vendor where no_ccanw = $no" )or die( mysql_error() );
			while ( $data_D_kom = mysql_fetch_array( $query_D_kom ) ) {
				?>
				<tbody>
					<tr>	
						<td>
							<?php echo $data_D_kom['time']; ?>
						</td>
						<td>
							<?php echo $data_D_kom['id']; ?>
						</td>
						<td>
							<?php echo $data_D_kom['ket']; ?>
						</td>
						<td></td>
					</tr>
				</tbody>
				<?php
			}
			?>		
		</table>
	</form>
	<br/>
	<br/>
	<br/>
	<footer>&copy; 2017-
		<?php echo date("Y");?>
	</footer>
</body>
</html>