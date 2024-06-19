<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Santri</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "keamanan"){
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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Ubah data santri</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <?php 
                                if(isset($_GET['nis'])){
                                    $nis = htmlspecialchars($_GET['nis']);
                                    $row = $configs->query("SELECT * FROM santri WHERE nis = '$nis'");
                                    while($isii = $row->fetch_array()){
                            ?>
                            <form action="?aksi=ubah-santri" method="post">
                                <input type="hidden" name="nis" value="<?=$isii['nis']?>">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Nis Santri</label>
                                                <input type="text" name="nis" value="<?=$isii['nis']?>" id="nisInput"
                                                    class="form-control" placeholder="masukkan nis santri baru" required
                                                    aria-required="true" maxlength="10" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama Santri</label>
                                                <input type="text" value="<?=$isii['nama_santri']?>" name="nama_santri"
                                                    id="namaInput" class="form-control"
                                                    placeholder="masukkan nama santri baru" required
                                                    aria-required="true" maxlength="80">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Alamat rumah santri</label>
                                                <textarea name="alamat" id="alamatInput" class="form-control"
                                                    aria-required="true" required
                                                    maxlength="255"><?php echo $isii['alamat'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Jenis Kelamin</label>
                                                <div class="form-inline radio">
                                                    <input type="radio" name="jenis_kelamin" id=""
                                                        class="radio radio-inline"
                                                        <?php if($isii['jenis_kelamin'] == "Laki-Laki"){?> checked
                                                        value="Laki-Laki" <?php } ?> value="Laki-Laki" required>
                                                    Laki-Laki
                                                    <input type="radio" name="jenis_kelamin" id=""
                                                        class="radio radio-inline ms-2"
                                                        <?php if($isii['jenis_kelamin'] == "Perempuan"){?> checked
                                                        value="Perempuan" <?php } ?> value="Perempuan" required>
                                                    Perempuan
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Pelanggaran</label>
                                                <select name="no_pelanggaran" required aria-required="true"
                                                    class="form-select form-control" id="">
                                                    <option value="">Pilih Nomor Pelanggaran</option>
                                                    <?php 
                                                    $row = $pelanggaran->Table();
                                                    while($isi = $row->fetch_array()){
                                                ?>
                                                    <option
                                                        <?php if($isii['no_pelanggaran'] == $isi['no_pelanggaran']){?>
                                                        selected value="<?php echo $isi['no_pelanggaran']?>" <?php } ?>
                                                        value="<?php echo $isi['no_pelanggaran']?>">
                                                        <?php echo $isi['nama_pelanggaran'] ?></option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Sanksi</label>
                                                <select name="no_sanksi" required aria-required="true"
                                                    class="form-select form-control" id="">
                                                    <option value="">Pilih Nomor Sanksi</option>
                                                    <?php 
                                                    $row = $sanksi->Table();
                                                    while($is = $row->fetch_array()){
                                                ?>
                                                    <option <?php if($isii['no_sanksi'] == $is['no_sanksi']){?> selected
                                                        value="<?php echo $is['no_sanksi']?>" <?php } ?>
                                                        value="<?php echo $is['no_sanksi']?>">
                                                        <?php echo $is['nama_sanksi']?>
                                                    </option>
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
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                        <a href="?page=santri" role="button" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">Hapus semua</button>
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
        </div>
        <?php require_once("../ui/footer.php") ?>