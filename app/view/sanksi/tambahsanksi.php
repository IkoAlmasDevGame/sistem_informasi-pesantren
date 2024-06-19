<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Sanksi</title>
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
                    <h4 class="card-title">Tambah data sanksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="form-group">
                            <form action="?aksi=tambah-sanksi" method="post">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Sanksi</label>
                                                <input type="text" name="no_sanksi" maxlength="5" required="required"
                                                    aria-required="true" class="form-control"
                                                    placeholder="masukkan nomor sanksi">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama Sanksi</label>
                                                <input type="text" name="nama_sanksi" maxlength="25" required="required"
                                                    aria-required="true" class="form-control"
                                                    placeholder="masukkan nama sanksi">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Jenis Sanksi</label>
                                                <input type="text" name="jenis_sanksi" maxlength="25"
                                                    required="required" aria-required="true" class="form-control"
                                                    placeholder="masukkan jenis sanksi">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="?page=sanksi" role="button" class="btn btn-default">Cancel</a>
                                        <button type="reset" class="btn btn-danger">Hapus semua</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>