<?php
include( '../Config/cekadmin.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript">
		var i = 1;
		$(function(){
			$("#addRow").click(function(){
				row = '<tr>'+
				'<td><input name="timestamp['+i+']" type="text" readonly value="<?php include('../Config/time.php') ?>"></td>'+
				'<td><input name="id['+i+']" type="text" value="Ccan" readonly></td>'+
				'<td><input type="text" id="ket" required name="ket['+i+']" /></td>'+
				'<td><button type="button" class="del" >Del</button></td>' +
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
				load_unseen_notification();
			}, 5000 );
		} );
		function tampilkan() {
			var pilihan = document.getElementById( "form1" ).status.value;
			if ( pilihan == "Order" ) {
				document.getElementById( "wk" ).value = 'OPTIMA GS';
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
		$(document).ready(function(){    
			$("#order, #number").keyup(function()	{		
				var order = $(this).val();	
				if(order.length > 0)		{		
					$("#hasil").html('');
					$.ajax({
						type : 'POST',
						url  : '../Config/cekod.php',
						data : $(this).serialize(),
						success : function(data)  {
							$("#hasil").html(data);
						}
					});
					return false;
				}
				else
				{
					$("#hasil").html('');
				}
			});
		});
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
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
<!-- 	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
	$(function() {
		$( "#service" ).autocomplete({
			source: 'post_search.php'
		});
	});
</script> -->
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
		var latlng = new google.maps.LatLng(-3.325020, 114.591700);
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
					draggable: true,
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
		<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" float="" alt="Placeholder image" width="307" class="img-responsive">
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="inverseNavbar1">
				<ul class="nav navbar-nav">
					<a class="navbar-brand" href="#"></a>
					<li class="active">
						<a href=Input_Order.php>Tambah Data</a>
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
	<form id="form1" method="post" action="../Config/act_I_order.php" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini?');">
		<table width="53%" border="0" align="center">
			<tbody>
				<tr>
					<td><input name="number" type="text" id="number" value="" size="12" maxlength="11" hidden="">
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
					<td>
						<input name="order" type="text" autofocus required="required" id="order" placeholder="Nomor Order" size="12" maxlength="11" onkeypress="return isNumberKey(event)">
						<span id="hasil"></span>
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
					<td><input name="sid" type="text" required="required" id="sid" placeholder="Nomor SID" size="20" maxlength="19"  onkeypress="return isNumberKey(event)">
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
					<td><input name="tanggal" type="date" required="required" id="tanggal" value="<?php date_default_timezone_set('Asia/Hong_Kong'); echo date('Y-m-d') ?>">
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
					<td><input name="kostumer" type="text" required="required" id="kostumer" placeholder="Pelanggan" size="50" maxlength="100">
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
					<td><input name="service" type="text" required="required" id="service" placeholder="Jenis Service" size="21" maxlength="20">
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
					<td><input name="koordinat" type="text" required="required" id="koordinat" placeholder="Nomor Koordinat" size="40" maxlength="50">
						<input type="button" value="Cari Lokasi" onclick="codeAddress()">
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
					<td><input name="cp" type="text" required="required" id="cp" placeholder="Nama/No. Telepon" size="30" maxlength="40">
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
					<td><input name="nota" type="file" accept=".pdf" id="nota"></td>
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
						<select name='status' required id='status' onchange="tampilkan()">
							<option value=""></option>
							<option value="Order">ORDER</option>
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
					<td><input type="text" name="wk" readonly id="wk" placeholder="Workgroup">
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
				<tr>
					<td>
						<input name="timestamp['0']" type="text" readonly value="<?php date_default_timezone_set('Asia/Hong_Kong'); $ts= date ('d-m-Y H:i:s'); echo date ('d-m-Y H:i:s', strtotime($ts)).'&nbsp;';echo('WITA'); ?>" id="ticktimes['0']">
					</td>
					<td>
						<input name="id['0']" type="text" value="Ccan" readonly>
					</td>
					<td>
						<input type="text" required name="ket['0']"/>
					</td>
					<td>
						<button type="button" class="del" >Del</button>
					</td>
				</tr>
				<tr id="last">
					<td colspan="4" align="right"><button type="button" id="addRow" class="addRow">Add</button>
					</td>
				</tr>
			</tbody>
		</table>
		<table width="30%" border="0" align="center">
			<tfoot>
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
			</tfoot>
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