<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Keamanan</title>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "ketua" || $_SESSION['role'] == "keamanan" || $_SESSION['role'] == "wali"){
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
                    <h4 class="card-title">ubah data sistem website</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php 
                            if(isset($_GET['id'])){
                                $id = htmlspecialchars($_GET['id']);
                                $row = $configs->query("SELECT * FROM sistem WHERE id = '$id'");
                                while ($isi = $row->fetch_array()) {
                        ?>
                        <form action="?aksi=ubah-sistem" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$isi['id']?>">
                            <div class="form-group">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Nama Pesantren</label>
                                                <input type="text" name="nama_pesantren"
                                                    value="<?=$isi['nama_pesantren']?>" class="form-control" required
                                                    id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Gambar</label>
                                                <div class="form-inline">
                                                    <img src="../../../assets/<?=$isi['gambar']?>" width="64"
                                                        height="64" alt="<?=$isi['gambar']?>">
                                                    <input type="file" accept="" name="gambar" id="gambar"
                                                        class="form-control-file" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Status Website</label>
                                                <input type="text" name="flags" maxlength="1" minlength="0"
                                                    value="<?=$isi['flags']?>" class="form-control" required id="">
                                                <small>aktif = 1 || tidak aktif = 0</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                        <a href="?page=sistemwebsite" role="button" class="btn btn-default">Cancel</a>
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