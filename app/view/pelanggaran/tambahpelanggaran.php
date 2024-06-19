<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Pelanggaran</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "keamanan"){
                require_once("../ui/header.php");
            }else{
                echo "<script>document.location.href='../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Tambah Data Pelanggaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="?aksi=tambah-pelanggaran" method="post">
                            <div class="form-group">
                                <table class="table w-100 table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Pelanggaran</label>
                                                <input type="text" name="no_pelanggaran" required aria-required="true"
                                                    id="no_pelanggaran" maxlength="5" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama Pelanggaran</label>
                                                <input type="text" name="nama_pelanggaran" required aria-required="true"
                                                    id="nama_pelanggaran" maxlength="25" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Sanksi</label>
                                                <select name="no_sanksi" class="form-control" required
                                                    aria-required="true" id="no_sanksi">
                                                    <option value="">Pilih Nomor Sanksi</option>
                                                    <?php 
                                                        $row = $sanksi->Table();
                                                        while($isi = $row->fetch_array()){
                                                    ?>
                                                    <option value="<?=$isi['no_sanksi']?>">
                                                        <?php echo $isi['nama_sanksi'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">ID Keamanan</label>
                                                <select name="id_keamanan" class="form-control" required
                                                    aria-required="true" id="id_keamanan">
                                                    <option value="">Pilih ID Keamanan</option>
                                                    <?php 
                                                        $row = $keamanan->Table();
                                                        while($isi = $row->fetch_array()){
                                                    ?>
                                                    <option value="<?=$isi['id_keamanan']?>">
                                                        <?php echo $isi['nama_keamanan'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="?page=pelanggaran" role="button" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">Hapus semua</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>