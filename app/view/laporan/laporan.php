<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Laporan Pelanggaran</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <link rel="stylesheet" href="../ui/styles-min.css">
        <?php 
            if($_SESSION['role'] == "ketua"){
                require_once("../ui/header.php");
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="panel panel-defualt">
                <div class="panel-body">
                    <h4 class="panel-heading">Data Master Laporan Pelanggaran</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=laporan-pelanggaran" class="text-decoration-none text-primary">
                                Laporan Pelanggaran
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Data Laporan Pelanggaran</h4>
                    <div class="text-end">
                        <a href="?page=export-laporan" role="button" class="btn btn-info btn-sm">
                            <i class="fa fa-file-excel hover fa-1x"></i>
                            <span>Export To Excel</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-inline mt-1">
                        <div class="form-group">
                            <form action="" method="post">
                                <div class="d-flex justify-content-end align-items-center flex-wrap gap-1">
                                    <label for="">pencarian : </label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="search" name="cari" id="cari" aria-controls="example1_filter"
                                            class="form-control" placeholder="cari data santri / santriwati" required>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-search fa-1x"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example1">
                            <thead>
                                <th>Nama Santri</th>
                                <th>Nomor Pelanggaran</th>
                                <th>Nomor Sanksi</th>
                                <th>Indentity Ketua</th>
                                <th>Indentity Keamanan</th>
                                <th>Hasil Disksi</th>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_POST['cari'])){
                                    $cari = htmlspecialchars($_POST['cari']);
                                    $row = $configs->query("SELECT laporan_diskusi.*,
                                     pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, 
                                     keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi 
                                     left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua WHERE nama_santri = '$cari' or laporan_diskusi.no_pelanggaran = '$cari' or laporan_diskusi.no_sanksi = '$cari' or laporan_diskusi.id_keamanan = '$cari' or laporan_diskusi.id_ketua = '$cari'");
                                    }else{
                                    $row = $configs->query("SELECT laporan_diskusi.*, santri.nama_santri,
                                     pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, 
                                     keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi 
                                     left join santri on laporan_diskusi.nama_santri = santri.nama_santri left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi 
                                     left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua");
                                    }
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $isi['nama_santri'] ?></td>
                                    <td><?php echo $isi['no_pelanggaran'] ?></td>
                                    <td><?php echo $isi['no_sanksi'] ?></td>
                                    <td><?php echo $isi['id_ketua'] ?></td>
                                    <td><?php echo $isi['id_keamanan'] ?></td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" aria-current="page"
                                            data-bs-target="#hasil<?php echo $isi['id_ketua']?>"
                                            class="btn btn-sm btn-info">
                                            <span>Lihat Hasil Diskusi</span>
                                        </a>
                                        <div class="modal fade" id="hasil<?=$isi['id_ketua']?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Data Laporan
                                                            <?php echo $isi['nama_santri'] ?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Indentity Nama Santri</label>
                                                                    <p><?php echo $isi['nama_santri'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Nomor Pelanggaran</label>
                                                                    <p><?php echo $isi['no_pelanggaran']." - ".$isi['nama_pelanggaran'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Nomor Sanksi</label>
                                                                    <p><?php echo $isi['no_sanksi']." - ".$isi['nama_sanksi'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Indentity Ketua</label>
                                                                    <p><?php echo $isi['id_ketua']." - ".$isi['nama_ketua'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Indentity Keamanan</label>
                                                                    <p><?php echo $isi['id_keamanan']." - ".$isi['nama_keamanan'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline">
                                                                <div class="form-label">
                                                                    <label for="">Hasil Laporan Diskusi</label>
                                                                    <p><?php echo $isi["hasil_diskusi"] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type='button' class='btn btn-default'
                                                                data-bs-dismiss='modal'>Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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