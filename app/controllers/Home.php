<?php 

// child class dari controller 
    class Home extends Controller
    {
        // method default nya
        public function index()
        {
            // ketika tidak menuliskan apapun di urlnya maka default ini yang dipanggil
            // echo 'Home/index';
            $data['judul'] = 'Home';
            $data['nama'] = $this->model('User_model')->getUser();
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');

        }
    }


?>