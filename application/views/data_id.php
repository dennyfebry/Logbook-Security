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
					foreach ($sql1->result() as $row1) {
				?>	
				<tr>
					<th width="80px">Nama</th>
					<td>:  <?php echo $row1->nama; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td>:  <?php echo $row1->tanggal; ?></td>
				</tr>
				<tr>
					<th >Shift</th>
					<td>:  <?php echo $row1->shift; ?></td>
				</tr>
				<tr>
					<th >Inventaris</th>
					<td>:  <?php echo $row1->inventaris; ?></td>
				</tr>
					<th><a href="<?php echo base_url(); ?>index.php/c_logbook/add_kegiatan/<?php echo $row1->id;?>	" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-plus"></i> Kegiatan</a>
						<!-- <a href="<?php echo base_url(); ?>index.php/c_logbook/hapus_id/<?php echo $row1->id;?>" onclick="return confirm('Sebelumnya anda harus menghapus kegiatan terlebih dahulu')" class="btn btn-danger btn-xs" style="font-size: 10px;"><span class="glyphicon glyphicon-trash">Hapus Petugas</span></a> -->	
					</th>
					<td>
						<a href="<?php echo base_url(); ?>index.php/c_logbook/edit_id/<?php echo $row1->id;?>" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Edit Data</a>
					</td>
					
			</table>
			<br>
			<table class="table table-bordered" style="font-size: 11px;" >
				<thead style="background-color: DodgerBlue; color: white;">
				    <tr style="text-align: center;">
						<th >KEGIATAN</th>
						<th width="231px">ACTION</th>
					</tr>
				</thead>
				<tbody style="background-color: white;">
					<?php
						foreach ($sql2->result() as $row2) {
							?>	
							 <tr>
								<th ><?php echo $row2->waktu_awal; ?> - <?php echo $row2->waktu_akhir; ?> : <?php echo $row2->kegiatan; ?></th>
								<th >
									<a href="<?php echo base_url(); ?>index.php/c_logbook/edit_id_k/<?php echo $row2->id_k;?>" class="btn btn-info btn-xs" style="font-size: 10px;"><i class="fa fa-edit"></i> Edit Kegiatan</a>
									<a href="<?php echo base_url(); ?>index.php/c_logbook/hapus_id_k/<?php echo $row2->id_k;?>" onclick="return confirm('anda yakin ingin menghapus?')" class="btn btn-danger btn-xs" style="font-size: 10px;"><i class="fa fa-trash"></i> Hapus Kegiatan</a></th>			
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<center>
			<a href="<?php echo base_url(); ?>index.php/c_report/index/<?php echo $row1	->id;?>" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-print"></i> Report</a><br><br>
			<a href="<?php echo base_url(); ?>index.php/c_logbook/index" class="btn btn-primary" style="font-size: 10px;"><i class="fa fa-angle-left"></i> Kembali</a><br><br><br>
			<div><h6>&copy; 2018</h6></div>
			<?php } ?>
		</center>	
	</body>
</html>
		



