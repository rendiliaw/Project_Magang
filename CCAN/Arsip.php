<?php
error_reporting( E_ERROR | E_PARSE );
include( '../Config/konek.php' );
include( '../Config/cekadmin.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$rawaw = $_REQUEST[ 'dateaw' ];
$rawwk = $_REQUEST[ 'dateak' ];
$order_srch = $_POST['Order'];
function ubahTanggalaw_C2( $rawaw ) {
	$pisah = explode( '/', $rawaw );
	$tahun = substr( $rawaw, 0, 4 );
	$bulan = substr( $rawaw, 5, 2 );
	$tgl = substr( $rawaw, 8, 2 );
	$result = $tahun . "-" . $bulan . "-" . $tgl;
	return ( $result );
}
$tanggal_awal_c2 = ubahTanggalaw_C2( $rawaw );
function ubahTanggalak_C2( $rawwk ) {
	$pisah = explode( '/', $rawwk );
	$tahun = substr( $rawwk, 0, 4 );
	$bulan = substr( $rawwk, 5, 2 );
	$tgl = substr( $rawwk, 8, 2 );
	$result = $tahun . "-" . $bulan . "-" . $tgl;
	return ( $result );
}
$tanggal_akhir_c2 = ubahTanggalak_C2( $rawwk );
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
				load_unseen_notification();;
			}, 5000 );

			<?php if ($_REQUEST['cari2']){
				?>
				$('.nav-tabs a[href="#menu2"]').tab('show');
				<?php
			}else if ($_REQUEST['cari']){ 
				?>
				$('.nav-tabs a[href="#menu1"]').tab('show');
				<?php
			}
			?>
		} );
		window.onload = function () {
			var table = document.getElementById( 'data-table' ),
			download = document.getElementById( 'download' );
			download.addEventListener( 'click', function () {
				window.open( 'data:application/vnd.ms-excel,' + encodeURIComponent( table.outerHTML ) );
			} );
		}
		function logoutask() {
			if ( confirm( 'Are you sure you want to logout?' ) ) {
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
					<li>
						<a href="Index.php">Form List Order</a>
					</li>
					<li class= "active" >
						<a href=#>Arsip Berhasil</a>
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
			<form id="form2" name="form2" method="post" >
				<h5>Masukan Tanggal:</h5>
				<table width="70%" border="0">
					<tbody>
						<tr>
							<td width="19%">Dari Tanggal</td>
							<td width="25%"><input name="dateaw" type="date" autofocus required="required" id="dateaw" value ="<?php echo $tanggal_awal_c2; ?>">
							</td>
							<td width="20%">Sampai Tanggal</td>
							<td width="21%"><input name="dateak" type="date" required="required" id="dateak" value ="<?php echo $tanggal_akhir_c2; ?>" >
							</td>
							<td width="15%"><input type="submit" name="cari" id="cari" value="Submit">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			&nbsp;
			<form id="form3order" name="form3" method="postform">
				<table width="347" border="0" class="center-block">
					<tbody>
						<tr align="center">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td width="90"><a href="#" id="download" class="btn btn-sm btn-default no-print">Download excel</a>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td width="90"><a href="Arsipsemua.php" class="btn btn-sm btn-default no-print">Lihat Semua Order</a>
							</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
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
			if ( isset( $_REQUEST[ 'cari' ] ) ) {
				if ( empty( $tanggal_awal_c2 ) || empty( $tanggal_akhir_c2 ) ) {
					?>
					<script language="JavaScript">
						alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
						document.location = 'Arsip.php';
					</script>
					<?php
				} else if ( $tanggal_akhir_c2 < $tanggal_awal_c2 ) {
					?>
					<Script language="javaScript">
						alert( 'Tanggal tidak valid' );
						document.localName = "Arsip.php"
					</Script>
					<?php
				} else {
					?>
					<i>
						<b>Informasi:</b>
					</i>
					hasil pencarian data berdasarkan periode Tanggal
					<b>
						<?php echo $tanggal_awal_c2?>
					</b>s/d
					<b>
						<?php echo $tanggal_akhir_c2?>
					</b>
					<?php
				}
				?>
				<form id="form1" name="form1" method="post">
					<?php
					$query_C2 = mysql_query("SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_c2' AND '$tanggal_akhir_c2' AND ccan.stts LIKE '%Close 2%' GROUP by ccan.no ORDER BY ccan.tgl ASC, ccan.no ASC" ) ;
					while ( $data_utama = mysql_fetch_array( $query_C2 ) ) {
						$no = $data_utama[ 'no' ];
						$ord = $data_utama[ 'od' ];
						$sd = $data_utama[ 'sid' ];
						$tanggal = $data_utama[ 'tgl' ];
						$cus = $data_utama[ 'cus' ];
						$serv = $data_utama[ 'service' ];
						$ko = $data_utama[ 'koor' ];
						$cp = $data_utama[ 'cp' ];
						$nota = $data_utama[ 'nota' ];
						$vendor = $data_utama[ 'vdr' ];
						$stts = $data_utama[ 'stts' ];
						$wk = $data_utama[ 'wk' ];
						?>
						<div id="data-table">
							<div id="tabelku">
								<table width="83%" border="1" align="center" class="zebra-table">
									<thead>
										<tr style="text-align: center">
											<th width="3%">No</th>
											<th width="6%">Order</th>
											<th width="6%">SID</th>
											<th width="9%">Tanggal</th>
											<th width="14%">Customer</th>
											<th width="7%">Service</th>
											<th width="7%">Koordinat</th>
											<th width="9%">Contact Person</th>
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
										</tbody>
									</table>
									<table width="60%" border="1" align="center" class="zebra-tables">
										<thead>
											<tr style="text-align: center">
												<th width="40%">Waktu</th>
												<th width="28%">ID</th>
												<th width="32%">Keterangan</th>
											</tr>
										</thead>
										<?php
										$query_komentar = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
										while ( $data_komentar = mysql_fetch_array( $query_komentar ) ) {
											?>
											<tbody>
												<tr>
													<td>
														<?php echo $data_komentar['time']; ?>
													</td>
													<td>
														<?php echo $data_komentar['id']; ?>
													</td>
													<td>
														<?php echo $data_komentar['ket']; ?>
													</td>
												</tr>
											</tbody>
											<?php
										}
										?>
									</table>
								</div>
							</div>
							<?php
						}
						?>
						<table>
							<tr>
								<td height="40" colspan="12" align="center">
									<?php
									if ( mysql_num_rows( $query_C2 ) == 0 ) {
										echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
									}
									?>
								</td>
							</tr>
						</table>
						<?php
					} else {
						unset( $_REQUEST[ 'cari' ] );
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
							document.location = 'Arsip.php';
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
						$query_I = mysql_query( "SELECT * FROM ccan WHERE od = '$order_srch' AND stts  LIKE '%Close 2%' ORDER BY no ASC, tgl ASC" );
						$data_utama = mysql_fetch_array( $query_I );
						$no = $data_utama[ 'no' ];
						$ord = $data_utama[ 'od' ];
						$sd = $data_utama[ 'sid' ];
						$tanggal = $data_utama[ 'tgl' ];
						$cus = $data_utama[ 'cus' ];
						$serv = $data_utama[ 'service' ];
						$ko = $data_utama[ 'koor' ];
						$cp = $data_utama[ 'cp' ];
						$nota = $data_utama[ 'nota' ];
						$vendor = $data_utama[ 'vdr' ];
						$stts = $data_utama[ 'stts' ];
						$wk = $data_utama[ 'wk' ]; 
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
								</td>
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