<?php
error_reporting( E_ERROR | E_PARSE );
include( '../Config/konek.php' );
include( '../Config/cekadmin.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$rawaw = $_POST[ 'dateaw' ];
$rawwk = $_POST[ 'dateak' ];
$order_srch = $_POST['Order'];
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
$ttanggal_akhir_I = ubahTanggalak( $rawwk );
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
				load_unseen_notification();
			}, 5000 );

			<?php if ($_REQUEST['cari2']){
				?>
				$('.nav-tabs a[href="#menu2"]').tab('show');
				<?php
			}else if ($_REQUEST['cari1']){ 
				?>
				$('.nav-tabs a[href="#menu1"]').tab('show');
				<?php
			}
			?>
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
		$(document).ready(function(){  
			$(function() {
				$( "#Order" ).autocomplete({
					source: '../Config/post_search_od.php'
				});
			});
		});
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
						<a href=#>Form List Order</a>
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
	<ul class="nav nav-tabs">
		<li><a data-toggle="tab" href="#menu1" >Pencarian Tanggal</a>
		</li>
		<li><a data-toggle="tab" href="#menu2" >Pencarian Individu</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="menu1" class="tab-pane fade">
			<form id="form2" name="form2" method="post">
				<h5>Masukan Tanggal:</h5>
				<table width="70%" border="0">
					<tbody>
						<tr>
							<td width="19%">Dari Tanggal</td>
							<td width="25%"><input name="dateaw" type="date" autofocus required="required" id="dateaw" value ="<?php echo $tanggal_awal_I; ?>">
							</td>
							<td width="20%">Sampai Tanggal</td>
							<td width="21%"><input name="dateak" type="date" required="required" id="dateak" value ="<?php echo $ttanggal_akhir_I; ?>" >
							</td>
							<td width="15%"><input type="submit" name="cari1" id="cari1" value="Submit">
							</td>
							<td width="15%"><input type="reset" value="reset">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			&nbsp;
			<form id="form3order" name="form3" method="post">
				<table width="96" border="0" class="center-block">
					<tbody>
						<tr>
							<td><button type="button" class="btn btn-sm btn-default" onclick="window.location='Input_Order.php'">Tambah Order</button>
							</td>
						</tr>
					</tbody>
				</table>
				<tbody>
					<tr>
						<td>
						</td>
					</tr>
				</tbody>
			</form>
			<?php
			if ( isset( $_REQUEST[ 'cari1' ] ) ) {
				if ( empty( $tanggal_awal_I ) || empty( $ttanggal_akhir_I ) ) {
					?>
					<script language="JavaScript">
						alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
						document.location = 'Index.php';
					</script>
					<?php
				} else {
					?>
					<i>
						<b>Informasi:
						</b>
					</i>
					hasil pencarian data berdasarkan periode Tanggal
					<b>
						<?php echo $tanggal_awal_I?>
					</b>s/d
					<b>
						<?php echo $ttanggal_akhir_I?>
					</b>
					<?php
				}
				?>
				<form id="form1" name="form1" method="post">
					<?php
					$query_I = mysql_query( "SELECT * FROM ccan WHERE tgl BETWEEN '$tanggal_awal_I' AND '$ttanggal_akhir_I' AND stts NOT LIKE '%Close 2%' AND stts NOT LIKE '%Cancel%' ORDER BY no ASC, tgl ASC" );
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
						<table width="83%" border="0" align="center" class="zebra-table">
							<thead>
								<tr style="text-align: center">
									<td width="15%">Order</td>
									<td width="12%">SID</td>
									<td width="18%">Tanggal</td>
									<td width="19%">Customer</td>
									<td width="16%">Tugas Kerja</td>
									<td width="20%">Status</td>
									<td width="20%"> Keterangan<br>
									</td>
								</tr>
							</thead>
							<tbody>
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
										<a type="button" class="btn btn-primary btn-sm center-block" href="detailCCAN.php?ni=<?php echo $data['no'];?>" title="Detail">Lihat Detail</a>
									</td>
								</tr>
							</tbody>
						</table>
						<?php
					}
					?>
					<table>
						<tr>
							<td colspan="7" align="center">
								<?php
								if ( mysql_num_rows( $query_I ) == 0 ) {
									echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
								}
								?>
							</td>
						</tr>	
					</table>
					<?php
				} else {
					unset( $_REQUEST[ 'cari1' ] );
				}
				?>
			</form>
		</div>
		<div id="menu2" class="tab-pane fade">
			<form id="form2" name="form2" method="post">
				<br>
				<table width="70%" border="0">
					<tbody>
						<tr>
							<td width="5%">Nomor Order</td>
							<td width="5%"><input name="Order" type="text" required="required" id="Order" placeholder="Nomor Order" size="21" maxlength="20">
							</td>
							<td width="15%"><input type="submit" name="cari2" id="cari2" value="Submit">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			&nbsp;
			<form id="form3order" name="form3" method="post">
				<table width="96" border="0" class="center-block">
					<tbody>
						<tr>
							<td><button type="button" class="btn btn-sm btn-default" onclick="window.location='Input_Order.php'">Tambah Order</button>
							</td>
						</tr>
					</tbody>
				</table>
				<tbody>
					<tr>
						<td>
						</td>
					</tr>
				</tbody>
			</form>
			<?php
			if ( isset( $_REQUEST[ 'cari2' ] ) ) {
				if ( empty( $order_srch ) ) {
					?>
					<script language="JavaScript">
						alert( 'Nomor Order Harap di Isi!' );
						document.location = 'Index.php';
					</script>
					<?php
				} else {
					?>
					<i>
						<b>Informasi:
						</b>
					</i>
					hasil pencarian data berdasarkan nomor order <?php echo $order_srch ?>
					<?php
				}
				?>
				<form id="form1" name="form1" method="post">
					<?php
					$query_I = mysql_query( "SELECT * FROM ccan WHERE od = '$order_srch' AND stts NOT LIKE '%Close 2%' AND stts NOT LIKE '%Cancel%' ORDER BY no ASC, tgl ASC" );
					$data = mysql_fetch_array( $query_I ); 
					?>
					<table width="83%" border="0" align="center" class="zebra-table">
						<thead>
							<tr style="text-align: center">
								<th width="15%">Order</th>
								<th width="12%">SID</th>
								<th width="18%">Tanggal</th>
								<th width="19%">Customer</th>
								<th width="16%">Tugas Kerja</th>
								<th width="20%">Status</th>
								<th width="20%"> Keterangan</td>
							</tr>
						</thead>
						<tbody>
							<tr style="text-align: center">
								<td>
									<?php echo $data['od']; ?>
								</td>
								<td>
									<?php echo $data['sid']; ?>
								</td>
								<td>
									<?php echo $data['tgl']; ?>
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
									<a type="button" class="btn btn-primary btn-sm center-block" href="detailCCAN.php?ni=<?php echo $data['no'];?>" title="Detail">Lihat Detail</a>
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<tr>
							<td colspan="7" align="center">
								<?php
								if ( mysql_num_rows( $query_I ) == 0 ) {
									echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
								}
								?>
							</td>
						</tr>	
					</table>
					<?php
				} else {
					unset( $_REQUEST[ 'cari2' ] );
				}
				?>
			</form>	
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<footer>&copy; 2017-
		<?php echo date("Y");?>
	</footer>
</body>
</html>