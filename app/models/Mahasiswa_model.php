<?php 

// model class mahasiswa 
class Mahasiswa_model {
    // data ini bisa di dapat dari mana saja bisa dari database 
    // private $mhs = [
    //     [
    //         "nama" => "feri irawan",
    //         "nim" => "1710122019102",
    //         "email" => "feryirawan0305@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "asep iskandar",
    //         "nim" => "1719019201212",
    //         "email" => "asepiskandar@gmail.com",
    //         "jurusan" => "Teknik Kimia"
    //     ],
    //     [
    //         "nama" => "subur sabar",
    //         "nim" => "189028010012",
    //         "email" => "subursabar@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ],
    // ];

    // private $dbh; // database handler
    // private $stmt;

    // koneksi database 
    // public function __construct()
    // {
    //     // data source name 
    //     $dsn = "mysql:host=localhost;dbname=phpmvc";

    //     try {
    //         // koneksi dengan PDO 
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch(PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }

    private $table = 'mahasiswa';
    private $db; //menampung class database

    // begitu dipanggil construct langsung konek ke database
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        // // query database menamilkan semua data dari tabel mahasiswa
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute(); // eksekusi 
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // ambil semua data nya tipe kembalian array asosiatif
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // method model id 
    public function getMahasiswaById($id)
    {
        // query by id 
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE id=:id');
        // mengamankan query id kita binding
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // method tambah data mahasiswa ini menerima $_POST tangkap pakai $data
    public function tambahDataMahasiswa($data)
    {
        // lakukan query INSERT DATA 
        $query = "INSERT INTO mahasiswa
                    VALUES 
                    ('', :nama, :nim, :email, :jurusan)
        ";
        // jalankan query 
        $this->db->query($query);
        // lakukan binding misal nama yang di inser dengan nama yang ada di form name
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        // eksekusi 
        $this->db->execute();
        // kembaikan nilai 
        return $this->db->rowCount();
    }

    // metode untuk hapus 
    public function hapusDataMahasiswa($id)
    {
        // jalankan query hapus
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        // jalankan querynya 
        $this->db->query($query);
        $this->db->bind('id', $id);

        // eksekusi 
        $this->db->execute();

        // apakah ada baris yg terpengaruh jika berhasil akan mengasilkan angka 1
        return $this->db->rowCount();
    }

        // method tambah data mahasiswa ini menerima $_POST tangkap pakai $data
        public function ubahDataMahasiswa($data)
        {
            // lakukan query INSERT DATA 
            $query = "UPDATE mahasiswa SET 
                        nama = :nama,
                        nim = :nim,
                        email = :email,
                        jurusan = :jurusan
                    WHERE id = :id";
            // jalankan query 
            $this->db->query($query);
            // lakukan binding misal nama yang di inser dengan nama yang ada di form name
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nim', $data['nim']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);
            $this->db->bind('id', $data['id']);
            // eksekusi 
            $this->db->execute();
            // kembaikan nilai 
            return $this->db->rowCount();
        }


        // contorller cari mahasiswa 
        public function cariDataMahasiswa()
        {
            // terima kyword yang dikirim dari form cari 
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultSet();
        }



}


?>