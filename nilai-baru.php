<?php
include_once 'header.php';
include_once 'includes/kriteria.inc.php';
$pgn2 = new Kriteria($db);
if($_POST){
	
	include_once 'includes/nilai.inc.php';
	$eks = new Nilai($db);

	$eks->ik = $_POST['ik']; 
	$eks->kn = $_POST['kn'];
	$eks->jn = $_POST['jn'];
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="nilai.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Tambah Nilai Preferensi</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kn">Keterangan Nilai</label>
				    <input type="text" class="form-control" id="kn" name="kn" required>
				  </div>

				  <div class="form-group">
				  <label for="ik">Kriteria</label>
				    <select class="form-control" id="ik" name="ik">
				    	<?php
						$stmt2 = $pgn2->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							echo "<option value='{$id_kriteria}'>{$nama_kriteria}</option>";
						}
					    ?>
				    </select>
				    
				</div>
				  <div class="form-group">
				    <label for="jn">Jumlah Nilai</label>
				    <input type="text" class="form-control" id="jn" name="jn" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='nilai.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>