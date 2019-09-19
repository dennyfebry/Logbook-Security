<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Petugas</title>
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
				$id = "";
				$nama = "";
				$tanggal = "";
				$shift = "";
				$invetaris = "";
				if($op=="edit"){
					foreach ($sql->result() as $row) {
						$op = "edit";
						$id = $row->id;
						$nama = $row->nama;
						$tanggal = $row->tanggal;
						$shift = $row->shift;
						$inventaris = $row->inventaris;
						$cheked = explode(', ', $row->inventaris);
					}
				}
				
				?>	
			<form role="form" action="<?php echo base_url(); ?>index.php/c_logbook/simpan_petugas" method="POST">
				<input type="hidden" class="form-control"  name="op" value="<?php echo $op;?>">
				<input type="hidden" class="form-control"  name="id" value="<?php echo $id;?>">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control"  name="nama" value="<?php echo $nama;?>" placeholder="Nama">
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input type="date" class="form-control"  name="tanggal" min="2000-01-02" value="<?php echo $tanggal;?>" >
				</div>
				<div class="form-group">
					<label>Shift : </label>
					<select name="shift">
						<option value="Pagi" <?php $row->shift == 'Pagi' ? print "selected": "" ?> >Pagi</option>
						<option value="Malam" <?php $row->shift == 'Malam' ? print "selected": "" ?> >Malam</option>
					</select>
				</div>
				<div class="form-group">
					<label>Inventaris : </label>
					<br>
					<input type="checkbox" name="inventaris[]" value="Remote LED"
					<?php in_array('Remote LED', $cheked) ? print "checked": "" ?>> Remote LED <br>
					<input type="checkbox" name="inventaris[]" value="Remote TV"
					<?php in_array('Remote TV', $cheked) ? print "checked": "" ?>> Remote TV <br>
					<input type="checkbox" name="inventaris[]" value="Remote AC"
					<?php in_array('Remote AC', $cheked) ? print "checked": "" ?>> Remote AC <br>
					<input type="checkbox" name="inventaris[]" value="Monitor CCTV"
					<?php in_array('Monitor CCTV', $cheked) ? print "checked": "" ?>> Monitor CCTV <br>
					<input type="checkbox" name="inventaris[]" value="Monitor Agenda"
					<?php in_array('Monitor Agenda', $cheked) ? print "checked": "" ?>> Monitor Agenda <br>
					<input type="checkbox" name="inventaris[]" value="Sepatu Boots"
					<?php in_array('Sepatu Boots', $cheked) ? print "checked": "" ?>> Sepatu Boots <br>
					<input type="checkbox" name="inventaris[]" value="Galon/Dispenser"
					<?php in_array('Galon/Dispenser', $cheked) ? print "checked": "" ?>> Galon/Dispenser <br>
					<input type="checkbox" name="inventaris[]" value="TV/Antena"
					<?php in_array('TV/Antena', $cheked) ? print "checked": "" ?>> TV/Antena <br>
					<input type="checkbox" name="inventaris[]" value="Borgol"
					<?php in_array('Borgol', $cheked) ? print "checked": "" ?>> Borgol<br>
					<input type="checkbox" name="inventaris[]" value="Payung"
					<?php in_array('Payung', $cheked) ? print "checked": "" ?>> Payung<br>
					<input type="checkbox" name="inventaris[]" value="Telephone"
					<?php in_array('Telephone', $cheked) ? print "checked": "" ?>> Telephone<br>
					<input type="checkbox" name="inventaris[]" value="Kalender"
					<?php in_array('Kalender', $cheked) ? print "checked": "" ?>> Kalender<br>
					<input type="checkbox" name="inventaris[]" value="Announcer"
					<?php in_array('Announcer', $cheked) ? print "checked": "" ?>> Announcer<br>
					<input type="checkbox" name="inventaris[]" value="Tempat Sampah"
					<?php in_array('Tempat Sampah', $cheked) ? print "checked": "" ?>> Tempat Sampah<br>
					<input type="checkbox" name="inventaris[]" value="Vending Mesin"
					<?php in_array('Vending Mesin', $cheked) ? print "checked": "" ?>> Vending Mesin<br>
					<input type="checkbox" name="inventaris[]" value="Pot Bunga"
					<?php in_array('Pot Bunga', $cheked) ? print "checked": "" ?>> Pot Bunga<br>
					<input type="checkbox" name="inventaris[]" value="Master Key"
					<?php in_array('Master Key', $cheked) ? print "checked": "" ?>> Master Key<br>
					<input type="checkbox" name="inventaris[]" value="Meja Kursi"
					<?php in_array('Meja Kursi', $cheked) ? print "checked": "" ?>> Meja Kursi<br>
					<input type="checkbox" name="inventaris[]" value="Sofa"
					<?php in_array('Sofa', $cheked) ? print "checked": "" ?>> Sofa<br>
				</div>
					<button type="submit" value="submit" class="btn btn-default">Simpan</button>
			</form>
		</div>
		<center><div><h6>&copy; 2018</h6></div></center>	
	</body>
</html>