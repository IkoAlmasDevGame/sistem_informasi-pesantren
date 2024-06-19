<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Santri</title>
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
                    <h4 class="panel-heading">Data Master Santri</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=santri" class="text-decoration-none text-primary">
                                Santri
                            </a>
                        </li>
                        <?php 
                        if(isset($_GET['aksi'])){
                            if($_GET['aksi']=="tambahsantri"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=santri&aksi=tambahsantri" class="text-decoration-none text-primary">
                                Tambah data Santri
                            </a>
                        </li>
                        <?php
                            }else if($_GET['aksi'] == "ubahsantri"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=santri&aksi=ubahsantri&nis=<?=$_GET['nis']?>"
                                class="text-decoration-none text-primary">
                                Ubah data Santri
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
                    <h4 class="card-title">Data Santri</h4>
                    <?php require_once("../santri/functions.php") ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>nis</th>
                                    <th>nama santri</th>
                                    <th>alamat</th>
                                    <th>jenis kelamin</th>
                                    <th>nomor pelanggaran</th>
                                    <th>nomor sanksi</th>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <th>opsional</th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $santri->Table();
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $isi['nis'] ?></td>
                                    <td><?php echo $isi['nama_santri'] ?></td>
                                    <td><?php echo $isi['alamat'] ?></td>
                                    <td><?php echo $isi['jenis_kelamin'] ?></td>
                                    <td><?php echo $isi['no_pelanggaran'] ?></td>
                                    <td><?php echo $isi['no_sanksi'] ?></td>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <td>
                                        <a href="?page=santri&aksi=ubahsantri&nis=<?=$isi['nis']?>" role="button"
                                            aria-current="page" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=santri&aksi=hapus-santri&nis=<?=$isi['nis']?>"
                                            onclick="return confirm('Apakah anda ingin menghapus data ini ?')"
                                            role="button" aria-current="page" class="btn btn-sm btn-danger">
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
                                <a href="?page=santri&aksi=tambahsantri" role="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah data santri</span>
                                </a>
                                <?php
                                    }else{
                                        echo "Tidak bisa menambahkan data santri hanya keamanan saja yang bisa menambahkan";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>