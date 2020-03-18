<?php

// membuat class M_login yang mewarisi sifat dari class CI_Model
class M_login extends CI_Model
{

    //function untuk mengecek apakah data yang login sesuai dengan database
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
