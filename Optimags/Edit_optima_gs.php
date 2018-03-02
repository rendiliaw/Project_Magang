<?php
include( '../Config/konek.php' );
include( '../Config/cekop.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
if ( isset( $_GET[ 'ni' ] ) ) {
	$id = $_GET[ 'ni' ];
	$query_e = mysql_query( 'SELECT ccan.*, optima.* from ccan LEFT JOIN optima ON ccan.no=optima.no_ccan WHERE ccan.no = "' . $id . '" AND ccan.stts LIKE "%Order%"')or die( mysql_error() );
	$_data = mysql_fetch_array( $query_e );
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
	$gambar = $_data[ 'gambar' ];
	$rab = $_data[ 'rab' ];
	$vendor = $_data[ 'vdr' ];
	$wk = $_data[ 'wk' ];
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
				'<td><button type="button" class="del">Del</button></td>' +
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
	</script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).ready(function(){  
			$(function() {
				$( "#service" ).autocomplete({
					source: '../Config/post_search.php'
				});
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
			} else {
				document.getElementById( "wk" ).value = '';
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
						<a href="#">Index</a>
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
						<a href="javascript:window.history.go(-1)" onClick="return backask()">Kembali</a>
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
	<form id="forms1" name="form1s" method="post" action="../Config/act_I_optima.php" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini?');">
		<table width="500" border="0" align="center">
			<tbody>
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
					<td><input name="koordinat" type="text" required="required" id="koordinat" placeholder="Nomor Koordinat" value="<?php echo $ko; ?>" size="40" maxlength="50">
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
					<td><input name="cp" type="text" id="cp" placeholder="No. Telepon" size="40" maxlength="13" readonly value="<?php echo $cp; ?>">
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
					<td><input name="images" type="file" accept=".kml, .kmz" autofocus id="images"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Upload Rincian Anggaran</td>
					<td>:</td>
					<td><input name="rab" type="file" accept=".pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.template, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="rab"></td>
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
						<select name="status" required id="status" onchange="tampilkan()" value="">
							<option value="" selected="selected"></option>
							<option value="Pelaksanaan">PELAKSANAAN</option>
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
						$comb ="select distinct * from login WHERE vendor !='' ";
						$cb = mysql_query($comb)or die(mysql_error());
						while ($row = mysql_fetch_array($cb))
						{
							echo"<option value ='".$row['vendor']."'>".$row['vendor']."</option>";
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
				<td><input name="wk" type="text" id="wk" placeholder="Keterangan" value="<?php echo $wk; ?>" readonly>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<table border="1" id="tabelku" width="30%" align="center">
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
			$querys = mysql_query( "select * from vendor where no_ccanw = $id AND id NOT LIKE '%Optima Gs%' order by no_ccanw" )or die( mysql_error() );
			while ( $datas = mysql_fetch_array( $querys ) ) {
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
					<td>&nbsp;
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
				<td><input name="submit" type="submit" id="submit" value="Submit" >
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
