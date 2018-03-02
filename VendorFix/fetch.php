<?php
	include( '../Config/cekven.php' );
	date_default_timezone_set('Asia/Hong_Kong');
	$idven = $_SESSION[ 'vendor' ];
	if ( isset( $_POST[ "view" ] ) ) {
		include( "../Config/konek.php" );
		if ( $_POST[ "view" ] != '' ) {
			$update_query = "UPDATE notif set S_V=1 where S_V=0 and id = 'Optima Gs' and komentar LIKE '%$idven%' AND komentar LIKE '%diperbaharui%' OR S_V=0 and id = 'Optima Gs' and komentar LIKE '%$idven%'";
			mysql_query( $update_query );
		}
		$querys = "SELECT * FROM notif WHERE komentar LIKE '%$idven%' AND id = 'Optima Gs' ORDER BY waktu DESC, no DESC";
		$results = mysql_query( $querys );
		$output = '';
		if ( mysql_num_rows( $results ) > 0 ) {
			while ( $row = mysql_fetch_array( $results ) ) {
				$tanggalve = $row[ 'waktu' ];
				$pisah_1 = explode( '-', $tanggalve );
				$tahun_1 = substr( $tanggalve, 0, 4 );
				$bulan_1 = substr( $tanggalve, 5, 2 );
				$tgl_1 = substr( $tanggalve, 8, 2 );
				$jam = substr($tanggalve,11,2);
				$menit= substr($tanggalve,14,2);
				$detik= substr($tanggalve,17,2);
				$result = $tahun_1 . "-" . $bulan_1 . "-" . $tgl_1. " ". $jam . ":". $menit.":". $detik;
				$tanggalrawven = strtotime( $result );
				$date2 = strtotime(date('Y-m-d H:i:s'));
				$seconds_diff = $date2 - $tanggalrawven;
				if ($seconds_diff >= 31536000) {
					$seen="Dilihat " . intval($seconds_diff / 31536000) . " tahun yang lalu";
					} elseif ($seconds_diff >= 2419200) {
					$seen= "Dilihat " . intval($seconds_diff / 2419200) . " bulan yang lalu";
					} elseif ($seconds_diff >= 86400) {
					$seen= "Dilihat " . intval($seconds_diff / 86400) . " hari yang lalu";
					} elseif ($seconds_diff >= 3600) {
					$seen= "Dilihat " . intval($seconds_diff / 3600) . " jam yang lalu";
					} elseif ($seconds_diff >= 60) {
					$seen= "Dilihat " . intval($seconds_diff / 60) . " menit yang lalu";
					} else {
					$seen= "Dilihat kurang dari semenit lalu";
				}
				$output .= '
				<a href="detailVen.php?ni=' . $row[ "no_ccann" ] . '" style="color: #000000;Font-family:Times New Roman;text-decoration:none;">
				<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>' . $row[ "komentar" ] . '</strong><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><em>' .$seen . '</em></small>
				</li>
				</a>
				<li class="divider"></li>
				';
			}
		}
		$query_1 = "SELECT * from notif where S_V=0 and id = 'Optima Gs' and komentar LIKE '%$idven%' AND komentar LIKE '%diperbaharui%' OR S_V=0 and id = 'Optima Gs' and komentar LIKE '%$idven%'";
		$result_1 = mysql_query( $query_1 );
		$count = mysql_num_rows( $result_1 );
		$data = array(
		'notification' => $output,
		'unseen_notification' => $count
		);
		echo json_encode( $data );
	}
?>