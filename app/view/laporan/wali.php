<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Laporan Wali</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <link rel="stylesheet" href="../ui/styles-min.css">
        <?php 
            if($_SESSION['role'] == "wali"){
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
                    <h4 class="panel-heading">Data Master Laporan Wali</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" class="text-decoration-none text-primary">
                                <i class="fa fa-home fa-1x"></i>
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=laporan-wali" class="text-decoration-none text-primary">
                                Laporan wali santri
                            </a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Wali Santri - Laporan Pelanggaran -</h4>
                </div>
                <?php 
                    if(isset($_SESSION['nama_santri'])){
                        $nama = htmlspecialchars($_SESSION['nama_santri']);
                        $row = $configs->query("SELECT laporan_diskusi.*,
                        pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, 
                        keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi 
                        left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua WHERE nama_santri = '$nama' order by laporan_diskusi.nama_santri asc");
                ?>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Santri</th>
                                    <th>Nomor Pelanggaran</th>
                                    <th>Nomor Sanksi</th>
                                    <th>Indentity Ketua</th>
                                    <th>Indentity Keamanan</th>
                                    <th>Hasil Disksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    while ($isi = $row->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $isi['nama_santri'] ?></td>
                                    <td><?php echo $isi['nama_pelanggaran'] ?></td>
                                    <td><?php echo $isi['nama_sanksi'] ?></td>
                                    <td><?php echo $isi['nama_ketua'] ?></td>
                                    <td><?php echo $isi['nama_keamanan'] ?></td>
                                    <td>
                                        <a href="" data-bs-target="#hasil<?=$no?>" data-bs-toggle="modal"
                                            class="btn btn-sm btn-info">
                                            <span>Lihat Hasil Diskusi</span>
                                        </a>
                                        <div class="modal" id="hasil<?=$no?>" tabindex="-1" aria-hidden="true">
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
                <?php
                    }
                ?>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>