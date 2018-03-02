<?php
include( '../Config/konek.php' );
include( '../Config/cekven.php' );
$idven = $_SESSION[ 'vendor' ];
$namamu = $_SESSION[ 'usernamel' ];
if ( isset( $_GET[ 'ni' ] ) ) {
	$id = $_GET[ 'ni' ];
	$query_E = mysql_query( 'SELECT ccan.*, optima.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan where ccan.no = "' . $id . '" AND optima.vdr = "'.$idven.'" AND ccan.stts != "Close 1" OR ccan.stts != "Close 2"  ' )or die( mysql_error() );
	$_data = mysql_fetch_array( $query_E );
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
	$wk = $_data[ 'wk' ];
	$stts = $_data[ 'stts' ];
	$pisah = explode( '/', $tanggal );
	$tahun = substr( $tanggal, 0, 4 );
	$bulan = substr( $tanggal, 5, 2 );
	$tgl = substr( $tanggal, 8, 2 );
	$hasil = $tahun . "-" . $bulan . "-" . $tgl;
	$tglup = date( 'Y-m-d', strtotime( $hasil ) );
	$hasil = $tglup;
	date_default_timezone_set( 'Asia/Hong_Kong' );
	$_SESSION['ordernya'] = $ord;
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
				'<td><input name="id['+i+']" type="text" value="<?php echo $idven ?>" readonly></td>'+
				'<td><input type="text" name="ket['+i+']" class="addRow" required/></td>'+
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

		function tampilkan() {
			var pilihan = document.getElementById( "form1" ).status.value;
			if ( pilihan == "Pelaksanaan" ) {
				document.getElementById( "wk" ).value = 'VENDOR';
			} else if ( pilihan == "Close 1" ) {
				document.getElementById( "wk" ).value = 'OPTIMA GS';
			} else if ( pilihan == "In Progress" ) {
				document.getElementById( "wk" ).value = 'IN PROGRESS';
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
	<div class="container"><img src="../images/Logo-Telkom-Indonesia-transparent-background.png" alt="Placeholder image" width="307" class="img-responsive">
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#inverseNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			</div>
			<div class="collapse navbar-collapse" id="inverseNavbar1">
				<ul class="nav navbar-nav">
					<li class="active"><a href=#>Input <?php echo $idven ?></a>
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
					<li><a href="detailVen.php?ni=<?php echo $no?>" onclick="return backask()">Kembali</a>
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
	<form id="form1" name="form1" method="post" action="../Config/saveV.php" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini?');">
		<table width="60%" border="0" align="center">
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
					<td><input name="tanggal" type="date" id="tanggal" value="<?php echo $hasil; ?>" readonly>
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
					<td><input name="service" type="text" id="service" placeholder="Nomor Service" value="<?php echo $serv; ?>" size="21" maxlength="20" readonly>
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
					<td><input name="koordinat" type="text" id="koordinat" placeholder="Nomor Koordinat" value="<?php echo $ko; ?>" size="40" maxlength="50" readonly>
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
					<td><input name="cp" type="text" id="cp" placeholder="No. Telepon" value="<?php echo $cp; ?>" size="40" maxlength="29" readonly>
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
						<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm" target="_blank">Lihat Gambar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="Hapus Gambar" href="../Config/hapus_gambar_v.php?ni='.$_data['no_ccan'].'" onClick="return hapusask()">HAPUS</a></td>';
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
						<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm" target ="_blank">Lihat Rancangan Biaya</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="Hapus Gambar" href="../Config/hapus_rab_v.php?ni='.$_data['no_ccan'].'" onClick="return hapusask()">HAPUS</a></td>';
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
						<select name="status" id="status" onchange="tampilkan()" value="<?php echo $stts; ?>">
							<option value="Pelaksanaan">PELAKSANAAN</option>
							<option value="Close 1">CLOSE 1</option>
							<option value="In Progress">In Progress</option>
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
					<td>
						<input type="text" name="wk" readonly id="wk" placeholder="Keterangan" value="<?php echo $vendor; ?>">
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
				$query_E_C = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
				while ( $datas = mysql_fetch_array( $query_E_C ) ) {
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
					<td colspan="4" align="right"><button type="button" id="addRow">Add</button>
					</td>
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
					<td><input type="submit" name="submit" id="submit" value="Submit">
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