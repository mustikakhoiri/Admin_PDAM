<?php
defined('BASEPATH') or exit('No direct script access allowed');

// membuat class C_dashboard yang mewarisi sifat dari class CI_Controller
class C_dashboard extends CI_Controller
{

    function __construct()
    {
        //digunakan agar tidak menimpa __construct parent
        parent::__construct();
        //function untuk memuat library form_validation
        $this->load->library('form_validation');
        //function untuk memuat helper url
        $this->load->helper(array('url'));
        //function untuk memuat model m_data
        $this->load->model('m_data');

        //jika status session bukan login
        if ($this->session->userdata('status') != "login") {
            //maka dipindahkan ke controller c_login
            redirect(base_url("c_login"));
        }
    }

    //method yang akan dimuat saat controller c_dashboard ini diakses
    function index()
    {
        //variabel array $data yang digunakan untuk memanggil nilai 'username' dari tabel admin berdasarkan session login yang sedang berlangsung
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        //baris kode berikut untuk menampilkan view v_dashboard sebagai tampilan awal setelah login
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
