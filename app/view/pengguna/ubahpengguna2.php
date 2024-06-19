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
                    <h4 class="card-title">ubah data</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php 
                            if(isset($_GET['id_pengguna'])){
                                $id = htmlspecialchars($_GET['id_pengguna']);
                                $row = $configs->query("SELECT * FROM user WHERE id = '$id'");
                                while ($isi = $row->fetch_array()) {
                        ?>
                        <form action="?aksi=ubah-pengguna" method="post">
                            <input type="hidden" name="id" value="<?=$isi['id']?>">
                            <div class="form-group">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">username</label>
                                                <input type="text" name="username"
                                                    value="<?php echo $isi['username'] ?>" id="username"
                                                    class="form-control" placeholder="masukkan username anda ..."
                                                    required aria-required="true" maxlength="128">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">email</label>
                                                <input type="email" name="email" value="<?php echo $isi['email'] ?>"
                                                    id="email" class="form-control"
                                                    placeholder="masukkan email anda ..." required aria-required="true"
                                                    maxlength="200">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="passInput">kata sandi</label>
                                                <input type="password" name="password" id="passInput"
                                                    class="form-control" placeholder="masukkan password anda ..."
                                                    required aria-required="true" maxlength="255">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">ulang kata sandi</label>
                                                <input type="password" name="repassword" id="repassword"
                                                    class="form-control" placeholder="masukkan repassword anda ..."
                                                    required aria-required="true" maxlength="255">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">nama pengguna</label>
                                                <input type="text" name="nama" value="<?=$isi['nama']?>" id="nama"
                                                    class="form-control" placeholder="masukkan nama anda ..." required
                                                    aria-required="true" maxlength="128">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">jabatan</label>
                                                <?php 
                                                    if($_SESSION['role'] == "ketua" || $_SESSION['role'] == "keamanan"){
                                                ?>
                                                <div class="form-inline">
                                                    <input type="radio" name="role" id="radio" class="radio-inline"
                                                        value="ketua" <?php if($isi['role'] == "ketua"){?> checked
                                                        <?php } ?> aria-controls="radio"> ketua
                                                    <input type="radio" name="role" id="radio" class="radio-inline"
                                                        value="keamanan" <?php if($isi['role'] == "keamanan"){?> checked
                                                        <?php } ?> aria-controls="radio"> keamanan
                                                </div>
                                                <?php
                                                    }elseif($_SESSION['role'] == "wali"){
                                                ?>
                                                <div class="form-inline">
                                                    <input type="radio" name="role" <?php if($isi['role'] == "wali"){?>
                                                        checked <?php } ?> id="radio" class="radio-inline" value="wali"
                                                        aria-controls="radio"> Wali
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                        <a href="?page=beranda" role="button" class="btn btn-default">Cancel</a>
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