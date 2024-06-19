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

            $userpengguna = new controller\authentication($configs);

            if(!isset($_GET['aksi'])){
                require_once("../../controller/controller.php");
            }else{
                switch ($_GET['aksi']) {
                    case 'sign-in':
                        $userpengguna->signin();
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
        <link rel="stylesheet" href="styles.css">
    </head>

    <body onload="startTime()">
        <div class="container-fluid pt-3 mt-3">
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
                        <div class="border border-top mt-2"></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-around align-items-center flex-wrap mb-2">
                                <a href="index.php?change=pesantren" class="rounded-1 btn btn-dark hover">
                                    register Pesantren
                                </a>
                                <a href="index.php?change=walisantri" class="rounded-1 btn btn-danger hover">
                                    register Wali Santri
                                </a>
                            </div>
                            <div class="form-group">
                                <form action="?aksi=sign-in" method="post">
                                    <table class="table table-striped-columns">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="userInput">username / email</label>
                                                    <input type="text" name="userInput" id="userInput"
                                                        class="form-control"
                                                        placeholder="masukkan email atau username anda ..." required
                                                        aria-required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="passInput">kata sandi</label>
                                                    <input type="password" name="password" id="passInput"
                                                        class="form-control" placeholder="masukkan password anda ..."
                                                        required aria-required="true">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-footer"></div>
                                    <div class="col-sm-12 col-md-12 mb-2">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary hover">
                                                <i class="fa fa-sign-in-alt"></i>
                                                <span>Log In</span>
                                            </button>
                                            <button type="reset" class="btn btn-default hover">
                                                <i class="fa fa-close"></i>
                                                <span>Cancel</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <?php 
                                            if(isset($_GET['change'])){
                                                if($_GET['change'] == "pesantren"){
                                            ?>
                                    <a href="register-pesantren.php" role="button" aria-required="true"
                                        class="text-decoration-none text-primary">
                                        membuat akun baru ...
                                    </a>
                                    <?php
                                                }
                                                if($_GET['change'] == "walisantri"){
                                            ?>
                                    <a href="register-wali.php" role="button" aria-required="true"
                                        class="text-decoration-none text-primary">
                                        membuat akun baru ...
                                    </a>
                                    <?php
                                                }
                                            }
                                            ?>
                                </div>
                            </div>
                            <?php 
                                if(isset($_GET["informasi"])){
                                    if($_GET['informasi'] == "failed"){
                                ?>
                            <div class="alert alert-dismissable fade show alert-warning" role="alert">
                                <strong>Informasi</strong>
                                <p>password dan username atau email anda salah ...</p>
                                <button type='button' class='btn-close' aria-labelledby="Close" data-bs-dismiss='alert'
                                    onclick="document.location.href = 'index.php'"></button>
                            </div>
                            <?php
                                    }else if($_GET['informasi'] == "blank"){
                                ?>
                            <div class="alert alert-dismissable fade show alert-warning" role="alert">
                                <strong>Informasi</strong>
                                <p>form login tidak boleh kosong ...</p>
                                <button type='button' class='btn-close' aria-labelledby="Close" data-bs-dismiss='alert'
                                    onclick="document.location.href = 'index.php'"></button>
                            </div>
                            <?php
                                    }
                                }
                                ?>

                        </div>
                        <div class="container text-center card-footer">
                            <footer class="footer bottom-0">
                                <div id="text"></div>
                            </footer>
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