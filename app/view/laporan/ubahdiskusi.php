<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Laporan Diskusi</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "ketua"){
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
                    <h4 class="card-title">Tambah Data Laporan Diskusi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <?php 
                                if(isset($_GET['nama_santri'])){
                                    $nama = htmlspecialchars($_GET['nama_santri']);
                                    $row = $configs->query("SELECT * FROM laporan_diskusi WHERE nama_santri = '$nama'");
                                    while($isii = $row->fetch_array()){
                            ?>
                            <form action="?aksi=ubah-diskusi" method="post">
                                <input type="hidden" name="nama_santri" value="<?php echo $isii['nama_santri']?>">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Indentity Ketua</label>
                                                <select name="id_ketua" class="form-select" id="id_ketua">
                                                    <option value="">Pilih Nama Ketua</option>
                                                    <?php 
                                                        $row = $ketua->Table();
                                                        while($isi=$row->fetch_array()){
                                                    ?>
                                                    <option <?php if($isii['id_ketua'] == $isi['id_ketua']){?> selected
                                                        value="<?=$isi['id_ketua']?>" <?php } ?>
                                                        value="<?=$isi['id_ketua']?>">
                                                        <?php echo $isi['nama_ketua'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Indentity Keamanan</label>
                                                <select name="id_keamanan" class="form-select" id="id_keamanan">
                                                    <option value="">Pilih Nama Keamanan</option>
                                                    <?php 
                                                        $row = $keamanan->Table();
                                                        while($isi=$row->fetch_array()){
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
                                        <tr>
                                            <td>
                                                <label for="">Laporan Diskusi</label>
                                                <textarea name="hasil_diskusi" class="form-control" required
                                                    maxlength="255" id="" aria-controls="form-control"
                                                    placeholder="masukkan laporan diskusi anda bersama keamanan santri"><?php echo $isii['hasil_diskusi'] ?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                        <a href="?page=laporan-diskusi" role="button" class="btn btn-default">Cancel</a>
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