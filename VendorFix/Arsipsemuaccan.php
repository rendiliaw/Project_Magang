<?php
	include( '../Config/konek.php' );
	include( '../Config/cekven.php' );
	$namamu = ucwords( strtolower( $namamu ) );
	$query_CC = mysql_query( "SELECT ccan.*, optima.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan WHERE ccan.stts LIKE '%Close 2%' AND optima.vdr= '$idven' GROUP BY ccan.no ORDER BY ccan.tgl ASC, ccan.no ASC");
	$_data = mysql_fetch_array( $query_CC );
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
			function backask() {
				if ( confirm( 'Are you sure you want to go back?' ) ) {
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
							<a href=VendorV.php>Index</a>
						</li>
						<li>
							<a href=Arsip.php>Form Data Yang Sedang Dikerjakan</a>
						</li>
						<li class="active">
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
						<li>
							<a href="javascript:window.history.go(-1);" onclick="return backask();">Kembali</a>
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
		<form id="form3order" name="form3" method="post">
			<table width="347" border="0" class="center-block">
				<tbody>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td width="90">
							<a href="#" id="download" class="btn btn-sm btn-default no-print">Download excel</a>
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
		<form id="form1" name="form1" method="post">
			<?php
				while ( $data = mysql_fetch_array( $query_CC ) ) {
					$no = $data[ 'no' ];
					$ord = $data[ 'od' ];
					$sd = $data[ 'sid' ];
					$tanggal = $data[ 'tgl' ];
					$cus = $data[ 'cus' ];
					$serv = $data[ 'service' ];
					$ko = $data[ 'koor' ];
					$cp = $data[ 'cp' ];
					$nota = $data[ 'nota' ];
					$gambar = $data[ 'gambar' ];
					$rab = $data[ 'rab' ];
					$vendor = $data[ 'vdr' ];
					$stts = $data[ 'stts' ];
					$wk = $data[ 'wk' ];
				?>
				<div id="data-table">
					<div id="tabelku">
						<table width="83%" border="1" align="center" class="zebra-table" >
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
								</tr>
							</tbody>
						</table>
						<table width="60%" border="1" align="center" class="zebra-tables" id="tabelku">
							<thead>
								<tr style="text-align: center">
									<th width="40%">Waktu</th>
									<th width="28%">ID</th>
									<th width="32%">Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query_CC_C = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
									while ( $datas = mysql_fetch_array( $query_CC_C ) ) {
									?>
									<tr>
										<td>
											<?php echo $datas['time']; ?>
										</td>
										<td>
											<?php echo $datas['id']; ?>
										</td>
										<td>
											<?php echo $datas['ket']; ?>
										</td>
										<td></td>
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
		</form>
		<br/>
		<br/>
		<br/>
		<footer>&copy; 2017-
			<?php echo date("Y");?>
		</footer>
	</body>
</html>
