<?php
include_once 'header.php';
include_once 'includes/user.inc.php';
$eks = new User($db);

$eks->id = $_SESSION['id_pengguna'];

$eks->readOne(); 

if($_POST){

    $eks->nl = $_POST['nl'];
    
    
    if($eks->update()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Anda telah mengubah profil sendiri.
</div>
<?php
    } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Profil!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
    }
}
?>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="page-header">
              <h5>Profil Anda</h5>
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $eks->nl; ?>" required>
                  </div>
      
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
              
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <?php include_once 'sidebar.php'; ?>
          </div>
        </div>
        <?php
include_once 'footer.php';
?>