<?php
error_reporting( E_ERROR | E_PARSE );
include( '../Config/konek.php' );
include( '../Config/cekop.php' );
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$_SESSION['date_C2_aw'] = $_POST['dateaw_C2'];
$_SESSION['date_C2_ak'] = $_POST['dateak_C2'];
$_SESSION['date_C1_aw'] = $_POST['dateaw_C1'];
$_SESSION['date_C1_ak'] = $_POST['dateak_C1'];
$_SESSION['date_D_aw'] = $_POST['dateaw_D'];
$_SESSION['date_D_ak'] = $_POST['dateak_D'];
$_SESSION['date_C_aw'] = $_POST['dateaw_C'];
$_SESSION['date_C_ak'] = $_POST['dateaK_C'];
$rawaw_C2 = $_REQUEST[ 'dateaw_C2' ];
$rawwk_C2 = $_REQUEST[ 'dateak_C2' ];
function ubahTanggalaw_C2( $rawaw_C2 ) {
$pisah = explode( '/', $rawaw_C2 );
$tahun = substr( $rawaw_C2, 0, 4 );
$bulan = substr( $rawaw_C2, 5, 2 );
$tgl = substr( $rawaw_C2, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_awal_C2 = ubahTanggalaw_C2( $rawaw_C2 );
function ubahTanggalak_c2( $rawwk_C2 ) {
$pisah = explode( '/', $rawwk_C2 );
$tahun = substr( $rawwk_C2, 0, 4 );
$bulan = substr( $rawwk_C2, 5, 2 );
$tgl = substr( $rawwk_C2, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_akhir_C2 = ubahTanggalak_c2( $rawwk_C2 );
$rawaw_C1 = $_REQUEST[ 'dateaw_C1' ];
$rawwk_C1 = $_REQUEST[ 'dateak_C1' ];
function ubahTanggalaw_C1( $rawaw_C1 ) {
$pisah = explode( '/', $rawaw_C1 );
$tahun = substr( $rawaw_C1, 0, 4 );
$bulan = substr( $rawaw_C1, 5, 2 );
$tgl = substr( $rawaw_C1, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_awal_C1 = ubahTanggalaw_C1( $rawaw_C1 );
function ubahTanggalak_C1( $rawwk_C1 ) {
$pisah = explode( '/', $rawwk_C1 );
$tahun = substr( $rawwk_C1, 0, 4 );
$bulan = substr( $rawwk_C1, 5, 2 );
$tgl = substr( $rawwk_C1, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_akhir_C1 = ubahTanggalak_C1( $rawwk_C1 );
$rawaw_D = $_REQUEST[ 'dateaw_D' ];
$rawwk_D = $_REQUEST[ 'dateak_D' ];
function ubahTanggalaw_D( $rawaw_D ) {
$pisah = explode( '/', $rawaw_D );
$tahun = substr( $rawaw_D, 0, 4 );
$bulan = substr( $rawaw_D, 5, 2 );
$tgl = substr( $rawaw_D, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_awal_D = ubahTanggalaw_D( $rawaw_D );
function ubahTanggalak_D( $rawwk_D ) {
$pisah = explode( '/', $rawwk_D );
$tahun = substr( $rawwk_D, 0, 4 );
$bulan = substr( $rawwk_D, 5, 2 );
$tgl = substr( $rawwk_D, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_akhir_D = ubahTanggalak_D( $rawwk_D );
$rawaw_C = $_REQUEST[ 'dateaw_C' ];
$rawwk_C = $_REQUEST[ 'dateaK_C' ];
function ubahTanggalaw_C( $rawaw_C ) {
$pisah = explode( '/', $rawaw_C );
$tahun = substr( $rawaw_C, 0, 4 );
$bulan = substr( $rawaw_C, 5, 2 );
$tgl = substr( $rawaw_C, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_awal_C = ubahTanggalaw_C( $rawaw_C );
function ubahTanggalak_C( $rawwk_C ) {
$pisah = explode( '/', $rawwk_C );
$tahun = substr( $rawwk_C, 0, 4 );
$bulan = substr( $rawwk_C, 5, 2 );
$tgl = substr( $rawwk_C, 8, 2 );
$result = $tahun . "-" . $bulan . "-" . $tgl;
return ( $result );
}
$tanggal_akhir_C = ubahTanggalak_C( $rawwk_C );
?>
<html>
<head>
<title>Telkom</title>
<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
}else if ($_REQUEST['cari1']){ 
?>
$('.nav-tabs a[href="#menu1"]').tab('show');
<?php
}else if ($_REQUEST['cari3']){ 
?>
$('.nav-tabs a[href="#menu3"]').tab('show');
<?php
}else if ($_REQUEST['cari4']){ 
?>
$('.nav-tabs a[href="#menu4"]').tab('show');
<?php
}
?>
});
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
function ask() {
if ( confirm( 'Are you sure you want to change your password?' ) ) {
return true;
} else {
return false;
}
}
</script>
</head>
<body >
<div class="container">
<img src="../images/Logo-Telkom-Indonesia-transparent-background.png" float="" alt="Placeholder image" width="307" class="img-responsive">
</div>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="inverseNavbar1">
<ul class="nav navbar-nav">
<li>
<a href=Index.php>Index</a>
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
<li class="active">
<a href=#>Cetak Laporan</a>
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
<button class="dropbtn">selamat datang&nbsp;<?php echo $namamu; ?></button>
<div class="dropdown-content">
<a href="Uppass.php?ni=<?php echo $namamu; ?>" onclick="return ask();">Ganti password</a>
<a href="../Config/logout.php" onclick="return logoutask();">Log Out</a>
</div>
</div>
</ul>
</div>
</div>
</nav>
<ul class="nav nav-tabs">
<li><a href="#menu1" data-toggle="tab">Selesai</a>
</li>
<li ><a href="#menu2" data-toggle="tab">Selesai(Vendor)</a>
</li>
<li><a data-toggle="tab" href="#menu3">In Progress</a>
</li>
<li><a data-toggle="tab" href="#menu4">Batal</a>
</li>
</ul>
<div class="tab-content">
<div id="menu1" class="tab-pane fade">
<form id="form22" name="form2" method="post">
<h5>Masukan Tanggal:</h5>
<table width="70%" border="0">
<tbody>
<tr>
<td width="19%">Dari Tanggal</td>
<td width="25%"><input name="dateaw_C2" type="date" autofocus required="required" id="dateaw_C2" value ="<?php echo $tanggal_awal_C2; ?>">
</td>
<td width="20%">Sampai Tanggal</td>
<td width="21%"><input name="dateak_C2" type="date" required="required" id="dateak_C2" value ="<?php echo $tanggal_akhir_C2; ?>" >
</td>
<td width="15%"><input type="submit" name="cari1" id="cari1" value="Cari">
</td>
</tr>
</tbody>
</table>
</form>
&nbsp;
<form id="form3order" name="form3" method="post">
<table width="347" border="0" class="center-block">
<tbody>
<tr align="center">
<?php
$cek_data_c2 = mysql_num_rows( mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw where ccan.tgl between '$tanggal_awal_C2' and '$tanggal_akhir_C2' and ccan.stts LIKE '%Close 2%' GROUP by ccan.no ORDER BY ccan.tgl ASC, ccan.no ASC" ) );
if ( $cek_data_c2 > 0 ) {
?>
<td width="15%"><a href="../Config/laporan_C2.php" class="btn btn-primary btn-sm" target="_blank">cetak</a>
</td>
<?php
}
?>
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
if ( empty( $tanggal_awal_C2 ) || empty( $tanggal_akhir_C2 ) ) {
?>
<script language="JavaScript">
alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
document.location = 'laporan_3.php';
</script>
<?php
} else if ( $tanggal_akhir_C2 < $tanggal_awal_C2 ) {
?>
<Script language="javaScript">
alert( 'Tanggal tidak valid' );
document.localName = "laporan_3.php"
</Script>
<?php
} else {
?>
<i>
<b>Informasi:</b>
</i>
hasil pencarian data berdasarkan periode Tanggal
<b>
<?php echo $tanggal_awal_C2?>
</b>s/d
<b>
<?php echo $tanggal_akhir_C2?>
</b>
<?php
}
?>
<form id="form1" name="form1" method="post">
<?php
$query_C2 = mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_C2' and '$tanggal_akhir_C2' AND ccan.stts LIKE '%Close 2%' GROUP BY ccan.no ORDER BY ccan.tgl ASC" )or die( mysql_error() );
while ( $data = mysql_fetch_array( $query_C2 ) ) {
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
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
';
} else if ( !empty( $gambar ) && empty( $rab ) ) {
echo '
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td>&nbsp;</td>
';
} else if ( !empty( $rab ) && empty( $gambar ) ) {
echo '
<td>&nbsp;</td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
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
<td>
<?php echo $nota; ?>
</td>
<td>
<?php echo $wk; ?>
</td>
<td>
<?php echo $stts; ?>
</td>
</tr>
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
$querys1 = mysql_query( "SELECT * from vendor WHERE no_ccanw = $no ORDER BY no_ccanw" )or die( mysql_error() );
while ( $datas = mysql_fetch_array( $querys1 ) ) {
?>
<tbody>
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
<Table>
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
}else {
unset( $_REQUEST[ 'cari1' ] );
}
?>
</form>
</div>
<div id="menu2" class="tab-pane fade" > 
<form id="form22" name="form3" method="post">
<h5>Masukan Tanggal:</h5>
<table width="70%" border="0">
<tbody>
<tr>
<td width="19%">Dari Tanggal</td>
<td width="25%"><input name="dateaw_C1" type="date" autofocus required="required" id="dateaw_C1" value ="<?php echo $tanggal_awal_C1; ?>">
</td>
<td width="20%">Sampai Tanggal</td>
<td width="21%"><input name="dateak_C1" type="date" required="required" id="dateak_C1" value ="<?php echo $tanggal_akhir_C1; ?>" >
</td>
<td width="15%"><input type="submit" name="cari2" id="cari2" value="Cari">
</td>
</tr>
</tbody>
</table>
</form>
&nbsp;
<form id="form3order" name="form3" method="post">
<table width="347" border="0" class="center-block">
<tbody>
<tr align="center">
<?php
$cek_data_c1 = mysql_num_rows( mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw where ccan.tgl between '$tanggal_awal_C1' and '$tanggal_akhir_C1' and ccan.stts = 'Close 1' GROUP by ccan.no ORDER BY ccan.tgl ASC, ccan.no ASC" ) );
if ( $cek_data_c1 > 0 ) {
?>
<td width="15%"><a href="../Config/laporan_C1.php" class="btn btn-primary btn-sm" target="_blank">cetak</a>
</td>
<?php
}
?>
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
if ( empty( $tanggal_awal_C1 ) || empty( $tanggal_akhir_C1 ) ) {
?>
<script language="JavaScript">
alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
document.location = 'laporan_3.php';
</script>
<?php
} else if ( $tanggal_akhir_C1 < $tanggal_awal_C1 ) {
?>
<Script language="javaScript">
alert( 'Tanggal tidak valid' );
document.localName = "laporan_3.php"
</Script>
<?php
} else {
?>
<i>
<b>Informasi:</b>
</i>
hasil pencarian data berdasarkan periode Tanggal
<b>
<?php echo $tanggal_awal_C1?>
</b>s/d
<b>
<?php echo $tanggal_akhir_C1?>
</b>
<?php
}
?>
<form id="form1" name="form1" method="post">
<?php
$query_C1 = mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_C1' and '$tanggal_akhir_C1' and ccan.stts = 'Close 1' GROUP by ccan.no ORDER BY ccan.tgl ASC" )or die( mysql_error() );
while ( $data = mysql_fetch_array( $query_C1 ) ) {
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
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
';
} else if ( !empty( $gambar ) && empty( $rab ) ) {
echo '
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td>&nbsp;</td>
';
} else if ( !empty( $rab ) && empty( $gambar ) ) {
echo '
<td>&nbsp;</td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
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
<td>
<?php echo $nota; ?>
</td>
<td>
<?php echo $wk; ?>
</td>
<td>
<?php echo $stts; ?>
</td>
</tr>
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
$querys11 = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
while ( $datas = mysql_fetch_array( $querys11 ) ) {
?>
<tbody>
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
if ( mysql_num_rows( $query_C1 ) == 0 ) {
echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
}
?>
</td>
</tr>
</table>
<?php
}else {
unset( $_REQUEST[ 'cari2' ] );
}
?>
</form>
</div>
<div id="menu3" class="tab-pane fade">
<form id="form444" name="form3" method="post">
<h5>Masukan Tanggal:</h5>
<table width="70%" border="0">
<tbody>
<tr>
<td width="19%">Dari Tanggal</td>
<td width="25%"><input name="dateaw_D" type="date" autofocus required="required" id="dateaw_D" value ="<?php echo $tanggal_awal_D; ?>">
</td>
<td width="20%">Sampai Tanggal</td>
<td width="21%"><input name="dateak_D" type="date" required="required" id="dateak_D" value ="<?php echo $tanggal_akhir_D; ?>" >
</td>
<td width="15%"><input type="submit" name="cari3" id="cari3" value="Cari">
</td>
</tr>
</tbody>
</table>
</form>
&nbsp;
<form id="form3order" name="form3" method="post">
<table width="347" border="0" class="center-block">
<tbody>
<tr align="center">
<?php
$cek_data_d = mysql_num_rows( mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_D' and '$tanggal_akhir_D' and ccan.stts = 'In Progress' GROUP by ccan.no ORDER BY ccan.tgl ASC" ) );
if ( $cek_data_d > 0 ) {
?>
<td width="15%"><a href="../Config/laporan_D.php" class="btn btn-primary btn-sm" target="_blank">cetak</a>
</td>
<?php
}
?>
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
if ( isset( $_REQUEST[ 'cari3' ] ) ) {
if ( empty( $tanggal_awal_D ) || empty( $tanggal_akhir_D ) ) {
?>
<script language="JavaScript">
alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
document.location = 'laporan_3.php';
</script>
<?php
} else if ( $tanggal_akhir_D < $tanggal_awal_D ) {
?>
<Script language="javaScript">
alert( 'Tanggal tidak valid' );
document.localName = "laporan_3.php"
</Script>
<?php
} else {
?>
<i>
<b>Informasi:</b>
</i>
hasil pencarian data berdasarkan periode Tanggal
<b>
<?php echo $tanggal_awal_D?>
</b>s/d
<b>
<?php echo $tanggal_akhir_D?>
</b>
<?php
}
?>
<form id="form1" name="form1" method="post">
<?php
$query_D = mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_D' AND '$tanggal_akhir_D' AND ccan.stts = 'In Progress' GROUP by ccan.no ORDER BY ccan.tgl ASC" )or die( mysql_error() );
while ( $data = mysql_fetch_array( $query_D ) ) {
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
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
';
} else if ( !empty( $gambar ) && empty( $rab ) ) {
echo '
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td>&nbsp;</td>
';
} else if ( !empty( $rab ) && empty( $gambar ) ) {
echo '
<td>&nbsp;</td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
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
<td>
<?php echo $nota; ?>
</td>
<td>
<?php echo $wk; ?>
</td>
<td>
<?php echo $stts; ?>
</td>
</tr>
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
$querys11 = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
while ( $datas1 = mysql_fetch_array( $querys11 ) ) {
?>
<tbody>
<tr>
<td>
<?php echo $datas1['time']; ?>
</td>
<td>
<?php echo $datas1['id']; ?>
</td>
<td>
<?php echo $datas1['ket']; ?>
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
if ( mysql_num_rows( $query_D ) == 0 ) {
echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
}
?>
</td>
</tr>
</table>
<?php
}else {
unset( $_REQUEST[ 'cari3' ] );
}
?>
</form>
</div>
<div id="menu4" class="tab-pane fade">
<form id="form555" name="form3" method="post">
<h5>Masukan Tanggal:</h5>
<table width="70%" border="0">
<tbody>
<tr>
<td width="19%">Dari Tanggal</td>
<td width="25%"><input name="dateaw_C" type="date" autofocus required="required" id="dateaw_C" value ="<?php echo $tanggal_awal_C; ?>">
</td>
<td width="20%">Sampai Tanggal</td>
<td width="21%"><input name="dateaK_C" type="date" required="required" id="dateaK_C" value ="<?php echo $tanggal_akhir_C; ?>" >
</td>
<td width="15%"><input type="submit" name="cari4" id="cari4" value="Cari">
</td>
</tr>
</tbody>
</table>
</form>
&nbsp;
<form id="form3order" name="form3" method="post">
<table width="347" border="0" class="center-block">
<tbody>
<tr align="center">
<?php
$cek_data_ca = mysql_num_rows( mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_C' and '$tanggal_akhir_C' and ccan.stts = 'Cancel' GROUP by ccan.no ORDER BY ccan.tgl ASC" ) );
if ( $cek_data_ca > 0 ) {
?>
<td width="15%"><a href="../Config/laporan_C.php" class="btn btn-primary btn-sm" target="_blank">cetak</a>
</td>
<?php
}
?>
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
if ( isset( $_REQUEST[ 'cari3' ] ) ) {
if ( empty( $tanggal_awal_C ) || empty( $tanggal_akhir_C ) ) {
?>
<script language="JavaScript">
alert( 'Tanggal Awal dan Tanggal Akhir Harap di Isi!' );
document.location = 'laporan_3.php';
</script>
<?php
} else if ( $tanggal_akhir_C < $tanggal_awal_C ) {
?>
<Script language="javaScript">
alert( 'Tanggal tidak valid' );
document.localName = "laporan_3.php"
</Script>
<?php
} else {
?>
<i>
<b>Informasi:</b>
</i>
hasil pencarian data berdasarkan periode Tanggal
<b>
<?php echo $tanggal_awal_C?>
</b>s/d
<b>
<?php echo $tanggal_akhir_C?>
</b>
<?php
}
?>
<form id="form1" name="form1" method="post">
<?php
$query_C = mysql_query( "SELECT ccan.*, optima.*, vendor.* FROM ccan LEFT JOIN optima ON ccan.no=optima.no_ccan LEFT JOIN vendor ON ccan.no=vendor.no_ccanw WHERE ccan.tgl BETWEEN '$tanggal_awal_C' AND '$tanggal_akhir_C' AND ccan.stts = 'Cancel' GROUP by ccan.no ORDER BY ccan.tgl ASC" )or die( mysql_error() );
while ( $data = mysql_fetch_array( $query_C ) ) {
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
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
';
} else if ( !empty( $gambar ) && empty( $rab ) ) {
echo '
<td><a href="../GambaUP/' . $gambar . '" class="btn btn-primary btn-sm">Lihat Gambar</a></td>
<td>&nbsp;</td>
';
} else if ( !empty( $rab ) && empty( $gambar ) ) {
echo '
<td>&nbsp;</td>
<td><a href="../RAB/' . $rab . '" class="btn btn-primary btn-sm">Download Rancangan Biaya</a></td>
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
<td>
<?php echo $nota; ?>
</td>
<td>
<?php echo $wk; ?>
</td>
<td>
<?php echo $stts; ?>
</td>
</tr>
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
$querys12 = mysql_query( "select * from vendor where no_ccanw = $no order by no_ccanw" )or die( mysql_error() );
while ( $datas1 = mysql_fetch_array( $querys12 ) ) {
?>
<tbody>
<tr>
<td>
<?php echo $datas1['time']; ?>
</td>
<td>
<?php echo $datas1['id']; ?>
</td>
<td>
<?php echo $datas1['ket']; ?>
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
if ( mysql_num_rows( $query_C
) == 0 ) {
echo "<font color=red><blink>Pencarian Data Tidak Ditemukan!</blink></font>";
}
?>
</td>
</tr>
</table>
<?php
}else {
unset( $_REQUEST[ 'cari4' ] );
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