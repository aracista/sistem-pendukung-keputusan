<?php
include "includes/config.php";
session_start();
if(!isset($_SESSION['nama_lengkap'])){
	echo "<script>location.href='login.php'</script>";
}
$config = new Config();
$db = $config->getConnection();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pendukung Keputusan</title>

        <!-- Bootstrap CSS CDN -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        
    </head>
    <body>
           
    <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>
                <div class="sidebar-header">
                    <h5 style="color: white;">SPK PENERIMAAN RASKIN / RASTRA</h5>
                </div>

                <ul class="list-unstyled components">
                    <h5><i class="fas fa-bars"></i> Menu</h5>
                    <li>
                        <a href="index.php"><i class="fas fa-home"></i> Beranda</a>
                    </li>
                    <li>
                        <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="far fa-user"></i>
                            Data warga
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="data-warga.php"><i class="fas fa-clipboard-list"></i></span> Data warga</a>
                            </li>
                            <li>
                                <a href="data-klasifikasi.php"><i class="fas fa-clipboard-list"></i></span> Data klasifikasi</a>
                            </li>
                        
                        </ul>
                    </li>
                    </li>
                    <li>
                        <a href="kriteria.php"><i class="far fa-folder-open"></i> Kriteria</a>
                    </li>
                    <li>
                        <a href="nilai.php"><i class="far fa-folder-open"></i> Nilai</a>
                    </li>
                     <li>
                        <a href="#hasilSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="far fa-list-alt"></i>
                            Hasil
                        </a>
                        <ul class="collapse list-unstyled" id="hasilSubmenu">
                            <li>
                                <a href="normalisasi.php"><i class="fas fa-clipboard-list"></i></span> Normalisasi</a>
                            </li>
                            <li>
                                <a href="hasil.php"><i class="fas fa-clipboard-list"></i> hasil akhir</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="user.php"><i class="fas fa-cog"></i>  Kelola Pengguna</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a href="profil.php" class="download">profil</a></li>
                    <li><a href="ganti-password.php" class="article">ganti password</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn btn-lg">
                                <i class="fas fa-bars"></i>
                                <span></span>
                            </button>

                        </div>


                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>

                            </ul>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><h4 align="center" style=" ">&nbsp;SELEKSI PENERIMA RASKIN / RASTRA</h4></li>
                            </ul>
                        </div>
                    </div>
                </nav>
  
    <div class="container">