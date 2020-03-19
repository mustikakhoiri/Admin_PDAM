<?php
defined('BASEPATH') or exit('No direct script access allowed');

// membuat class C_admin yang mewarisi sifat dari class CI_Controller
class C_admin extends CI_Controller
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

    //method yang akan dimuat saat controller c_admin ini diakses
    function index()
    {
        //variabel array $data yang digunakan untuk memanggil seluruh nilai dari tabel admin
        $data['admin'] = $this->m_data->tampil_admin()->result();
        //baris kode berikut untuk menampilkan view v_admin berdasarkan data dari tabel admin
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_admin', $data);
        $this->load->view('templates/footer');
    }

    //method untuk menjalankan button tambah di view v_admin yang akan dieksekusi di biew v_inputadmin
    function tambah()
    {
        //baris kode untuk menampilkan view v_inputadmin
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_inputadmin');
        $this->load->view('templates/footer');
    }

    //methoc untuk mengeksekusi data admin yang baru ditambahkan
    function tambah_aksi()
    {
        //baris kode untuk menangkap data yang diinput agar bisa disimpan di database
        $id_admin = $this->input->post('id_admin');
        $username = $this->input->post('username');
        $nama_admin = $this->input->post('nama_admin');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $password = $this->input->post('password');

        //menjadikan data yang ditangkap sebagai array
        $data = array(
            'username' => htmlspecialchars($username, true),
            'nama_admin' => htmlspecialchars($nama_admin, true),
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'password' => md5($password)
        );

        //menginput array data, dan menyimpannya di tabel user
        $this->m_data->input_data($data, 'admin');
        //mengalihkan ke controller c_admin
        redirect('c_admin');
    }

    //method untuk menghapus data berdasarkan id
    function hapus($id_admin)
    {
        $where = array('id_admin' => $id_admin);    //$id untuk menangkap id yang dikirim melalui url dari link hapus dan menjadikannya array
        $this->m_data->hapus_data($where, 'admin'); //mengembalikan array ke model m_data  dan menghapusnya dengan function hapus_data pada model m_data || $where berisi id dari data yg ingin dihapus
        redirect('c_admin');    //mengembalikan ke controller c_admin
    }

    //methd untuk edit data berdasarkan id dari data yang akan diambil
    function edit($id_admin)
    {
        $where = array('id_admin' => $id_admin);    //mengubah id menjadi array
        $data['admin'] = $this->m_data->edit_data($where, 'admin')->result(); //mengambil data berdasarkan id dengan function edit_data() pada model m_data || result() untuk men-generate hasil query menjadi array
        //baris kode untuk menampilkan view v_editadmin
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_editadmin', $data);
        $this->load->view('templates/footer');
    }

    //method untuk update data
    function update()
    {
        //mengambil data dari form edit
        $id_admin = $this->input->post('id_admin');
        $username = $this->input->post('username');
        $nama_admin = $this->input->post('nama_admin');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $password = $this->input->post('password');

        //memasukkan data yang akan diupdate ke dalam variabel data
        $data = array(
            'username' => htmlspecialchars($username, true),
            'nama_admin' => htmlspecialchars($nama_admin, true),
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'password' => md5($password)
        );

        //penentu untuk data yang diupdate (id yg mana)
        $where = array(
            'id_admin' => $id_admin
        );

        //mengatur atau menghandle update data dengan function update_data pada model m_data
        $this->m_data->update_data($where, $data, 'admin');
        redirect('c_admin'); //kembali ke index setelah update data tersimpan
    }
}
