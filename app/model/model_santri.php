<?php 
namespace model;

class santri {
    protected $db;
    public function __construct($db)
    {
        $this -> db = $db;
    }

    public function read(){
        $row = $this->db->query("SELECT * FROM santri order by nis asc");
        return $row;
    }

    public function readupdate($query, $nis){
        $row = $this->db->query($query, $nis);
        return $row;
    }

    public function create($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi){
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];

        $table = "santri";
        $row = $this->db->query("INSERT INTO $table (nis,nama_santri,alamat,jenis_kelamin,no_pelanggaran,no_sanksi)
         VALUES ('$nis','$nama','$alamat','$jenis_kelamin','$no_pelanggaran','$no_sanksi')");
        $this->db->query("INSERT INTO laporan_diskusi (nama_santri,no_pelanggaran,no_sanksi) VALUES ('$nama','$no_pelanggaran','$no_sanksi')");

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=berhasil';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function update($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi){
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];

        $table = "santri";
        $sql = "UPDATE $table SET nama_santri='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin',
         no_pelanggaran='$no_pelanggaran', no_sanksi='$no_sanksi' WHERE nis = '$nis'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=ubah';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=gagal';
            </script>";
            die;
            exit;            
        }
    }

    public function delete($nis){
       $nis = htmlentities($_GET['nis']) ? htmlspecialchars($_GET['nis']) : $_GET['nis']; 
       
       $table = "santri";
       $sql = "DELETE FROM $table WHERE nis = '$nis'";
       $row = $this->db->query($sql);

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=hapus';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=santri&info=gagal';
            </script>";
            die;
            exit;            
        }
    }
}

?>