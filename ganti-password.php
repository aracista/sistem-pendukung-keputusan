<?php
include_once 'header.php';


include_once 'includes/user.inc.php';
$eks = new User($db);

$eks->id = $_SESSION['id_pengguna'];
 
$eks->readOne();

if($_POST){

    $eks->pw = md5($_POST['pw']);

    if($eks->pw == md5($_POST['up'])){
    
      $eks->updatePass();
        echo "<script>location.href='index.php'</script>";
      } else {
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Kata sandi yang anda masukkan tidak sama antara Password dan konfirmasi Password.
</div>
<?php
    
}
}
?>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="page-header">
              <h5>Ganti password</h5>
            </div>
            
                <form method="post">
            
                  <div class="form-group">
                    <label for="un">password</label>
                    <input type="password" class="form-control" id="pw" name="pw" >
                  </div>
                  <div class="form-group">
                    <label for="un">konfirmasi password</label>
                    <input type="password" class="form-control" id="up" name="up">
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="button" onclick="location.href='index.php'" class="btn btn-success">Kembali</button>
                </form>
              
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <?php include_once 'sidebar.php'; ?>
          </div>
        </div>
        <?php
include_once 'footer.php';
?>