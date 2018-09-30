<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/user.inc.php';
$pro = new User($db);
$stmt = $pro->readAll();
?>

<div class="container">
    <div class="row">
        
            <div class="col-lg-12">
                <h3>Beranda</h3>
            </div>
        </div><!--/.row-->
        
        <hr>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3 col-md-offset-2">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <div class="text-muted"><?php echo $stmt1->rowCount(); ?></div>
                        </div>

                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">Jumlah data warga</div>
                            
                        </div>
                    </div>
                </div>
                <br>
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <div class="text-muted"><?php echo $stmt->rowCount(); ?></div>
                            <svg></svg>
                        </div>

                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">Jumlah user</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>


	   <?php
include_once 'footer.php';
?>
	