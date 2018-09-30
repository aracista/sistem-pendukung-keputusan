<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pgn = new Nilai($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/kriteria.inc.php';
$eks = new Kriteria($db);

$eks->id = $id;

$eks->readOne(); 

if($_POST){

	$eks->nk = $_POST['nk'];
	$eks->tk = $_POST['tk'];
	$eks->bk = $_POST['bk'];
	
	if($eks->update()){
		echo "<script>location.href='kriteria.php'</script>";
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
			  <h5>Ubah Kriteria</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="nk">Nama Kriteria</label>
				    <input type="text" class="form-control" id="nk" name="nk" value="<?php echo $eks->nk; ?>">
				  </div>
				  <div class="form-group">
				    <label for="tk">Tipe Kriteria</label>
				    <select class="form-control" id="tk" name="tk">
				    	<option><?php echo $eks->tk; ?></option>
				    	<option value='benefit'>Benefit</option>
				    	<option value='cost'>Cost</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label for="bk">Bobot Kriteria</label>
				    <input type="text" class="form-control" id="bk" name="bk" value="<?php echo $eks->bk; ?>">
				  </div>
				  <button type="submit" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='kriteria.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>