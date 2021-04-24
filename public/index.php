<?php 
// menjalankan session 
if(!session_id()) {
    session_start();
}


/*
    Teknik Bootstrapping 
    memanggil file init.php yang berada di folder ..app/init.php 
    file init.php akan memanggil seluruh file aplikasi nya.
*/

require_once '../app/init.php';

// instansiasi class atau menjalankan kelas App
$app = new App;


?>