<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/alternatif.inc.php';
$eks = new Alternatif($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->nik = $_POST['nik'];
	$eks->na = $_POST['na'];
	$eks->rt = $_POST['rt'];
	$eks->rw = $_POST['rw'];
	$eks->kl = $_POST['kl'];
	
	if($eks->update()){
		echo "<script>location.href='data-warga.php'</script>";
	} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Ubah data warga</h5>
			</div>
			
			    <form method="post">
			      <div class="form-group">
				    <label for="kt">NIK</label>
				    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $eks->nik; ?>">
				  </div>
				  <div class="form-group">
				    <label for="na">Nama</label>
				    <input type="text" class="form-control" id="na" name="na" value="<?php echo $eks->na; ?>">
				  </div>
				  <div class="form-group">
				    <label for="rt">RT</label>
				    <input type="text" class="form-control" id="rt" name="rt" value="<?php echo $eks->rt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="rw">RW</label>
				    <input type="text" class="form-control" id="rw" name="rw" value="<?php echo $eks->rw; ?>">
				  </div>
				  <div class="form-group">
				    <label for="kl">Kelurahan</label>
				    <input type="text" class="form-control" id="kl" name="kl" value="<?php echo $eks->kl; ?>">
				  </div>
				  <button type="submit" class="btn btn-primary">Ubah</button>
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