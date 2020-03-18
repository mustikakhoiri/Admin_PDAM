<?php
defined('BASEPATH') or exit('No direct script access allowed');

// membuat class C_pelanggan yang mewarisi sifat dari class CI_Controller
class C_pelanggan extends CI_Controller
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

    //method yang akan dimuat saat controller c_pelanggan ini diakses
    function index()
    {
        //variabel array $data yang digunakan untuk memanggil seluruh nilai dari tabel pelanggan
        $data['pelanggan'] = $this->m_data->tampil_pelanggan()->result();
        //baris kode berikut untuk menampilkan view v_admin berdasarkan data dari tabel pelanggan
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_pelanggan', $data);
        $this->load->view('templates/footer');
    }

    //method untuk menjalankan button tambah di view v_inputpelanggan yang akan dieksekusi di view v_inputpelanggan
    function tambah()
    {
        //baris kode untuk menampilkan view v_inputpelanggan
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_inputpelanggan');
        $this->load->view('templates/footer');
    }

    //methoc untuk mengeksekusi data pelanggan yang baru ditambahkan
    function tambah_aksi()
    {

        //baris kode untuk menangkap data yang diinput agar bisa disimpan di database
        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jumlah_tagihan = $this->input->post('jumlah_tagihan');
        $status = $this->input->post('status');

        //menjadikan data yang ditangkap sebagai array
        $data = array(
            'nama_pelanggan' => htmlspecialchars($nama_pelanggan, true),
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'jumlah_tagihan' => $jumlah_tagihan,
            'status' => $status
        );

        //menginput array data, dan menyimpannya di tabel pelanggan
        $this->m_data->input_data($data, 'pelanggan');
        //mengalihkan ke controller c_pelanggan
        redirect('c_pelanggan');
    }

    //method untuk menghapus data berdasarkan id
    function hapus($id_pelanggan)
    {
        $where = array('id_pelanggan' => $id_pelanggan); //$id untuk menangkap id yang dikirim melalui url dari link hapus dan menjadikannya array
        $this->m_data->hapus_data($where, 'pelanggan'); //mengembalikan array ke model m_data  dan menghapusnya dengan function hapus_data pada model m_data || $where berisi id dari data yg ingin dihapus
        //mengalihkan ke controller c_pelanggan
        redirect('c_pelanggan');
    }

    //methd untuk edit data berdasarkan id dari data yang akan diambil
    function edit($id_pelanggan)
    {
        $where = array('id_pelanggan' => $id_pelanggan); //mengubah id menjadi array
        $data['pelanggan'] = $this->m_data->edit_data($where, 'pelanggan')->result(); //mengambil data berdasarkan id dengan function edit_data() pada model m_data || result() untuk men-generate hasil query menjadi array
        //baris kode untuk menampilkan view v_editpelanggan
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_editpelanggan', $data); //memasukkan array data ke variabel dan memparsingnya ke dalam view v_edit
        $this->load->view('templates/footer');
    }

    //method untuk update data
    function update()
    {
        //mengambil data dari form edit
        $id_pelanggan = $this->input->post('id_pelanggan');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jumlah_tagihan = $this->input->post('jumlah_tagihan');
        $status = $this->input->post('status');

        //memasukkan data yang akan diupdate ke dalam variabel data
        $data = array(
            'nama_pelanggan' => htmlspecialchars($nama_pelanggan, true),
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'jumlah_tagihan' => $jumlah_tagihan,
            'status' => $status
        );

        //penentu untuk data yang diupdate (id yg mana)
        $where = array(
            'id_pelanggan' => $id_pelanggan
        );

        //mengatur atau menghandle update data dengan function update_data pada model m_data
        $this->m_data->update_data($where, $data, 'pelanggan');
        redirect('c_pelanggan'); //kembali ke controller c_pelanggan setelah update data tersimpan
    }
}
