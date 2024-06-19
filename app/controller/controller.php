<?php 
namespace controller;
use model\pengguna;
use model\keamanan;
use model\ketua;
use model\pelanggaran;
use model\Sanksi;
use model\santri;

class authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengguna($konfig);
    }

    public function signin(){
        session_start();
        $username = htmlentities($_POST['userInput']) ? htmlspecialchars($_POST['userInput']) : $_POST['userInput'];
        $password = md5($_POST['password'], false);
        
        $row = $this->konfig->login($username,$password);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function buat(){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];

        $row = $this->konfig->create($username,$email,$password,$repassword,$nama,$role);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function buat2(){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $password = md5($_POST['password'], false);
        $repassword = md5($_POST['repassword'], false);
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $namasantri = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $role = htmlentities($_POST['role']) ? htmlspecialchars($_POST['role']) : $_POST['role'];

        $row = $this->konfig->create2($username,$email,$password,$repassword,$nama,$namasantri,$role);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class security {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new keamanan($konfig);
    }

    public function Table(){
        $row = $this->konfig->read();
        return $row;
    }

    public function TableUpdate($query, $id){
        $row = $this->konfig->readupdate($query,$id);
        return $row;
    }

    public function buat(){
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_keamanan = htmlentities($_POST['nama_keamanan']) ? htmlspecialchars($_POST['nama_keamanan']) : $_POST['nama_keamanan'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $row = $this->konfig->create($id_keamanan, $id_ketua, $nama_keamanan, $alamat, $no_hp);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
    
    public function ubah(){
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_keamanan = htmlentities($_POST['nama_keamanan']) ? htmlspecialchars($_POST['nama_keamanan']) : $_POST['nama_keamanan'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $row = $this->konfig->update($id_keamanan, $id_ketua, $nama_keamanan, $alamat, $no_hp);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
    
    public function hapus(){
        $id_keamanan = htmlentities($_GET['id_keamanan']) ? htmlspecialchars($_GET['id_keamanan']) : $_GET['id_keamanan'];

        $row = $this->konfig->delete($id_keamanan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class leader {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new ketua($konfig);
    }

    public function Table(){
        $row = $this->konfig->read();
        return $row;
    }

    public function TableUpdate($query, $id){
        $row = $this->konfig->readupdate($query,$id);
        return $row;
    }

    public function buat(){
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_ketua = htmlentities($_POST['nama_ketua']) ? htmlspecialchars($_POST['nama_ketua']) : $_POST['nama_ketua'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $row = $this->konfig->create($id_ketua, $nama_ketua, $alamat, $no_hp);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $id_ketua = htmlentities($_POST['id_ketua']) ? htmlspecialchars($_POST['id_ketua']) : $_POST['id_ketua'];
        $nama_ketua = htmlentities($_POST['nama_ketua']) ? htmlspecialchars($_POST['nama_ketua']) : $_POST['nama_ketua'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];

        $row = $this->konfig->update($id_ketua, $nama_ketua, $alamat, $no_hp);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $id_ketua = htmlentities($_GET['id_ketua']) ? htmlspecialchars($_GET['id_ketua']) : $_GET['id_ketua'];
        
        $row = $this->konfig->delete($id_ketua);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class violation {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pelanggaran($konfig);
    }

    public function Table(){
        $row = $this->konfig->read();
        return $row;
    }

    public function TableUpdate($query, $no){
        $row = $this->konfig->readupdate($query,$no);
        return $row;
    }

    public function buat(){
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $nama_pelanggaran = htmlentities($_POST['nama_pelanggaran']) ? htmlspecialchars($_POST['nama_pelanggaran']) : $_POST['nama_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];

        $row = $this->konfig->create($no_pelanggaran,$nama_pelanggaran,$no_sanksi,$id_keamanan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $nama_pelanggaran = htmlentities($_POST['nama_pelanggaran']) ? htmlspecialchars($_POST['nama_pelanggaran']) : $_POST['nama_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $id_keamanan = htmlentities($_POST['id_keamanan']) ? htmlspecialchars($_POST['id_keamanan']) : $_POST['id_keamanan'];

        $row = $this->konfig->update($no_pelanggaran,$nama_pelanggaran,$no_sanksi,$id_keamanan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $no_pelanggaran = htmlentities($_GET['no_pelanggaran']) ? htmlspecialchars($_GET['no_pelanggaran']) : $_GET['no_pelanggaran'];
        
        $row = $this->konfig->delete($no_pelanggaran);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class penalty {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new sanksi($konfig);
    }

    public function Table(){
        $row = $this->konfig->read();
        return $row;
    }

    public function TableUpdate($query, $no){
        $row = $this->konfig->readupdate($query,$no);
        return $row;
    }

    public function buat(){
        $nomor = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $nama = htmlentities($_POST['nama_sanksi']) ? htmlspecialchars($_POST['nama_sanksi']) : $_POST['nama_sanksi'];
        $jenis = htmlentities($_POST['jenis_sanksi']) ? htmlspecialchars($_POST['jenis_sanksi']) : $_POST['jenis_sanksi'];

        $row = $this->konfig->create($nomor,$nama,$jenis);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $nomor = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];
        $nama = htmlentities($_POST['nama_sanksi']) ? htmlspecialchars($_POST['nama_sanksi']) : $_POST['nama_sanksi'];
        $jenis = htmlentities($_POST['jenis_sanksi']) ? htmlspecialchars($_POST['jenis_sanksi']) : $_POST['jenis_sanksi'];

        $row = $this->konfig->update($nomor,$nama,$jenis);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $nomor = htmlentities($_GET['no_sanksi']) ? htmlspecialchars($_GET['no_sanksi']) : $_GET['no_sanksi'];

        $row = $this->konfig->delete($nomor);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class Student {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new santri($konfig);
    }

    public function Table(){
        $row = $this->konfig->read();
        return $row;
    }

    public function TableUpdate($query, $nis){
        $row = $this->konfig->readupdate($query,$nis);
        return $row;
    }

    public function buat(){
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];

        $row = $this->konfig->create($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubah(){
        $nis = htmlentities($_POST['nis']) ? htmlspecialchars($_POST['nis']) : $_POST['nis'];
        $nama = htmlentities($_POST['nama_santri']) ? htmlspecialchars($_POST['nama_santri']) : $_POST['nama_santri'];
        $alamat = htmlentities($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : $_POST['alamat'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $no_pelanggaran = htmlentities($_POST['no_pelanggaran']) ? htmlspecialchars($_POST['no_pelanggaran']) : $_POST['no_pelanggaran'];
        $no_sanksi = htmlentities($_POST['no_sanksi']) ? htmlspecialchars($_POST['no_sanksi']) : $_POST['no_sanksi'];

        $row = $this->konfig->update($nis,$nama,$alamat,$jenis_kelamin,$no_pelanggaran,$no_sanksi);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $nis = htmlentities($_GET['nis']) ? htmlspecialchars($_GET['nis']) : $_GET['nis'];

        $row = $this->konfig->delete($nis);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

?>