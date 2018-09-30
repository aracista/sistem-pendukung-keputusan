<?php
include_once 'header.php';
if($_POST){
	
	include_once 'includes/alternatif.inc.php';
	$eks = new Alternatif($db);

	$eks->nik = $_POST['nik'];
	$eks->na = $_POST['na'];
	$eks->rt = $_POST['rt'];
	$eks->rw = $_POST['rw'];
	$eks->kl = $_POST['kl'];
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="data-warga.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> NIK yang dimasukkan sudah ada, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Tambah data warga</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="nik">NIK</label>
				    <input type="text" class="form-control" id="nik" name="nik" required>
				  </div>
				  <div class="form-group">
				    <label for="na">Nama</label>
				    <input type="text" class="form-control" id="na" name="na" required>
				  </div>
				  <div class="form-group">
				    <label for="rt">RT</label>
				    <input type="text" class="form-control" id="rt" name="rt" required>
				  </div>
				  <div class="form-group">
				    <label for="rw">RW</label>
				    <input type="text" class="form-control" id="rw" name="rw" required>
				  </div>
				  <div class="form-group">
				    <label for="kl">Kelurahan</label>
				    <input type="text" class="form-control" id="kl" name="kl" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='data-warga.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>