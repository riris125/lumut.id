<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Post';
        $data['user'] = $this->db->get_where('post', ['username' => $this->session->userdata('email')])->row_array();

        $data['post'] = $this->db->get('post')->result_array();
        //print_r($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
        $title = $this->input->post('title');
        $content = $this->input->post('content');

        //die;
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('post', [
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'date' => date("Y-m-d H:i:s"),
                'username' => $this->session->userdata('email')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New post added!</div>');
            redirect('admin/role');
        }
    }


    public function account()
    {
        $data['title'] = 'Account';
        $data['user'] = $this->db->get_where('account', ['username' => $this->session->userdata('email')])->row_array();

        //$data['account'] = $this->db->get_where('account', ['id' => $role_id])->row_array();
        $data['account'] = $this->db->get('account')->result_array();
        // $this->db->where('id !=', 1);
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/account', $data);
        $this->load->view('templates/footer');
    }


    // public function changeAccess()
    // {
    //     $menu_id = $this->input->post('menuId');
    //     $role_id = $this->input->post('roleId');

    //     $data = [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ];

    //     $result = $this->db->get_where('user_access_menu', $data);

    //     if ($result->num_rows() < 1) {
    //         $this->db->insert('user_access_menu', $data);
    //     } else {
    //         $this->db->delete('user_access_menu', $data);
    //     }

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    // }
}
