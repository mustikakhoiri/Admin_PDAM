<?php

// membuat class M_login yang mewarisi sifat dari class CI_Model
class M_data extends CI_Model
{
    //function untuk menampilkan data pelanggan
    function tampil_pelanggan()
    {
        return $this->db->get('pelanggan');    //mengambil data dari database (tabel pelanggan) dan mengembalikannya ke fungsi pemanggil menggunakan return
    }

    //function untuk menampilkan data admin
    function tampil_admin()
    {
        return $this->db->get('admin');    //mengambil data dari database (tabel admin) dan mengembalikannya ke fungsi pemanggil menggunakan return
    }

    //function untuk input data
    function input_data($data, $table)
    {
        $this->db->insert($table, $data); //insert menambahkan data ke dalam tabel
    }

    //function untuk hapus data
    function hapus_data($where, $table)
    {
        $this->db->where($where);    //where untuk menyeleksi query atas data yg akan dihapus
        $this->db->delete($table);    //delete untuk menghapus data dari tabel
    }

    //function untuk edit data
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where); //menyeleksi atau mengambil data dari tabel yang ingin diedit berdasarkan id
    }

    //function untuk edit data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);            //menyeleksi query atas data yang akan diupdate
        $this->db->update($table, $data);    //mengupdate data pada tabel yang telah diedit
    }
}
