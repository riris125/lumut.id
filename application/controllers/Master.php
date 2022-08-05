<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function produk()
    {
        $data['title'] = 'Data Produk (Barang)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Master_model', 'produk');

        $data['data_produk'] = $this->produk->getProduk();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/produk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'size' => $this->input->post('size'),
                'warna' => $this->input->post('warna'),
                'stok' => $this->input->post('stok'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data produk sukses!</div>');
            redirect('master/produk');
        }
    }
    public function penjual()
    {
        $data['title'] = 'Data Penjual (Supplier)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Master_model', 'penjual');

        $data['data_penjual'] = $this->penjual->getPenjual();
        //$data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/penjual', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_penjual' => $this->input->post('nama_penjual'),
                'keterangan' => $this->input->post('keterangan'),

            ];
            $this->db->insert('penjual', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data penjual/supplier sukses!</div>');
            redirect('master/penjual');
        }
    }
    public function penjual_edit($penjual_id)
    {
        $data['title'] = 'Ubah data Penjual/Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penjual'] = $this->db->get_where('penjual', ['id' => $penjual_id])->row_array();

        $this->db->where('id !=', 1);
        $data['data_penjual'] = $this->db->get('penjual')->result_array();

        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/penjual_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_penjual = $this->input->post('nama_penjual');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'nama_penjual' => $nama_penjual,
                'keterangan'  => $keterangan
            );
            $this->db->where('id', $penjual_id);
            $this->db->update('penjual', $data);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah data berhasil!</div>');
            redirect('master/penjual');
        }
    }
    public function penjual_hapus($penjual_id)
    {
        $data['penjual'] = $this->db->get_where('penjual', ['id' => $penjual_id])->row_array();

        $this->db->where('id !=', 1);
        $data['data_penjual'] = $this->db->get('penjual')->result_array();

        $this->db->where('id', $penjual_id);
        $this->db->delete('penjual');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data berhasil!</div>');
        redirect('master/penjual');
    }
    public function pembeli()
    {
        $getPembeli = $this->Master_model->getPembeli();
        // echo "<pre>";
        // print_r($getPembeli);
        // echo "</pre>";

        $data = array('queryPembeli' => $getPembeli);

        $data['title'] = 'Data Pembeli (Customer)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/pembeli', $data);
            $this->load->view('templates/footer');
        } else {
            // $data = [
            //     'nama_pembeli' => $this->input->post('nama_pembeli'),
            //     'keterangan' => $this->input->post('keterangan'),
            // ];

            $nama  = $this->input->post('nama_pembeli');
            $keterangan = $this->input->post('keterangan');
            $data = array(
                'nama_pembeli' => $nama,
                'keterangan'   => $keterangan
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $this->Master_model->insertPembeli($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah data berhasil!</div>');
            redirect('master/pembeli');
        }
    }
    public function pembeli_edit($pembeli_id)
    {
        $editPembeli = $this->Master_model->geteditPembeli($pembeli_id);
        // echo "<pre>";
        // print_r($editPembeli);
        // echo "</pre>";
        $data = array('editPembeli' => $editPembeli);

        $data['title'] = 'Ubah data Pembeli/Customer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/pembeli_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_pembeli = $this->input->post('nama_pembeli');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'nama_pembeli' => $nama_pembeli,
                'keterangan'  => $keterangan
            );
            //     $this->db->where('id', $pembeli_id);
            //     $this->db->update('pembeli', $data);
            $this->Master_model->editPembeli($pembeli_id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah data berhasil!</div>');
            redirect('master/pembeli');
        }
    }
    public function pembeli_hapus($pembeli_id)
    {
        $this->Master_model->deletePembeli($pembeli_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hapus data berhasil!</div>');
        redirect('master/pembeli');
    }
}
