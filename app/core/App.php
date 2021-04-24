<?php 
/* 
    __construct method adalah metode khusus yang akan 
    dijlnkan secara otomatis setiap membuat intans dari sebuah kelas
*/

class App
{
    // memebuat properti untuk memnentukan controller ,method dan parameter default nya
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = []; // bila kemungkina parameternya banyak



    public function __construct()
    {
        // panggil pungsi parseURL()
        $url = $this->parseURL();
        /*
            cek apakah ada sebuah file didalam folder controllers 
            yang nama nya Home.php 
            sesuai dengan yang ditulis di url ada.
            cara cek : file exists ngga, dimana?didalam folder controllers arahkan kesana
            karena file yang di akses adalah index jadi keluar dulu lalu masuk  ke app masuk ke controllers. gabungkan dengan $_url indek ke berapa. digabung dengan .php !
            home = controller, index = method, 10, 20 = parameter
        */
        // cek apakah url bernilai NULL 
        if($url == NULL){
            $url = [$this->controller];
        }
        // controller
        if (file_exists('../app/controllers/' . $url[0] .'.php') )
        // timpa controller yang diatas, jadi controllers yang baru
        {
            $this->controller = $url[0]; //ini adalah controller
            unset($url[0]); // hilangkan controller nya dari element array 
        }
        require_once '../app/controllers/' . $this->controller . '.php'; // panggile controllers nya
        $this->controller = new $this->controller; // instansiasi supaya bisa manggil method

        // method 
        if(isset($url[1])){
            //cek apaakah ada methodnya
            if(method_exists($this->controller, $url[1])){
                // kalau ada timpa 
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // kelola parameternya about/index/10/20
        if(!empty($url)){
            // ambil data 
            $this->params = array_values($url);
        }

        // jalankan controller dan method, serta kirimkan params jika ada 
        call_user_func_array([$this->controller, $this->method], $this->params);
    }



    //membuat method untuk mem-parse url 
    public function parseURL()
    {
        // cek url apakah ada url yang dikirimkan
        if(isset($_GET['url']))
        {
            // menhapus tanda sles
            $url = rtrim($_GET['url'],'/');
            // mengbersikan url dari karakter yang ngaco
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // pecah url berdasarkan tanda sles, jadi sting menjadi elemen array
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>