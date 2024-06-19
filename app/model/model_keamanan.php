<?php 
namespace model;

class keamanan {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function read(){
        $row = $this->db->query("SELECT * FROM keamanan order by id_keamanan asc");
        return $row;
    }

    public function readupdate($query, $id){
        $row = $this->db->query($query, $id);
        return $row;
    }

    public function create($id_keamanan, $id_ketua, $nama_keamanan, $alamat, $no_hp){
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_keamanan = htmlentities($_POST['nama_keamanan']) ? htmlspecialchars($_POST['nama_keamanan']) : $_POST['nama_keamanan'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $table = "keamanan";
        $sql = "INSERT $table SET id_keamanan='$id_keamanan', id_ketua='$id_ketua', nama_keamanan='$nama_keamanan', alamat='$alamat', no_hp='$no_hp'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=berhasil';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function update($id_keamanan, $id_ketua, $nama_keamanan, $alamat, $no_hp){
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_keamanan = htmlentities($_POST['nama_keamanan']) ? htmlspecialchars($_POST['nama_keamanan']) : $_POST['nama_keamanan'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $table = "keamanan";
        $sql = "UPDATE $table SET id_ketua = '$id_ketua', nama_keamanan='$nama_keamanan', alamat='$alamat', no_hp='$no_hp' WHERE id_keamanan='$id_keamanan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=ubah';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function delete($id_keamanan){
        $id_keamanan = htmlentities($_GET['id_keamanan']) ? htmlspecialchars($_GET['id_keamanan']) : $_GET['id_keamanan'];
        $table = "keamanan";
        $sql = "DELETE FROM $table WHERE id_keamanan = '$id_keamanan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=hapus';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=keamanan&info=gagal';
            </script>";
            die;
            exit;            
        }
    }
}

?>