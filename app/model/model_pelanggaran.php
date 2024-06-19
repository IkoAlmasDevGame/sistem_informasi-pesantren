<?php 
namespace model;

class pelanggaran {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function read(){
        $row = $this->db->query("SELECT * FROM pelanggaran order by no_pelanggaran asc");
        return $row;
    }

    public function readupdate($query, $no){
        $row = $this->db->query($query, $no);
        return $row;
    }

    public function create($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan){
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $nama_pelanggaran = htmlentities($_POST['nama_pelanggaran']) ? htmlspecialchars($_POST['nama_pelanggaran']) : $_POST['nama_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];

        $table = "pelanggaran";
        $sql = "INSERT $table SET no_pelanggaran='$no_pelanggaran', nama_pelanggaran='$nama_pelanggaran', no_sanksi='$no_sanksi', id_keamanan='$id_keamanan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=berhasil';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function update($no_pelanggaran, $nama_pelanggaran, $no_sanksi, $id_keamanan){
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $nama_pelanggaran = htmlentities($_POST['nama_pelanggaran']) ? htmlspecialchars($_POST['nama_pelanggaran']) : $_POST['nama_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];

        $table = "pelanggaran";
        $sql = "UPDATE $table SET nama_pelanggaran='$nama_pelanggaran', no_sanksi='$no_sanksi', id_keamanan='$id_keamanan' WHERE no_pelanggaran='$no_pelanggaran'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=ubah';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function delete($no_pelanggaran){
        $no_pelanggaran = htmlentities($_GET['no_pelanggaran']) ? htmlspecialchars($_GET['no_pelanggaran']) : $_GET['no_pelanggaran'];
        $table = "pelanggaran";
        $sql = "DELETE FROM $table WHERE no_pelanggaran = '$no_pelanggaran'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=hapus';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=pelanggaran&info=gagal';
            </script>";
            die;
            exit;            
        }
    }
}
?>