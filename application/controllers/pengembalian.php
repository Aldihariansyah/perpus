<?php

class pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('tgl_indo_helper');
    }
    public function index()
    {
        $isi['content'] = 'pengembalian/v_pengembalian';
        $isi['judul'] = 'Data pengembalian Buku';
        $this->load->model('m_pengembalian');
        $isi['data'] = $this->m_pengembalian->getDAllData();
        $this->load->view('v_dashboard', $isi);
    }
}
