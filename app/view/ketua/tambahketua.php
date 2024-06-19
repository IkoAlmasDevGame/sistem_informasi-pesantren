<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Ketua</title>
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
                    <h4 class="card-title">Tambah data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="?aksi=tambah-ketua" method="post">
                            <div class="form-group">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">ID Ketua</label>
                                                <input type="text" name="id_ketua" class="form-control"
                                                    aria-required="true" maxlength="5" required id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama</label>
                                                <input type="text" name="nama_ketua" id="nama_keamanan"
                                                    class="form-control" aria-required="true" maxlength="40" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" aria-required="true" class="form-control"
                                                    required id="alamat"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">No Handphone</label>
                                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                                    maxlength="13" aria-required="true" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="?page=ketua" role="button" class="btn btn-default">Cancel</a>
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