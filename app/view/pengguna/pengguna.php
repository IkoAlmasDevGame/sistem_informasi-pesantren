<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Pengguna</title>
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
                    <h4 class="panel-heading">Data Master Pengguna</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=userprofile" class="text-decoration-none text-primary">
                                Pengguna
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">user profile / Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>E - Mailing</th>
                                    <th>Password</th>
                                    <th>Repassword</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $row = $configs->query("SELECT * FROM user WHERE role='ketua' or role='keamanan'");
                                while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['username'] ?></td>
                                    <td><?php echo $isi['email'] ?></td>
                                    <td>Ter-Enkripsi</td>
                                    <td>Ter-Enkripsi</td>
                                    <td><?php echo $isi['nama'] ?></td>
                                    <td><?php echo $isi['role'] ?></td>
                                    <td>
                                        <a href="?page=pengguna&aksi=ubahpengguna&id=<?=$isi['id']?>" role="button"
                                            aria-current="page" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>