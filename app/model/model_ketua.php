<?php 
namespace model;

class ketua {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function read(){
        $row = $this->db->query("SELECT * FROM ketua order by id_ketua asc");
        return $row;
    }

    public function readupdate($query, $id){
        $row = $this->db->query($query, $id);
        return $row;
    }

    public function create($id_ketua,$nama_ketua,$alamat,$no_hp){
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_ketua = htmlentities($_POST['nama_ketua']) ? htmlspecialchars($_POST['nama_ketua']) : $_POST['nama_ketua'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $table = "ketua";
        $sql = "INSERT $table SET id_ketua='$id_ketua', nama_ketua='$nama_ketua', alamat='$alamat', no_hp='$no_hp'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=berhasil';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function update($id_ketua,$nama_ketua,$alamat,$no_hp){
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_ketua = htmlentities($_POST['nama_ketua']) ? htmlspecialchars($_POST['nama_ketua']) : $_POST['nama_ketua'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $table = "ketua";
        $sql = "UPDATE $table SET nama_ketua='$nama_ketua', alamat='$alamat', no_hp='$no_hp' WHERE id_ketua='$id_ketua'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=ubah';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function delete($id_ketua){
        $id_ketua = htmlentities($_GET['id_ketua']) ? htmlspecialchars($_GET['id_ketua']) : $_GET['id_ketua'];
        $table = "ketua";
        $sql = "DELETE FROM $table WHERE id_ketua='$id_ketua'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=hapus';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=ketua&info=gagal';
            </script>";
            die;
            exit;            
        }
    }
}

?>