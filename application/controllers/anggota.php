<?php

class anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');
    }

    public function index()
    {
        $isi['content'] = 'anggota/v_anggota';
        $isi['judul'] = 'Daftar Data Anggota';
        $isi['data'] = $this->db->get('anggota')->result();
        $this->load->view('v_dashboard', $isi);
    }

    public function tambah_anggota()
    {
        $isi['content'] = 'anggota/form_anggota';
        $isi['judul'] = 'Form tambah Anggota';
        $isi['id_anggota'] = $this->m_anggota->id_anggota();
        $this->load->view('v_dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $query = $this->db->insert('anggota', $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'data berhasil disimpan');
            redirect('anggota');
        }
    }
    public function edit($id)
    {
        $isi['content'] = 'anggota/edit_anggota';
        $isi['judul'] = 'Form edit Anggota';
        $isi['data'] = $this->m_anggota->edit($id);
        $this->load->view('v_dashboard', $isi);
    }
    public function update()
    {
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_anggota' => $this->input,
            'id_anggota' => $this->input->post('id_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp')
        );
        $query = $this->m_anggota->update($id_anggota, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', 'data berhasil diupdate');
            redirect('anggota');
        }
    }
    public function delete($id)
    {
        $query = $this->m_anggota->delete($id);
        $this->session->set_flashdata('info', 'data berhasil dihapus');
        redirect('anggota');
    }
}
