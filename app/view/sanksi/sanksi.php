<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Sanksi</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "ketua" || $_SESSION['role'] == "keamanan"){
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
                    <h4 class="panel-heading">Data Master Sanksi</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=sanksi" class="text-decoration-none text-primary">
                                Sanksi
                            </a>
                        </li>
                        <?php 
                        if(isset($_GET['aksi'])){
                            if($_GET['aksi']=="tambahsanksi"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=sanksi&aksi=tambahsanksi" class="text-decoration-none text-primary">
                                Tambah data Sanksi
                            </a>
                        </li>
                        <?php
                            }else if($_GET['aksi'] == "ubahsanksi"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=sanksi&aksi=ubahsanksi&no_sanksi=<?=$_GET['no_sanksi']?>"
                                class="text-decoration-none text-primary">
                                Ubah data Sanksi
                            </a>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4 class="card-title">Data Sanksi</h4>
                    <?php require_once("../sanksi/functions.php") ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>Nomor Sanksi</th>
                                    <th>Nama Sanksi</th>
                                    <th>Jenis Sanksi</th>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <th>Opsional</th>
                                    <?php
                                        }else{}
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $sanksi->Table();
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $isi['no_sanksi'] ?></td>
                                    <td><?php echo $isi['nama_sanksi'] ?></td>
                                    <td><?php echo $isi['jenis_sanksi'] ?></td>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <td>
                                        <a href="?page=sanksi&aksi=ubahsanksi&no_sanksi=<?=$isi['no_sanksi']?>"
                                            role="button" aria-current="page" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=sanksi&aksi=hapus-sanksi&no_sanksi=<?=$isi['no_sanksi']?>"
                                            aria-current="page"
                                            onclick="return confirm('Apakah data ini ingin anda hapus ?')" role="button"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </a>
                                    </td>
                                    <?php
                                        }
                                    ?>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <?php 
                                    if($_SESSION['role'] == "keamanan"){
                                ?>
                                <a href="?page=sanksi&aksi=tambahsanksi" role="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah data sanksi</span>
                                </a>
                                <?php
                                    }else{
                                        echo "Tidak bisa menambahkan data sanksi hanya keamanan saja yang bisa menambahkan";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>