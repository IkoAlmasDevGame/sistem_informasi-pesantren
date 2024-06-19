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
                            if(isset($_GET['id_keamanan'])){
                                $id = htmlspecialchars($_GET['id_keamanan']);
                                $row = $configs->query("SELECT * FROM keamanan WHERE id_keamanan = '$id'");
                                while ($isi = $row->fetch_array()) {
                        ?>
                        <form action="?aksi=ubah-keamanan" method="post">
                            <input type="hidden" name="id_keamanan" value="<?=$isi['id_keamanan']?>">
                            <div class="form-group">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">ID Keamanan</label>
                                                <input type="text" name="id_keamanan" class="form-control"
                                                    aria-required="true" readonly aria-readonly="true"
                                                    value="<?=$isi['id_keamanan']?>" maxlength="5" required id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">ID Ketua</label>
                                                <select name="id_ketua" class="form-select" id="id_ketua">
                                                    <option value="">Pilih Nama Ketua</option>
                                                    <?php 
                                                        $row = $ketua->Table();
                                                        while($isii=$row->fetch_array()){
                                                    ?>
                                                    <option <?php if($isi['id_ketua'] == $isii['id_ketua']){?> selected
                                                        value="<?=$isii['id_ketua']?>" <?php } ?>
                                                        value="<?=$isii['id_ketua']?>">
                                                        <?php echo $isii['nama_ketua'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nama</label>
                                                <input type="text" name="nama_keamanan" id="nama_keamanan"
                                                    class="form-control" value="<?=$isi['nama_keamanan']?>"
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
                                        <a href="?page=keamanan" role="button" class="btn btn-default">Cancel</a>
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