<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Detail</title>
		<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
		<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
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
			<table style="font-size: 15px;" >
				<?php
					foreach ($sql1->result() as $obj2) {
				?>	
				<tr>
					<th width="80px">Nama</th>
					<td>:  <?php echo $obj2->nama; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td>:  <?php echo $obj2->tanggal; ?></td>
				</tr>
				<tr>
					<th >Shift</th>
					<td>:  <?php echo $obj2->shift; ?></td>
				</tr>
				<tr>
					<th >Inventaris</th>
					<td>:  <?php echo $obj2->inventaris; ?></td>
				</tr>
					
					
			</table>
			<br>
			<table class="table table-bordered" style="font-size: 11px;" >
				<thead style="background-color: #43688c; color: white;">
				    <tr style="text-align: center;">
						<th >KEGIATAN</th>
					</tr>
				</thead>
				<tbody style="background-color: white;">
					<?php
							foreach ($sql2->result() as $obj3) {
							?>	
							 <tr>
								<th ><?php echo $obj3->waktu_awal; ?> - <?php echo $obj3->waktu_akhir; ?> : <?php echo $obj3->kegiatan; ?></th>		
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<center>
			<a href="<?php echo base_url(); ?>index.php/c_report/index/<?php echo $obj2->id;?>" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-print"></i> Report</a><br><br>
			<a href="<?php echo base_url(); ?>index.php/c_logbook/indexx" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-angle-left"></i> Kembali</a><br><br><br>
			<div><h6>&copy; 2018</h6></div>
			<?php } ?>
		</center>	
	</body>
</html>
		



