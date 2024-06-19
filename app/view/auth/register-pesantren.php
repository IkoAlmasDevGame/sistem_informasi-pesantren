<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Informasi Pelanggaran Santri</title>
        <?php 
            require_once("../../database/koneksi.php");
            require_once("../../model/model_pengguna.php");
            require_once("../../controller/controller.php");

            $row = mysqli_query($configs, "SELECT * FROM sistem WHERE flags = '1'");
            $isi = mysqli_fetch_array($row);

            $pengguna = new controller\authentication($configs);

            if(!isset($_GET['aksi'])){
                require_once("../../controller/controller.php");
            }else{
                switch ($_GET['aksi']) {
                    case 'register-pesantren':
                        $pengguna->buat();
                        header("location:../auth/index.php");
                        break;
                    
                    default:
                        require_once("../../controller/controller.php");
                        break;
                }
            }
        ?>
        <link rel="shortcut icon" href="../../../assets/<?php echo $isi['gambar']?>" type="image/x-icon">
        <meta name="description" content="Sistem Informasi Pelanggaran Pondok Pesantren Al-Dairah Cilegon">
        <meta name="description" content="Make Website @copyright 2024">
        <link rel="shortcut icon" href="../../../assets/icon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="./styles.css" type="text/css">
    </head>

    <body onload="startTime()">
        <div class="container-fluid pt-1 mt-1">
            <div class="d-grid justify-content-center align-items-center flex-wrap">
                <div class="container-fluid p-3 m-3 mx-auto rounded-1">
                    <div class="card">
                        <div class="d-flex justify-content-center gap-2 align-items-center flex-wrap">
                            <div class="col-sm-12 col-md-12">
                                <div class="d-flex justify-content-around align-items-center flex-wrap">
                                    <img src="../../../assets/<?php echo $isi['gambar']?>"
                                        alt="<?php echo $isi['nama_pesantren']?>">
                                    <div class="card-header bg-transparent border-0">
                                        <h6 class="card-title text-center">Sistem Informasi Pelanggaran</h6>
                                        <h6 class="card-title text-center"><?php echo $isi['nama_pesantren'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border border-top mt-auto"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <form action="?aksi=register-pesantren" method="post">
                                    <table class="table table-striped-columns">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="">username</label>
                                                    <input type="text" name="username" id="username"
                                                        class="form-control" placeholder="masukkan username anda ..."
                                                        required aria-required="true" maxlength="128">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="">email</label>
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        placeholder="masukkan email anda ..." required
                                                        aria-required="true" maxlength="200">
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
                                                    <input type="text" name="nama" id="nama" class="form-control"
                                                        placeholder="masukkan nama anda ..." required
                                                        aria-required="true" maxlength="128">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="">jabatan</label>
                                                    <div class="form-inline">
                                                        <input type="radio" name="role" id="radio" class="radio-inline"
                                                            value="ketua" aria-controls="radio"> ketua
                                                        <input type="radio" name="role" id="radio" class="radio-inline"
                                                            value="keamanan" aria-controls="radio"> keamanan
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary hover">
                                                <i class="fa fa-save"></i>
                                                <span>Simpan</span>
                                            </button>
                                            <button type="button" class="btn btn-default hover"
                                                onclick="document.location.href='index.php'">
                                                <i class="fa fa-backward"></i>
                                                <span>Cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="container text-center">
                                <footer class="footer bottom-0">
                                    <div id="text"></div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script src="script.js"></script>
    </body>

</html>