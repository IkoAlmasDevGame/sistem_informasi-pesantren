<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Sistem Website</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "ketua"){
                require_once("../ui/header.php");
            }else{
                header("location:../ui/header.php?page=beranda");
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-defualt">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Sistem Website</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=sistemwebsite" class="text-decoration-none text-primary">
                                Sistem Website
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Setting Website - <?php echo $isi['nama_pesantren'] ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>Nama Pesantren</th>
                                    <th>Gambar</th>
                                    <th>Status Website</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $configs->query("SELECT * FROM sistem WHERE flags='1'");
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $isi['nama_pesantren'] ?></td>
                                    <td class="text-center">
                                        <img src="../../../assets/<?php echo $isi['gambar'] ?>" width="64" height="64"
                                            alt="">
                                    </td>
                                    <td>
                                        <?php if($isi['flags'] == "1"){echo "aktif"; }else{ echo "tidak aktif"; } ?>
                                    </td>
                                    <td>
                                        <a href="?page=sistemwebsite&aksi=ubahsistemwebsite&id=<?=$isi['id']?>"
                                            class="btn btn-sm btn-warning" aria-current="page">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>