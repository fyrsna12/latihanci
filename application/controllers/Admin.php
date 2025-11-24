<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

        public function role()
    {
        $data['title'] = 'Role';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

        public function roleAccess($id_role)
    {
        $data['title'] = 'Role Access';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //  data role yg lagi di akses
        $data['role'] = $this->db->get_where('user_role', ['id_role' => $id_role])->row_array();
        
        $this->db->where([ 'id_menu !=' => 1, ]);
        // Ambil semua menu
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess() 
    {
        $id_menu = $this->input->post('Idmenu');
        $id_role = $this->input->post('Idrole');

        $data = [
            'id_role' => $id_role,
            'id_menu' => $id_menu
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

}