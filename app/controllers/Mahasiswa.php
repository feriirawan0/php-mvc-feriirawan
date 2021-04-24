<?php 

class Mahasiswa extends Controller{
    // method default mahasiswa 
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    // method detail 
    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // method tambah 
    public function tambah()
    {
        // cek apakah data berhasil masuk dan lebih dari nol 
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0)
        // lebih besar berarti ada data yang berhasil masuk
        {
            // sebelum kembali panggil Flasher nya jika berhasil
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        } else {
            // dan kalau gagal tampilkan pesan 
            Flasher::setFlash('gagal', 'ditambahkan', 'denger');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }

    // method hapus 
    public function hapus($id)
    {
        // cek apakah data url yang berisikan id
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0)
        {
            // sebelum kembali panggil Flasher nya jika berhasil dihapus
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        } else {
            // dan kalau gagal tampilkan pesan 
            Flasher::setFlash('gagal', 'dihapus', 'denger');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }
    // id 
    public function getubah()
    {
        // meminnta ke mahasiswa_model, dan supaya bentuknya bukan array asosiatif bungkus dengan fungsi tapi json dikirm ke data
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    // ubah data 
    public function ubah()
    {
        // cek apakah data berhasil masuk dan lebih dari nol 
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0)
        // lebih besar berarti ada data yang berhasil masuk
        {
            // sebelum kembali panggil Flasher nya jika berhasil
            Flasher::setFlash('berhasil', 'diubah', 'success');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        } else {
            // dan kalau gagal tampilkan pesan 
            Flasher::setFlash('gagal', 'diubah', 'denger');
            // jika berhasil masuk pindahkan 
            header('Location: '. BASEURL . '/mahasiswa');
            exit;
        }
    }


    // method cari 
    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }




}

?>