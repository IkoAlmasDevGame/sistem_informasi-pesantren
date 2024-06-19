<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Master Keamanan</title>
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
                        <?php 
                            if(isset($_GET['id_ketua'])){
                                $id = htmlspecialchars($_GET['id_ketua']);
                                $row = $configs->query("SELECT * FROM ketua WHERE id_ketua = '$id'");
                                while ($isi = mysqli_fetch_array($row)) {
                        ?>
                        <form action="?aksi=ubah-ketua" method="post">
                            <input type="hidden" name="id_ketua" value="<?=$isi['id_ketua']?>">
                            <div class="form-group">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">ID Ketua</label>
                                                <input type="text" name="id_ketua" class="form-control"
                                                    aria-required="true" readonly aria-readonly="true"
                                                    value="<?=$isi['id_ketua']?>" maxlength="5" required id="id_ketua">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama</label>
                                                <input type="text" name="nama_ketua" id="nama_ketua"
                                                    class="form-control" value="<?=$isi['nama_ketua']?>"
                                                    aria-required="true" maxlength="40" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" aria-required="true" class="form-control"
                                                    required id="alamat"><?php echo $isi['alamat'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">No Handphone</label>
                                                <input type="text" name="no_hp" id="no_hp" value="<?=$isi['no_hp']?>"
                                                    class="form-control" maxlength="13" aria-required="true" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                        <a href="?page=ketua" role="button" class="btn btn-default">Cancel</a>
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