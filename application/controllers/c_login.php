<?php

// membuat class C_login yang mewarisi sifat dari class CI_Controller
class C_login extends CI_Controller
{

    function __construct()
    {
        //digunakan agar tidak menimpa __construct parent
        parent::__construct();
        //function untuk memuat library form_validation
        $this->load->library('form_validation');
        //function untuk memuat helper url
        $this->load->helper(array('url'));
        //function untuk memuat model m_login
        $this->load->model('m_login');
    }

    //method yang akan dimuat saat controller c_login ini diakses
    function index()
    {
        //baris kode untuk menampilkan view v_login
        $this->load->view('templates/header');
        $this->load->view('v_login');
        $this->load->view('templates/footer');
    }

    //function untuk melakukan aksi login
    function aksi_login()
    {
        //menangkap username dan password yg dikirim melalui form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //memasukkan username dan password ke dalam array
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        //mengecek ketersediaan username dan password di m_login || fungsi num_rows() untuk menghitung jumlah record
        $cek = $this->m_login->cek_login("admin", $where)->num_rows();

        //cek kebenaran data username dan password
        //jika data benar maka statusnya menjadi login dan session akan berisi username yang diisikan
        if ($cek > 0) {
            $data_session = array(
                'username' => $username,
                'status' => "login"
            );
            $this->session->set_userdata($data_session);

            redirect('c_dashboard'); //jika sudah login maka akan dialihkan ke controller dashboard

        } else {
            echo "username atau password salah !"; //peringatan jika username atau password salah
        }
    }

    //function untuk logout
    function logout()
    {
        $this->session->sess_destroy();    // menghapus semua session setelah logout
        redirect(base_url('c_login'));    //setelah logout dialihkan kembali pada controller c_login
    }
}
