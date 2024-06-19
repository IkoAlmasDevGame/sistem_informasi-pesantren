<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Pelanggaran</title>
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
                    <h4 class="panel-heading">Data Master Pelanggaran</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pelanggaran" class="text-decoration-none text-primary">
                                Pelanggaran
                            </a>
                        </li>
                        <?php 
                        if(isset($_GET['aksi'])){
                            if($_GET['aksi']=="tambahpelanggaran"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pelanggaran&aksi=tambahpelanggaran"
                                class="text-decoration-none text-primary">
                                Tambah data Pelanggaran
                            </a>
                        </li>
                        <?php
                            }else if($_GET['aksi'] == "ubahpelanggaran"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pelanggaran&aksi=ubahpelanggaran&no_pelanggaran=<?=$_GET['no_pelanggaran']?>"
                                class="text-decoration-none text-primary">
                                Ubah data Pelanggaran
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
                <div class="card-header py-2">
                    <h4 class="card-title">Data Pelanggaran</h4>
                    <?php require_once("../pelanggaran/functions.php") ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>Nomor Pelanggaran</th>
                                    <th>Nama Pelanggaran</th>
                                    <th>Nomor Sanksi</th>
                                    <th>ID Keamanan</th>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <th>Opsional</th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $pelanggaran->Table();
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $isi['no_pelanggaran'] ?></td>
                                    <td><?php echo $isi['nama_pelanggaran'] ?></td>
                                    <td><?php echo $isi['no_sanksi'] ?></td>
                                    <td><?php echo $isi['id_keamanan'] ?></td>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <td>
                                        <a href="?page=pelanggaran&aksi=ubahpelanggaran&no_pelanggaran=<?=$isi['no_pelanggaran']?>"
                                            aria-current="page" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=pelanggaran&aksi=hapus-pelanggaran&no_pelanggaran=<?=$isi['no_pelanggaran']?>"
                                            aria-current="page" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda ingin menghapus data ini ?')">
                                            <i class="fa fa-close fa-1x"></i>
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
                                <a href="?page=pelanggaran&aksi=tambahpelanggaran" aria-current="page"
                                    class="btn btn-sm btn-danger">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah data Pelanggaran</span>
                                </a>
                                <?php
                                    }else{
                                        echo "Tidak bisa menambahkan data pelanggaran hanya keamanan saja yang bisa menambahkan";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>