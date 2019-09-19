<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
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
				<td><h3 style="color: black; margin-left: 10px; margin-bottom: -30px;">LOGBOOK KEGIATAN</h3></td>
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
					$date1="";
					$date2="";
				?>	
					<form class="form-inline" action="<?php echo site_url('c_logbook/search_date');?>" method = "post">
						<div class="form-group">
							<input class="form-control" type="date" name = "date1" value="<?php echo $date1;?>"/>
						</div> s/d
						<div class="form-group">
							<input class="form-control" type="date" name = "date2" value="<?php echo $date2;?>"/>
						</div>
						<button type="submit" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-search"></i> Search</button>
					</form>
				<center>
					<a href="<?php echo base_url(); ?>index.php/c_logbook/add" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-plus"></i> Petugas</a>
					<table class="table table-bordered" style="font-size: 11px;" >
						<thead>
							<tr style="background-color: DodgerBlue; color: white;">
								<th width="50px">SHIFT</th>
								<th width="230px">NAMA</th>
								<th >INVENTARIS</th>
								<th width="70px">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
	                          $datas = array();
	                          foreach ($sql->result() as $row) {
	                            if(!in_array($row->tanggal, $datas)){
	                              $datas[$row->tanggal] = array(
	                              	'id'			=> array(),
	                                'shift'			=> array(),
	                                'nama'			=> array(),
	                                'inventaris'	=> array()
	                              );
	                            }
	                          }
	                          foreach ($sql->result() as $row) {
	                            foreach ($datas as $key => $item) {
	                              if ($row->tanggal == $key) {
	                                  array_push($datas[$row->tanggal]['id'], $row->id);
	                                  array_push($datas[$row->tanggal]['shift'], $row->shift);
	                                  array_push($datas[$row->tanggal]['nama'], $row->nama);
	                                  array_push($datas[$row->tanggal]['inventaris'], $row->inventaris);
	                              }
	                            }
	                          }
	                          foreach ($datas as $tanggal => $data) {
	                            echo "<tr style='background-color: #77bcff; color: white; text-align: center;'>
	                                    <td colspan='4'><center>".$tanggal."</center></td>
	                                    </tr>"; 
	                                $count = count($data['shift']);
	                                for ($i = 0; $i < $count; $i++){
	                                  echo "<tr style='background-color: white;'>
	                                        <td>".$data['shift'][$i]."</td>";
	                                  echo "<td>".$data['nama'][$i]."</td>";
	                                  echo "<td>".$data['inventaris'][$i]."</td>";
	                                  ?>
	                                  <td width="70px"><a href="<?php echo base_url(); ?>index.php/c_logbook/data_id/<?php echo $data['id'][$i];?>" class="btn btn-info btn-xs" style="font-size: 12px;"><i class="fa fa-info"></i> Detail</a>
									 </a>
	                                  </td>
	                                  <?php         
	                                   echo "</tr>";
	                                }
	                          }
	                          ?>
                        </tbody>
					</table>
					<div class="row">
				    	<div class="col">
				    		<!--Tampilkan pagination-->
				    		<?php echo $pagination; ?>
				    	</div>
				    </div>
					<a href="<?php echo base_url(); ?>index.php/c_login/keluar" class="btn btn-primary" style="font-size: 12px;"><i class="fa fa-sign-out"></i>Log Out</a>
					<br>
					<br>
					<div><h6>&copy; 2018</h6></div>
				</center>
			</div>
	</body>
</html>