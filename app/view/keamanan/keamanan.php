<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Keamanan</title>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Master Keamanan</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=keamanan" class="text-decoration-none text-primary">
                                Keamanan
                            </a>
                        </li>
                        <?php 
                        if(isset($_GET['aksi'])){
                            if($_GET['aksi']=="tambahkeamanan"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=keamanan&aksi=tambahkeamanan" class="text-decoration-none text-primary">
                                Tambah data keamanan
                            </a>
                        </li>
                        <?php
                            }else if($_GET['aksi'] == "ubahkeamanan"){
                        ?>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=keamanan&aksi=ubahkeamanan&id_keamanan=<?=$_GET['id_keamanan']?>"
                                class="text-decoration-none text-primary">
                                Ubah data keamanan
                            </a>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Keamanan</h4>
                    <?php require_once("../keamanan/functions.php") ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table w-100 table-sm table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>ID Keamanan</th>
                                    <th>ID Ketua</th>
                                    <th>Nama Keamanan</th>
                                    <th>Alamat Rumah</th>
                                    <th>No Telepon</th>
                                    <?php
                                     if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <th>Opsional</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $row = $keamanan->Table();
                                    while($isi = mysqli_fetch_array($row)) {
                                ?>
                                <tr>
                                    <td><?php echo $isi['id_keamanan'] ?></td>
                                    <td><?php echo $isi['id_ketua'] ?></td>
                                    <td><?php echo $isi['nama_keamanan'] ?></td>
                                    <td><?php echo $isi['alamat'] ?></td>
                                    <td><?php echo $isi['no_hp'] ?></td>
                                    <?php 
                                        if($_SESSION['role'] == "keamanan"){
                                    ?>
                                    <td>
                                        <a href="?page=keamanan&aksi=ubahkeamanan&id_keamanan=<?=$isi['id_keamanan']?>"
                                            aria-current="page" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=keamanan&aksi=hapus-keamanan&id_keamanan=<?=$isi['id_keamanan']?>"
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
                                <a href="?page=keamanan&aksi=tambahkeamanan" aria-current="page"
                                    class="btn btn-sm btn-danger">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah data keamanan</span>
                                </a>
                                <?php
                                    }else{
                                        echo "Tidak bisa menambahkan data keamanan hanya keamanan saja yang bisa menambahkan";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>