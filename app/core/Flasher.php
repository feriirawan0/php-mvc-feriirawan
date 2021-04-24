<?php 

// membuat pesan kilat 
// menggunakan method static agar dapat memanggil method nya tanpa melakukan intansiasi 
class Flasher {

    // method 1 melakukan pesannya mau seperti apa
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // untuk menampilkan pesan nya 
    public static function flash()
    {
        if(isset($_SESSION['flash'])){
            echo '
            <div class="alert alert-'. $_SESSION['flash']['tipe'] .' alert-dismissible fade show" role="alert">
            Data Mahasiswa <strong>'. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';

        unset($_SESSION['flash']);
        }
    }



}

?>