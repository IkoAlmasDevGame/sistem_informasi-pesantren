<?php 
require_once("../../database/koneksi.php");
$row = mysqli_query($configs, "SELECT * FROM sistem WHERE flags = '1'");
$isi = mysqli_fetch_array($row);

/* Controller & Model */
/* Controller */
require_once("../../controller/controller.php");
/* Model */
require_once("../../model/model_pengguna.php");
require_once("../../model/model_keamanan.php");
require_once("../../model/model_ketua.php");
require_once("../../model/model_pelanggaran.php");
require_once("../../model/model_sanksi.php");
require_once("../../model/model_santri.php");
$user = new controller\authentication($configs);
$keamanan = new controller\security($configs);
$ketua = new controller\leader($configs);
$pelanggaran = new controller\violation($configs);
$sanksi = new controller\penalty($configs);
$santri = new controller\Student($configs);

if(!isset($_GET['page'])){
    require_once("../dashboard/index.php");
}else{
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

        case 'keamanan':
            require("../keamanan/keamanan.php");
            break;

        case 'ketua':
            require("../ketua/ketua.php");
            break;

        case 'pelanggaran':
            require("../pelanggaran/pelanggaran.php");
            break;

        case 'sanksi':
            require("../sanksi/sanksi.php");
            break;

        case 'santri':
            require("../santri/santri.php");
            break;

        case 'laporan-diskusi':
            require("../laporan/diskusi.php");
            break;

        case 'laporan-pelanggaran':
            require("../laporan/laporan.php");
            break;

        case 'laporan-wali':
            require("../laporan/wali.php");
            break;

        case 'export-diskusi':
            require_once("../laporan/export-diskusi.php");
            break;

        case 'export-laporan':
            require_once("../laporan/export-laporan.php");
            break;

        case 'print-laporan':
            require_once("../laporan/print-diskusi.php");
            break;

        case 'userprofile':
            require_once("../pengguna/pengguna.php");
            break;

        case 'user-ubah':
            require_once("../pengguna/ubahpengguna2.php");
            break;

        case 'sistemwebsite':
            require_once("../settings/sistem.php");
            break;

        case 'keluar':
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../auth/index.php");
            exit(0);
            break;
        
        default:
            require_once("../dashboard/index.php");
            break;
    }
}

if(!isset($_GET['aksi'])){
    require_once("../../controller/controller.php");
}else{
    switch ($_GET['aksi']) {
        // Page user Website
        case 'ubahsistemwebsite':
            require_once("../settings/ubahsistem.php");
            break;
            // Aksi user Website
            case 'ubah-sistem':
                $napes = htmlspecialchars($_POST['nama_pesantren']);
                $flags = htmlspecialchars($_POST['flags']);
                $id = htmlspecialchars($_POST['id']);
                // Files Gambar
                $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
                $gambar = htmlspecialchars($_FILES["gambar"]["name"]) ? htmlentities($_FILES["gambar"]["name"]) : $_FILES["gambar"]["name"];
                $x_foto = explode('.', $gambar);
                $ekstensi_foto = strtolower(end($x_foto));
                $ukuran_foto = htmlspecialchars($_FILES['gambar']['size']);
                $file_tmp_foto = htmlspecialchars($_FILES['gambar']['tmp_name']);

                $sql = "UPDATE sistem SET nama_pesantren='$napes', gambar='$gambar', flags='$flags' WHERE id='$id'";
                $row = $configs->query($sql);

                if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
                    if($ukuran_foto < 10440070){
                        move_uploaded_file($file_tmp_foto, "../../../assets/" . $gambar);
                        if($row){
                            echo "<script>document.location.href = '../ui/header.php?page=sistemwebite'</script>";
                        }else{
                            echo "<script>document.location.href = '../ui/header.php?page=sistemwebites'</script>";
                        }
                    }else{
                        echo "GAGAL MENGUPLOAD FILE FOTO";
                    }
                }else{
                    echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
                }
                break;
        // PAge user Website
        
        // Page user profile
        case 'ubahpengguna':
            require_once("../pengguna/ubahpengguna.php");
            break;
            // Aksi user profile
            case 'ubah-pengguna':
                $id = htmlspecialchars($_POST['id']);
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = md5(htmlspecialchars($_POST['password']), false);
                $repassword = md5(htmlspecialchars($_POST['repassword']), false);
                $role = htmlspecialchars($_POST['role']);

                if($role == "ketua" || $role == "keamanan"){
                    $nama = htmlspecialchars($_POST['nama']);
                    $row = $configs->query("UPDATE user SET username='$username', email='$email', password='$password', repassword='$repassword', nama='$nama', role='$role' WHERE id='$id'");
                }elseif($role == "wali"){
                    $nama = htmlspecialchars($_POST['nama']);
                    $namasantri = htmlspecialchars($_POST['nama_santri']);
                    $row = $configs->query("UPDATE user SET username='$username', email='$email', password='$password', repassword='$repassword', nama='$nama', nama_santri='$namasantri' role='$role' WHERE id='$id'");
                }

                if($row){
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                    exit;
                }else{
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                    exit;                    
                }
                break;
        // PAge user profile

        // Page Keamanan
        case 'tambahkeamanan':
            require_once("../keamanan/tambahkeamanan.php");
            break;
        case 'ubahkeamanan':
            require_once("../keamanan/ubahkeamanan.php");
            break;
            // Aksi Keamanan
            case 'tambah-keamanan':
                $keamanan->buat();
                break;
            case 'ubah-keamanan':
                $keamanan->ubah();
                break;
            case 'hapus-keamanan':
                $keamanan->hapus();
                break;
        // Page Keamanan

        // Page Ketua
        case 'tambahketua':
            require_once("../ketua/tambahketua.php");
            break;
        case 'ubahketua':
            require_once("../ketua/ubahketua.php");
            break;
            // Aksi Ketua
            case 'tambah-ketua':
                $ketua->buat();
                break;
            case 'ubah-ketua':
                $ketua->ubah();
                break;
            case 'hapus-ketua':
                $ketua->hapus();
                break;
        // Page Ketua

        // Page Pelanggaran
        case 'tambahpelanggaran':
            require_once("../pelanggaran/tambahpelanggaran.php");
            break;
        case 'ubahpelanggaran':
            require_once("../pelanggaran/ubahpelanggaran.php");
            break;
            // Aksi Pelanggaran
            case 'tambah-pelanggaran':
                $pelanggaran->buat();
                break;
            case 'ubah-pelanggaran':
                $pelanggaran->ubah();
                break;
            case 'hapus-pelanggaran':
                $pelanggaran->hapus();
                break;
        // Page Pelanggaran

        // Page Sanksi
        case 'tambahsanksi':
            require_once("../sanksi/tambahsanksi.php");
            break;
        case 'ubahsanksi':
            require_once("../sanksi/ubahsanksi.php");
            break;
            // Aksi Sanksi
            case 'tambah-sanksi':
                $sanksi->buat();
                break;
            case 'ubah-sanksi':
                $sanksi->ubah();
                break;
            case 'hapus-sanksi':
                $sanksi->hapus();
                break;
        // Page Sanksi

        // Page Santri
        case 'tambahsantri':
            require_once("../santri/tambahsantri.php");
            break;
        case 'ubahsantri':
            require_once("../santri/ubahsantri.php");
            break;
            // Aksi Santri
            case 'tambah-santri':
                $santri->buat();
                break;
            case 'ubah-santri':
                $santri->ubah();
                break;
            case 'hapus-santri':
                $santri->hapus();
                break;
        // Page Santri

        // Page Laporan
        case 'ubahdiskusi':
            require_once("../laporan/ubahdiskusi.php");
            break;
            // Aksi Laporan
            case 'ubah-diskusi':
                $nama = htmlspecialchars($_POST['nama_santri']);
                $id_ketua = htmlspecialchars($_POST['id_ketua']);
                $id_keamanan = htmlspecialchars($_POST['id_keamanan']);
                $hasil = htmlspecialchars($_POST['hasil_diskusi']);
                $row = $configs->query("UPDATE laporan_diskusi SET id_ketua='$id_ketua', id_keamanan='$id_keamanan', hasil_diskusi='$hasil' WHERE nama_santri='$nama'");
                if($row){
                    echo "<script>document.location.href = '../ui/header.php?page=laporan-diskusi'</script>";
                    exit;
                }else{
                    echo "<script>document.location.href = '../ui/header.php?page=laporan-diskusi'</script>";
                    exit;                    
                }
                break;
        // Page Laporan
        
        default:
            require_once("../../controller/controller.php");
            break;
    }
}
?>