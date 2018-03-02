<?php
include( '../config/ceksuper.php' );
include( '../config/konek.php');
$namamu = $_SESSION[ 'usernamel' ];
$namamu = ucwords( strtolower( $namamu ) );
$file	  =	$database.'_'.date("DdMY").'_'.time().'.sql';
$ccan=mysql_query("select * from login where level LIKE '%Ccan%' and level !=''");
$optima=mysql_query("select * from login where level LIKE '%Optimags%' and level !=''");
$vendor=mysql_query("select * from login where vendor !=''");
?>
<html>
<head>
	<title>Telkom</title>
	<link rel="stylesheet" href="../css/bootstrap-3.3.7.css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap-3.3.7.js"></script>
	<script>
		function deleteask() {
			if ( confirm( 'Are you sure you want to logout?' ) ) {
				return true;
			} else {
				return false;
			}
		}

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
					<li>
						<a href=Beranda.php>Menu Utama</a>
					</li>
					<li>
						<a href=Daftar.php>Daftar Akun Baru</a>
					</li>
					<li class="active">
						<a href=#>Backup dan Restore</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<div class="dropdown">
						<button class="dropbtn">selamat datang&nbsp;<?php echo $namamu ?></button>
						<div class="dropdown-content">
							<a href="../Config/logout.php" onclick="return logoutask();">Log Out</a>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#menu1">Backup</a>
		</li>
		<li><a data-toggle="tab" href="#menu2">Restore</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="menu1" class="tab-pane fade in active">
			<form id="form1" method="post" action="" enctype="multipart/form-data">
				<table width="7%" border="0" align="center">
					<tbody>

						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Backup</td>
							<td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input type="submit" class="btn btn-primary btn-sm center-block" name="backup"  onClick="return pastikan('Backup database')" value="Proses Backup" title="backup"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div id="menu2" class="tab-pane fade">
			<form id="form1" name="postform" method="post" action="" enctype="multipart/form-data">
				<table width="7%" border="0" align="center">
					<tbody>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Restore</td>
							<td>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input type="file" onclick="return pastikan('Restore database')" name="restore" value="Restore Database"/>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
					<tfoot id="kaki" style="">
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="Reset">
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
	<footer>&copy; 2017-<?php echo date("Y");?>
	</footer>
</body>
</html>
<?php
function restore($file) {
	global $rest_dir;
	$nama_file	= $file['name'];
	$ukrn_file	= $file['size'];
	$tmp_file	= $file['tmp_name'];
	if ($nama_file == "")
	{
		echo "Fatal Error";
	}
	else
	{
		$alamatfile	= $rest_dir.$nama_file;
		$templine	= array();
		if (move_uploaded_file($tmp_file , $alamatfile))
		{
			$templine	= '';
			$lines		= file($alamatfile);
			foreach ($lines as $line)
			{
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;

				$templine .= $line;

				if (substr(trim($line), -1, 1) == ';')
				{
					mysql_query($templine) or print('Query gagal \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');

					$templine = '';
				}
			}
			echo "<center>Berhasil Restore Database, silahkan di cek.</center>";

		}else{
			echo "Proses upload gagal, kode error = " . $file['error'];
		}
	}
}
function backup($nama_file,$tables = '')
{
	global $return, $tables, $back_dir, $database ;
	if($tables == '')
	{
		$tables = array();
		$result = @mysql_list_tables($database);
		while($row = @mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	$return	= '';
	foreach($tables as $table)
	{
		$result	 = @mysql_query('SELECT * FROM '.$table);
		$num_fields = @mysql_num_fields($result);
		$return	.= "DROP TABLE IF EXISTS ".$table.";";
		$row2	 = @mysql_fetch_row(mysql_query('SHOW CREATE TABLE  '.$table));
		$return	.= "\n\n".$row2[1].";\n\n";
		for ($i = 0; $i < $num_fields; $i++)
		{
			while($row = @mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';

				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = @addslashes($row[$j]);
					$row[$j] = @ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	$nama_file;
	$handle = fopen($back_dir.$nama_file,'w+');
	fwrite($handle, $return);
	fclose($handle);
}

if(isset($_GET['nama_file']))
{
	$file = $back_dir.$_GET['nama_file'];
	if (file_exists($file))
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
	else
	{
		echo "file {$_GET['nama_file']} sudah tidak ada.";
	}
}
if(isset($_POST['backup']))
{
	backup($file);
	echo 'Backup database telah selesai <a style="cursor:pointer" href="'.$file.'" title=Download>Download file database</a>';
	echo "<pre>";
	print_r($return);
	echo "</pre>";
}
else
{
	unset($_POST['backup']);
}
if(isset($_POST['restore']))
{
	restore($_FILES['datafile']);
	echo "<pre>";
	echo "</pre>";
}
else
{
	unset($_POST['restore']);
}

?>
