<?php
class pengarang extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengarang');
    }

    public function index()
    {
        $isi['content'] = 'pengarang/v_pengarang';
        $isi['judul'] = 'Daftar Data Pengarang';
        $isi['data'] = $this->db->get('pengarang')->result();
        $this->load->view('v_dashboard', $isi);
    }
    public function tambah_pengarang()
    {
        $isi['content'] = 'pengarang/form_pengarang';
        $isi['judul'] = 'Form Tambah Pengarang';
        $this->load->view('v_dashboard', $isi);
    }
    public function simpan()
    {
        $data['nama_pengarang'] = $this->input->post('nama_pengarang');
        $query = $this->db->insert('pengarang', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Simpan');
            redirect('pengarang');
        }
    }
    public function edit($id)
    {
        $isi['content'] = 'pengarang/edit_pengarang';
        $isi['judul'] = 'Form Edit Pengarang';
        $isi['data'] = $this->m_pengarang->edit($id);
        $this->load->view('v_dashboard', $isi);
    }
    public function update()
    {
        $id_pengarang            = $this->input->post('id_pengarang');
        $data['nama_pengarang'] =  $this->input->post('nama_pengarang');

        $query = $this->m_pengarang->update($id_pengarang, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data berhasil diupdate');
            redirect('pengarang');
        }
    }
    public function delete($id)
    {
        $query = $this->m_pengarang->delete($id);
        $this->session->set_flashdata('info', 'data berhasil dihapus');
        redirect('pengarang');
    }
}
