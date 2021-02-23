<?php
	require_once("../config.php");
	require_once("../user/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Data Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <?php
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');
  ?>
</head>
<body>
	<?php
	if (isset($_GET['id'])) {
		$idview = $_GET['id'];
		$nk = $db->prepare("SELECT namakaryawan FROM karyawan WHERE idkar=$idview");
		$nk->execute();
    	$rownk=$nk->fetch(PDO::FETCH_ASSOC);
    	extract($rownk);
	 ?>
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<h1 class="text-center jt">Data Detail Karyawan <span class="text-uppercase"><br><b><?php echo $namakaryawan; ?></b></span></h1>
			</div>
			<div class="col-md-3">
				<div class="glass col-md-12 rounded mb-2 pb-2">
					<h2 class="jt text-center">MENU</h2>
					<a href="addinput.php" class="btn btn-success mb-1 col-md-12">Input Baru</a>
					<a href="index.php" class="btn-secondary btn mb-1 col-md-12" >&#127939; Back</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-8 tbl">
				<table class="table table-striped glass jt">
				<?php
				$stmt = $db->prepare("SELECT * FROM karyawan WHERE idkar=$idview");
    			$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						extract($row); ?>
								<tr>
									<td colspan="3">
										<div class="d-flex justify-content-center" style="position: relative;width: 300px;height: 300px;overflow: hidden;">
											<img src="../img/foto/<?php echo $foto; ?>" class="mx-auto" style="width: auto;height: 100%;object-fit: cover;">
											<button class="btn btn-primary d-block mr-1 mt-1" data-toggle="modal" data-target="#foto" style="position: absolute; right: 0px;">&#10002</button>
										</div>
									</td>
								</tr>
								<tr>
									<td>ID Karyawan</td>
									<td><?php echo "<h6><b>".$idkar."</b></h6>"; ?></td>
								</tr>
								<tr>
									<td>Nama Karyawan</td>
									<td><?php echo '<h4 class="text-capitalize"><b>'.$namakaryawan.'</b></h4>'; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#namakaryawan">Edit</button></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#alamat">Edit</button></td>
								</tr>
								<tr>
									<td>Domisili</td>
									<td><?php echo $domisili; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#domisili">Edit</button></td>
								</tr>
								<tr>
									<td>No KTP</td>
									<td><?php echo $noktp; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#noktp">Edit</button></td>
								</tr>
								<tr>
									<td>No Hand Phone</td>
									<td><?php echo $nohp; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#nohp">Edit</button></td>
								</tr>
								<tr>
									<td>Tempat & tgl Lahir</td>
									<td>
										<?php
											if ($ttgll==="") {
												echo "Tanggal Lahir Belum Dimasukan";
											} else {
												$date = date_create($ttgll); echo $tempat.", ". date_format($date,"d-F-Y"); 
											}
										?>
									</td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#ttgll">Edit</button></td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td><?php echo $pendidikan; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#pendidikan">Edit</button></td>
								</tr>
								<tr>
									<td>Status Pernikahan</td>
									<td><?php echo $pernikahan; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#pernikahan">Edit</button></td>
								</tr>
								<tr>
									<td>Tgl Masuk</td>
									<td><?php echo $tglmasuk; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#tglmasuk">Edit</button></td>
								</tr>
								<tr>
									<td>Status Karyawan</td>
									<td><?php echo $status; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#status">Edit</button></td>
								</tr>
								<tr>
									<td>Penempatan</td>
									<?php
                    $otcon = $db->prepare("SELECT namaoutlet FROM outlet WHERE idoutlet=$penempatan");
                    $otcon->execute();
                    $otrow=$otcon->fetch(PDO::FETCH_ASSOC);
                      extract($otrow);
                  ?>
									<td><?php echo $namaoutlet; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#penempatan">Edit</button></td>
								</tr>
								<tr>
									<td>Devisi</td>
									<td><?php echo $devisi; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#devisi">Edit</button></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td><?php echo $jabatan; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#jabatan">Edit</button></td>
								</tr>
								<tr>
									<td>Sisa Cuti</td>
									<td><?php echo $cuti; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#cuti">Edit</button></td>
								</tr>
								<tr>
									<td>Peringatan</td>
									<td><?php echo $sp; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#sp">Edit</button></td>
								</tr>
								<tr>
									<td>Gaji Bulan <?php echo date("F Y"); ?></td>
									<td>
										<?php
											if ($gaji==="") {
												echo "Gaji Belum Dimasukan";
											} else {
												echo "Rp. " .number_format($gaji,2);
											}
											
										?>
									</td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#gaji">Edit</button></td>
								</tr>
							</table>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
	<!-- Foto Karyawan -->
	<div class="modal" id="foto">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Foto</h4>
	        <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="foto" class="text-capitalize">Pilih Foto <b><?php echo $namakaryawan; ?></b></label><br>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input type="file" name="foto">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savefoto" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Nama Karyawan -->
	<div class="modal" id="namakaryawan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Nama Lengkap</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="namakaryawan">Nama Karyawan</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="namakaryawan" placeholder="<?php echo $namakaryawan; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savenk" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Alamat -->
	<div class="modal" id="alamat">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Alamat Lengkap</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="alamat">Alamat Lengkap</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="alamat" placeholder="<?php echo $alamat; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savealamat" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Domisili -->
	<div class="modal" id="domisili">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Domisili Lengkap</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="domisili">Domisili Lengkap</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="domisili" placeholder="<?php echo $domisili; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savedomisili" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- No KTP -->
	<div class="modal" id="noktp">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Nomor KTP</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="noktp">Nomor KTP</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="noktp" placeholder="<?php echo $noktp; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savenoktp" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
  </div>
  <!-- NO HP -->
	<div class="modal" id="nohp">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Masukan Nomor Handphone</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="nohp">Nomor Handphone</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="nohp" placeholder="<?php echo $nohp; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savenohp" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
  </div>
  <!-- ttgll -->
	<div class="modal" id="ttgll">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Tempat Tanggal Lahir</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="tempat">Tempat Lahir</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="tempat" placeholder="<?php echo $tempat; ?>"><br>
                <label for="ttgll">Tgl Lahir</label>
                <input class="datepicker" data-date-format="dd/mm/yyyy" type="date" name="ttgll">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savettgll" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Pendidikan -->
	<div class="modal" id="pendidikan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Pendidikan Terakhir</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="pendidikan">Pendidikan</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="pendidikan" placeholder="<?php echo $pendidikan; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savependidikan" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Pernikahan -->
	<div class="modal" id="pernikahan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Status Pernikahan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
              <label for="pernikahan">Pendidikan</label>
              <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
              <select name="pernikahan">
                <option value="Menikah">Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Janda">Janda</option>
                <option value="Duda">Duda</option>
              </select>
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savepernikahan" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Tanggal Masuk -->
	<div class="modal" id="tglmasuk">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Tanggal pertama masuk kerja</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="tglmasuk">Masukan tanggal masuk</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="datepicker" data-date-format="dd/mm/yyyy" type="date" name="tglmasuk">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savetglmasuk" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Status -->
	<div class="modal" id="status">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Status Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
              <label for="status">Masukan Status Karyawan</label><br>
              <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
              <select name="status">
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
                <option value="Resign">Resign</option>
                <option value="PHK">PHK</option>
              </select>
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savestatus" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Penempatan -->
	<div class="modal" id="penempatan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Penempatan Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
              <label for="penempatan">Masukan Penempatan Karyawan : </label>
              <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
							<select name="penempatan">
								<?php
							    $otcon = $db->prepare("SELECT * FROM outlet");
							    $otcon->execute();
							    While ($otrow=$otcon->fetch(PDO::FETCH_ASSOC)){
							        extract($otrow); ?>
							        <option value="<?php echo $idoutlet; ?>"><?php echo $namaoutlet; ?></option>
							    <?php
							    }
							    ?>
							</select>
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savepenempatan" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- devisi -->
	<div class="modal" id="devisi">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Devisi Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
              <label for="devisi">Masukan Devisi Karyawan</label><br>
              <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
              <select name="devisi">
                <option value="Operasional">Operasional</option>
                <option value="Accounting">Accounting</option>
                <option value="Marketing">Marketing</option>
                <option value="HRD">HRD</option>
              </select>
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savedevisi" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Jabatan -->
	<div class="modal" id="jabatan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Jabatan Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="jabatan">Masukan Jabatan Karyawan</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="jabatan" placeholder="<?php echo $jabatan; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savejabatan" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Cuti -->
	<div class="modal" id="cuti">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Sisa Cuti Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="cuti">Masukan Sisa Cuti Karyawan</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="cuti" placeholder="<?php echo $cuti; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savecuti" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- SP -->
	<div class="modal" id="sp">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Peringatan(SP) Karyawan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
              <label for="sp">Masukan Peringatan(SP) Karyawan</label><br>
              <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
              <select name="sp">
              	<option value="Tidak Ada">Tidak Ada</option>
                <option value="Surat Teguran">Surat Teguran</option>
                <option value="SP 1">SP 1</option>
                <option value="SP 2">SP 2</option>
                <option value="SP 3">SP 3</option>
              </select>
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savesp" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>
	<!-- Gaji -->
	<div class="modal" id="gaji">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Gaji Karyawan Bulan Ini</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
        <form action="edit.php" method="POST" enctype="multipart/form-data">
	      	<div class="modal-body">
            <div class="form-group ">
                <label for="gaji">Masukan Gaji Karyawan Bulan Ini</label>
                <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
                <input class="form-control" type="text" name="gaji" placeholder="<?php echo $gaji; ?>">
            </div>
	      	</div>

	      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-success" name="savegaji" value="Simpan" />
		      </div>
        </form>

	    </div>
	  </div>
	</div>

</body>
</html>