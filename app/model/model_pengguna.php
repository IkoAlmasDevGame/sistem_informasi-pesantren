<?php 
namespace model;

class pengguna {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function create($username,$email,$password,$repassword,$nama,$role){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];

        $table = "user";
        $sql = "INSERT $table SET username='$username', email='$email', password='$password', repassword='$repassword', nama='$nama', role='$role'";
        $config = $this->db->query($sql);

        if($config){
            echo "<script>
            alert('berhasil membuat akun baru ...');
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            alert('gagal membuat akun baru ...');
            </script>";
            die;
            exit;
        }
    }
    
    public function create2($username,$email,$password,$repassword,$nama,$namasantri,$role){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $namasantri = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];
        
        $table = "user";
        $sql = "INSERT $table SET username='$username', email='$email', password='$password', repassword='$repassword',
         nama='$nama', nama_santri='$namasantri', role='$role'";
        $config = $this->db->query($sql);

        if($config){
            echo "<script>
            alert('berhasil membuat akun baru ...');
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            alert('gagal membuat akun baru ...');
            </script>";
            die;
            exit;
        }    
    }

    public function login($username, $password){
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['password']);
        password_verify($password, PASSWORD_DEFAULT);

        if($username == "" || $password == ""){
            echo "<script>
            document.location.href = '../auth/index.php?informasi=blank'
            </script>";
            die;
            exit;
        }

        $table = "user";
        $sql = "SELECT * FROM $table WHERE username='$username' and password ='$password' || email='$username' and password='$password'";
        $config = $this->db->query($sql);
        $cek = mysqli_num_rows($config);

        if($cek > 0){
            $response = array($username,$password);
            $responded["user"] = $response;
            if($row = $config->fetch_assoc()){
                if($row['role'] == "ketua"){
                    $_SESSION['id_pengguna'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['role'] = "ketua";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }else if($row['role'] == "keamanan"){
                    $_SESSION['id_pengguna'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['role'] = "keamanan";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }else if($row['role'] == "wali"){
                    $_SESSION['id_pengguna'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['nama_santri'] = $row['nama_santri'];
                    $_SESSION['role'] = "wali";
                    echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                }
                $_SESSION['status'] = true;
                $_COOKIE['cookies'] = $username;
                setcookie($responded[$table], $row, time() + (86400 * 30), "/");
                array_push($responded[$table], $row);
                exit;
            }
        }else{
            $_SESSION['status'] = false;
            echo "<script>
            document.location.href = '../auth/index.php?informasi=failed'
            </script>";
            die;
            exit;
        }
    }
}

?>