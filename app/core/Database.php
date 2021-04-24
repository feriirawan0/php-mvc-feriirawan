<?php 
// WRAPPER
// koneksi database 
class Database {
    // simpan data yang ada di constanta file config
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; //database hendller nya
    private $stmt; //stetment

    // buat construct yang berisi ke database 
    public function __construct()
    {
        // data source name 
        $dsn = 'mysql:host=' . $this->host . ';dbname='. $this->db_name;

        $option = [ 
            // parameter dari konfigurasi database ATTR_PERSISTENT  agar kneksi terjaga
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            // koneksi dengan PDO 
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    // untuk menjalankan query database 
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // bainding datanya siapa tau ada WHERE / VALUES parameter istilah nya lah 
    public function bind($param, $value, $type = null)
    {
        // kalao type null lakukan sesuatu 
        if(is_null($type)){
            // supaya jalan lakukan switch
            switch(true){
                // kalao type nya interger otomatis set ke type integer 
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                // jika type boolean 
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                // dan kalo type nul 
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                // selain dari itu 
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        // jika sudah ketemu, dibinding value nya
        $this->stmt->bindValue($param, $value, $type);
        // membersihkan string 
    }
    // eksekusi 
    public function execute()
    {
        $this->stmt->execute();
    }

    // ambil data kalo banyak jalankan fungsi ini 
    public function resultSet()
    {
        // panggil executenya
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // kalao data hanya 1
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // untuk menghitng ada berapa bais yang berubah didalam tabelnya
    public function rowCount()
    {
        return $this->stmt->rowCount();
        // rowCount bawah punya PDO 
    }

    

}


?>