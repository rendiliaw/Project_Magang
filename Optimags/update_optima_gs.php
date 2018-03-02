<?php
include( '../config/konek.php' );
include( '../config/cekop.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
if ( isset( $_GET[ 'ni' ] ) ) {
	$id = $_GET[ 'ni' ];
	$query_UP = mysql_query( 'SELECT ccan.*, optima.* from ccan LEFT JOIN optima ON ccan.no=optima.no_ccan WHERE optima.no_ccan = "' . $id . '" AND ccan.stts NOT LIKE "%Close 2%"' )or die( mysql_error() );
	$_data = mysql_fetch_array( $query_UP );
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
	$stts = $_data[ 'stts_op' ];
	$gambar = $_data[ 'gambar' ];
	$rab = $_data[ 'rab' ];
	$vendor = $_data[ 'vdr' ];
	$wk = $_data[ 'wk_op' ];
	$_SESSION['ordernya'] = $ord;
	$_SESSION['vendornya'] = $vendor;
	function ubahTanggal( $tanggal ) {
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
		$pisah = explode( '-', $tanggal );
		$tahun = substr( $tanggal, 0, 4 );
		$bulan = substr( $tanggal, 5, 2 );
		$tgl = substr( $tanggal, 8, 2 );
		$result = $tgl . " " . ( strtolower( $bulanx[ $bulan ] ) ) . " " . $tahun;
		return ( $result );
	}
	$tgl = ubahTanggal( $tanggal );
} else {
	$ord = '';
	$sd = '';
	$tanggal = '';
	$cus = '';
	$serv = '';
	$ko = '';
	$cp = '';
	$nota = '';
	$wk = '';
	$stts = '';
}
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/styleS.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
		var i = 1;
		$(function(){
			$("#addRow").click(function(){
				row = '<tr>'+
				' <td><input name="timestamp['+i+']" type="text" readonly value="<?php date_default_timezone_set('Asia/Hong_Kong'); $ts= date ('d-m-Y H:i:s'); echo date ('d-m-Y H:i:s', strtotime($ts)).'&nbsp;';echo('WITA'); ?>" readonly></td>'+
				'<td><input name="id['+i+']" type="text" value="Optima Gs" readonly></td>'+
				'<td><input type="text" name="ket['+i+']"/></td>'+
				'<td><button type="button" class="del" required>Del</button></td>' +
				'</tr>';
				$(row).insertBefore("#last");
				i++;
			});
		});
		$(".del").live('click', function(){
			if ( confirm( 'Are you sure you want to delete?' ) ) {
				$(this).parent().parent().remove();
			} else {
				return false;
			}
		});
		$(document).ready(function () {
			var usedNames = {};
			$("select[name='vendor'] > option").each(function () {
				if (usedNames[this.value]) {
					$(this).remove();
				} else {
					usedNames[this.value] = this.text;
				}
			});
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap-3.3.7.js"></script>
	<script>
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
		function tampilkan() {
			var pilihan = document.getElementById( "forms1" ).status.value;
			if ( pilihan == "Pelaksanaan" ) {
				document.getElementById( "wk" ).value = 'Vendor';
			} else if ( pilihan == "Close 2" ){
				document.getElementById( "wk" ).value = 'Selesai';
			}
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
		function hapusask() {
			if ( confirm( 'Are you sure you want to delete this file?' ) ) {
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
	<style>
	#map_canvas {
		margin: auto;
		height: 100%;
		width: 100%;
		padding: 200px;		
	}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGvzDdNbfTF-51wLV_zjx-dOYX9YXG4x4"></script>
<script>
	var geocoder;
	var map;
	var marker = ""
	function initialize() {
		geocoder = new google.maps.Geocoder();
		infowindow = new google.maps.InfoWindow;
		var latlng = new google.maps.LatLng(<?php echo $ko ?>);
		var mapOptions = {
			zoom: 20,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions
			);
		google.maps.event.addListener(map, infowindow, 'click', function(event) {
			codeAddress(event.latLng);
			saveData(event);
		});
		codeAddress(latlng);
	}
	function saveData( event)
	{
		var lat = event.latLng.lat().toFixed(6);
		var lng = event.latLng.lng().toFixed(6);
		$('#koordinat').val(lat+','+lng);
	}
	function codeAddress(alpha) {
		var address = document.getElementById('koordinat').value;
		var latlngStr = address.split(',', 2);
		var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
		geocoder.geocode({'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				if(marker)
					marker.setMap(null)
				marker = new google.maps.Marker({
					map: map,
					position: latlng,
					animation: google.maps.Animation.DROP,
					animation: google.maps.Animation.BOUNCE
				});
				infowindow.setContent(results[0].formatted_address + "<br>" + results[0].geometry.location);
				infowindow.open(map, marker);
				google.maps.event.addListener(marker, 'dragend', function (event) {
					saveData(event);
				});
} /* else {
alert('Geocode was not successful for the following reason: ' + status);
} */
});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
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
						<a href="#">Edit data Optima GS</a>
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
					<li>
						<a href="javascript:window.history.go(-1)" onclick="return backask();">Kembali</a>
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
	<form id="forms1" name="form1s" method="post" action="../Config/update_op.php" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini?');">
		<table width="500" border="0" align="center">
			<thead>
				<tr>
					<td><input name="number" type="number" id="number" readonly maxlength="5" value="<?php echo $_GET['ni']; ?>" hidden="">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Order</td>
					<td>:</td>
					<td><input name="order" type="text" id="order" placeholder="Nomor Order" value="<?php echo $ord; ?>" size="12" maxlength="11" readonly>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>SID</td>
					<td>:</td>
					<td><input name="sid" type="text" id="sid" placeholder="Nomor SID" value="<?php echo $sd; ?>" size="20" maxlength="19" readonly>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><input name="tanggal" type="text" id="tanggal" value="<?php echo $tgl; ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Customer</td>
					<td>:</td>
					<td><input name="kostumer" type="text" id="kostumer" placeholder="Pelanggan" value="<?php echo $cus; ?>" size="50" maxlength="100" readonly>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Service</td>
					<td>:</td>
					<td><input name="service" type="text" id="service" placeholder="Nomor Service" size="21" maxlength="20" readonly value="<?php echo $serv; ?>">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Koordinat</td>
					<td>:</td>
					<td><input name="koordinat" type="text" id="koordinat" placeholder="Nomor Koordinat" size="40" maxlength="50" readonly value="<?php echo $ko; ?>">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
						<div id="map_canvas" class="center"></div> 
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Contact Person</td>
					<td>:</td>
					<td><input name="cp" type="text" id="cp" placeholder="No. Telepon" size="40" maxlength="29" readonly value="<?php echo $cp; ?>">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Nota Dinas</td>
					<td>:</td>
					<?php
					if ( !empty( $nota ) ) {
						echo '
						<td><a href="../nota/' . $nota . '" class="btn btn-primary btn-sm" target="_blank">Lihat Nota</a></td>';
					}
					?>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td width="132">Upload Gambar</td>
					<td width="6">:</td>
					<?php
					if ( !empty( $gambar ) ) {
						echo '
						<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm" target="_blank">Lihat Gambar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="Hapus Gambar" href="../config/hapus_gambar.php?ni='.$_data['no_ccan'].'" onClick="return hapusask()">HAPUS</a></td>
						';
					} else {
						echo '
						<td>
						<input name="images" type="file" accept=".kml, .kmz" autofocus id="images">
						</td>';
					}
					?>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Upload Rincian Anggaran</td>
					<td>:</td>
					<?php
					if ( !empty( $rab ) ) {
						echo '
						<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm" target ="_blank">Lihat Rancangan Biaya</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="Hapus Rab" href="../config/hapus_rab.php?ni='.$_data['no_ccan'].'" onClick="return hapusask()">HAPUS</a></td>';
					} else {
						echo '
						<td>
						<input name="rab" type="file" accept=".pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.template, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="rab">
						</td>';
					}
					?>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
						<select name="status" required id="status" onchange="tampilkan()">
							<option value="<?php echo ucwords($stts); ?>"><?php echo strtoupper($stts); ?> </option>
							<option value="Close 2">CLOSE 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Vendor</td>
					<td>:</td>
					<td><select name='vendor' required id='vendor'>
						<?php
						if ($stts == 'Order' || $stts == 'Pelaksanaan'){
							$comb ="select distinct * from login WHERE vendor !='' ";
							$cb = mysql_query($comb)or die(mysql_error());
							while ($row = mysql_fetch_array($cb)) {
								echo "<option value ='".$row['vendor']."'>".$row['vendor']."</option>";
							}
						}else{
							echo "<option value ='".$vendor."'>".$vendor."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Workgroup</td>
				<td>:</td>
				<td><input name="wk" type="text" required="required" id="wk" placeholder="Keterangan" value="<?php echo $wk; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
	</table>
	<table border="1" id="tabelku" width="30%" align="center" >
		<thead>
			<tr>
				<td>Waktu</td>
				<td>ID</td>
				<td>Keterangan</td>
				<td>Proses</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$query_UP_C = mysql_query( "select * from vendor where no_ccanw = $id order by no_ccanw" )or die( mysql_error() );
			while ( $datas = mysql_fetch_array( $query_UP_C ) ) {
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
					<td>
					</td>
				</tr>
				<?php
			}
			?>
			<tr id="last">
				<td colspan="4" align="right"><button type="button" id="addRow">Add</button></td>
			</tr>
		</tbody>
	</table>
	<table width="30%" border="0" align="center">
		<tbody>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input name="update" type="submit" id="update" value="update" >
				</td>
			</tr>
		</tbody>
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
