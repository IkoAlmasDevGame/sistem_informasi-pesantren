<?php 
namespace model;

class Sanksi {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function read(){
        $row = $this->db->query("SELECT * FROM sanksi order by no_sanksi asc");
        return $row;
    }

    public function readupdate($query, $no){
        $row = $this->db->query($query, $no);
        return $row;
    }

    public function create($nomor,$nama,$jenis){
        $nomor = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $nama = htmlentities($_POST['nama_sanksi']) ? htmlspecialchars($_POST['nama_sanksi']) : $_POST['nama_sanksi'];
        $jenis = htmlentities($_POST['jenis_sanksi']) ? htmlspecialchars($_POST['jenis_sanksi']) : $_POST['jenis_sanksi'];

        $table = "sanksi";
        $sql = "INSERT $table SET no_sanksi='$nomor', nama_sanksi='$nama', jenis_sanksi='$jenis'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=berhasil';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function update($nomor,$nama,$jenis){
        $nomor = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $nama = htmlentities($_POST['nama_sanksi']) ? htmlspecialchars($_POST['nama_sanksi']) : $_POST['nama_sanksi'];
        $jenis = htmlentities($_POST['jenis_sanksi']) ? htmlspecialchars($_POST['jenis_sanksi']) : $_POST['jenis_sanksi'];

        $table = "sanksi";
        $sql = "UPDATE $table SET nama_sanksi='$nama', jenis_sanksi='$jenis' WHERE no_sanksi='$nomor'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=ubah';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function delete($nomor){
        $nomor = htmlentities($_GET['no_sanksi']) ? htmlspecialchars($_GET['no_sanksi']) : $_GET['no_sanksi'];

        $table = "sanksi";
        $sql = "DELETE FROM $table WHERE no_sanksi='$nomor'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=hapus';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=sanksi&info=gagal';
            </script>";
            die;
            exit;            
        }
    }
}

?>