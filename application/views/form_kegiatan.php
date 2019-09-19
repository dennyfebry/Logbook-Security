<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Kegiatan</title>
		<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
		<script type="text/javascript">        
		    function tampilkanwaktu(){          
		    	var waktu = new Date();          
		    	var sh = waktu.getHours() + "";   
		    	var sm = waktu.getMinutes() + "";    
		    	var ss = waktu.getSeconds() + ""; 
		    	document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
		    }
		</script>
	</head>
	<body background="<?php echo base_url()?>assets/img/background.jpg" style="color: black;">
		<table>
			<tr>
				<td><h2 style="color: black; margin-left: 10px; margin-bottom: -30px;">LOGBOOK KEGIATAN </h2></td>
				<th rowspan="2"><div style="margin-left: 10px; margin-bottom: 10px;"><img src="<?php echo base_url()?>assets/img/Logoo.png" width="250" height="87"></div></th>
			</tr>
			<tr>
				<td >
					<div style="margin-left: 10px;">
						<strong>
							<?php
							$hari = date('l');
							if ($hari=="Sunday") {
							 echo "Minggu";
							}elseif ($hari=="Monday") {
							 echo "Senin";
							}elseif ($hari=="Tuesday") {
							 echo "Selasa";
							}elseif ($hari=="Wednesday") {
							 echo "Rabu";
							}elseif ($hari=="Thursday") {
							 echo("Kamis");
							}elseif ($hari=="Friday") {
							 echo "Jum'at";
							}elseif ($hari=="Saturday") {
							 echo "Sabtu";
							}
							?>,

							<?php
							$tgl =date('d');
							echo $tgl;
							
							$bulan =date('F');
							if ($bulan=="January") {
							 echo " Januari ";
							}elseif ($bulan=="February") {
							 echo " Februari ";
							}elseif ($bulan=="March") {
							 echo " Maret ";
							}elseif ($bulan=="April") {
							 echo " April ";
							}elseif ($bulan=="May") {
							 echo " Mei ";
							}elseif ($bulan=="June") {
							 echo " Juni ";
							}elseif ($bulan=="July") {
							 echo " Juli ";
							}elseif ($bulan=="August") {
							 echo " Agustus ";
							}elseif ($bulan=="September") {
							 echo " September ";
							}elseif ($bulan=="October") {
							 echo " Oktober ";
							}elseif ($bulan=="November") {
							 echo " November ";
							}elseif ($bulan=="December") {
							 echo " Desember ";
							}
							$tahun=date('Y');
							echo $tahun; ?>

							<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
							<span id="clock"></span>
						</strong>
					</div>
				</td>
			</tr>
		</table>	
			<div class="container">
				<?php
					foreach ($sql->result() as $row) {
					}?>
					<?php
						$id = "";
						$id_k = "";
						$waktu_awal = "";
						$waktu_akhir = "";
						$kegiatan = "";
						if($op=="edit"){
							foreach ($sql->result() as $obj) {
								$op = "edit";
								$id = $obj->id;
								$id_k = $obj->id_k;
								$waktu_awal = $obj->waktu_awal;
								$waktu_akhir = $obj->waktu_akhir;
								$kegiatan = $obj->kegiatan;
							}
						}
					?>

					<form role="form" action="<?php echo base_url(); ?>index.php/c_logbook/simpan_kegiatan " method="POST">	
						<input type="hidden" class="form-control"  name="op" value="<?php echo $op;?>">
						<input type="hidden" class="form-control"  name="id" value="<?php echo $row->id;?>">
						<input type="hidden" class="form-control"  name="id_k" value="<?php echo $id_k;?>">
						<div class="form-group">
							<label>Waktu Mulai</label>
							<input type="time" class="form-control"  name="waktu_awal" value="<?php echo $waktu_awal;?>">
						</div>
						<div class="form-group">
							<label>Waktu Selesai</label>
							<input type="time" class="form-control"  name="waktu_akhir" value="<?php echo $waktu_akhir;?>">
						</div>
						<div class="form-group">
							<label>Kegiatan</label>
							<input type="text" class="form-control"  name="kegiatan" value="<?php echo $kegiatan;?>" placeholder="Kegiatan">
						</div>
						<button type="submit" class="btn btn-default">Simpan</button>
					</form>
			</div>
		<!-- </div> -->
		<center><div><h6>&copy; 2018</h6></div></center>	
	</body>

	

</html>
		



