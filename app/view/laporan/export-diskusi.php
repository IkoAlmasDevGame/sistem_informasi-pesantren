<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Export To Excel</title>
        <?php 
            if($_SESSION['role'] == "ketua"){
                require_once("../ui/header.php");
                require_once("../../database/koneksi.php");
                
                header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
                header("Content-Disposition: attachment; filename=data-laporan-diskusi.xls"); 
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private",false);
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <body>
        <div class="container-fluid p-5">
            <div class="container-fluid py-2 border border-1" style="border-radius: 5px;">
                <h4 class="fs-4 fst-normal fw-normal text-start">
                    <?php echo "Laporan Hasil Diskusi"; ?>
                </h4>
                <h4 class="display-5 fs-5 fst-normal fw-normal text-end">Tanggal Hari ini :
                    <?php echo date('D, d/M/Y') ?>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Santri</th>
                            <th>Nama Keamanan</th>
                            <th>Nama Ketua</th>
                            <th>Pelanggaran</th>
                            <th>Sanksi</th>
                            <th>Hasil Diskusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $sql = "SELECT laporan_diskusi.*, santri.nama_santri,
                            pelanggaran.no_pelanggaran, pelanggaran.nama_pelanggaran, sanksi.no_sanksi, sanksi.nama_sanksi, 
                            keamanan.id_keamanan, keamanan.nama_keamanan, ketua.id_ketua, ketua.nama_ketua FROM laporan_diskusi 
                            left join santri on laporan_diskusi.nama_santri = santri.nama_santri left join pelanggaran on laporan_diskusi.no_pelanggaran = pelanggaran.no_pelanggaran left join sanksi on laporan_diskusi.no_sanksi = sanksi.no_sanksi 
                            left join keamanan on laporan_diskusi.id_keamanan = keamanan.id_keamanan left join ketua on laporan_diskusi.id_ketua = ketua.id_ketua";
                            $row = $configs->query($sql);
                            while($isi = $row->fetch_array()){
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $isi['nama_santri'] ?></td>
                            <td><?php echo $isi['nama_keamanan'] ?></td>
                            <td><?php echo $isi['nama_ketua'] ?></td>
                            <td><?php echo $isi['nama_pelanggaran'] ?></td>
                            <td><?php echo $isi['nama_sanksi'] ?></td>
                            <td><?php echo $isi['hasil_diskusi'] ?></td>
                        </tr>
                        <?php
                        $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            require_once("../ui/footer.php");
        ?>