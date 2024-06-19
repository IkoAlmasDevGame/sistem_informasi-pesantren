<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Ketua</title>
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
                    <h4 class="panel-heading">Data Master Ketua</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=ketua" class="text-decoration-none text-primary">
                                Ketua
                            </a>
                        </li>
                        <?php 
                        if(isset($_GET['aksi'])){
                            if($_GET['aksi']=="tambahketua"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=ketua&aksi=tambahketua" class="text-decoration-none text-primary">
                                Tambah data Ketua
                            </a>
                        </li>
                        <?php
                            }else if($_GET['aksi'] == "ubahketua"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=ketua&aksi=ubahketua&id_ketua=<?=$_GET['id_ketua']?>"
                                class="text-decoration-none text-primary">
                                Ubah data Ketua
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
                    <h4 class="card-title">Data Ketua</h4>
                    <?php require_once("../ketua/functions.php") ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>ID Ketua</th>
                                    <th>Nama Ketua</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
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
                                    $row = $ketua -> Table();
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $isi['id_ketua'] ?></td>
                                    <td><?php echo $isi['nama_ketua'] ?></td>
                                    <td><?php echo $isi['alamat'] ?></td>
                                    <td><?php echo $isi['no_hp'] ?></td>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <td>
                                        <a href="?page=ketua&aksi=ubahketua&id_ketua=<?=$isi['id_ketua']?>"
                                            aria-current="page" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=ketua&aksi=hapus-ketua&id_ketua=<?=$isi['id_ketua']?>"
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
                                <a href="?page=ketua&aksi=tambahketua" aria-current="page"
                                    class="btn btn-sm btn-danger">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah data ketua</span>
                                </a>
                                <?php
                                    }else{
                                        echo "Tidak bisa menambahkan data ketua hanya keamanan saja yang bisa menambahkan";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>