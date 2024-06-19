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
                    <h4 class="card-title">Ubah Data Pelanggaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php 
                            if(isset($_GET['no_pelanggaran'])){
                                $no = htmlspecialchars($_GET['no_pelanggaran']);
                                $row = $configs->query("SELECT * FROM pelanggaran WHERE no_pelanggaran = '$no'");
                            while($isii = $row->fetch_array()){
                        ?>
                        <form action="?aksi=ubah-pelanggaran" method="post">
                            <input type="hidden" name="no_pelanggaran" value="<?=$isii['no_pelanggaran']?>">
                            <div class="form-group">
                                <table class="table w-100 table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Pelanggaran</label>
                                                <input type="text" name="no_pelanggaran" required aria-required="true"
                                                    id="no_pelanggaran" value="<?=$isii['no_pelanggaran']?>" readonly
                                                    aria-readonly="true" maxlength="5" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama Pelanggaran</label>
                                                <input type="text" name="nama_pelanggaran" required aria-required="true"
                                                    id="nama_pelanggaran" value="<?=$isii['nama_pelanggaran']?>"
                                                    maxlength="25" class="form-control">
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
                                                    <option <?php if($isii['no_sanksi'] == $isi['no_sanksi']){?>
                                                        selected value="<?=$isi['no_sanksi']?>" <?php } ?>
                                                        value="<?=$isi['no_sanksi']?>">
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
                                                    <option <?php if($isii['id_keamanan'] == $isi['id_keamanan']){?>
                                                        selected value="<?=$isi['id_keamanan']?>" <?php } ?>
                                                        value="<?=$isi['id_keamanan']?>">
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
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>