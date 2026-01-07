<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
        if($this->session->userdata('id_role') != 1) {
            redirect('user/blocked');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->db->select('um.*, uam.can_view, uam.can_create, uam.can_edit, uam.can_delete');
        $this->db->from('user_menu um');
        $this->db->join('user_access_menu uam', 'um.id_menu = uam.id_menu');
        $this->db->where('uam.id_role', 1); 
        $this->db->where('um.is_active', 1);
        $this->db->order_by('um.menu_order', 'ASC');
        $data['menu'] = $this->db->get()->result_array();
        
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->where('id_menu', 3); // Hanya submenu dari "Menu"
        $this->db->where('is_active', 1);
        $data['submenu_menu'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function users()
    {
        $data['title'] = 'User Management';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->db->select('u.*, ur.role as role_name');
        $this->db->from('user u');
        $this->db->join('user_role ur', 'u.id_role = ur.id_role', 'left');
        $this->db->order_by('u.date_created', 'DESC');
        $data['users'] = $this->db->get()->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role Management';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['roles'] = $this->db->get('user_role')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($id_role)
    {
        $data['title'] = 'Role Access';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id_role' => $id_role])->row_array();
        
        $this->db->where('is_active', 1);
        $this->db->order_by('menu_order', 'ASC');
        $data['menus'] = $this->db->get('user_menu')->result_array();

        $this->db->select('id_menu');
        $this->db->where('id_role', $id_role);
        $access_result = $this->db->get('user_access_menu')->result_array();
        
        $data['accessed_menus'] = array_column($access_result, 'id_menu');

        $this->load->view('templates/header', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess() 
    {
        $id_menu = $this->input->post('Idmenu');
        $id_role = $this->input->post('Idrole');

        $this->db->where('id_role', $id_role);
        $this->db->where('id_menu', $id_menu);
        $result = $this->db->get('user_access_menu');

        if ($result->num_rows() < 1) {
            $data = [
                'id_role' => $id_role,
                'id_menu' => $id_menu,
                'can_view' => 1,
                'can_create' => ($id_role == 1) ? 1 : 0, 
                'can_edit' => 1,
                'can_delete' => ($id_role == 1) ? 1 : 0  
            ];
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->where('id_role', $id_role);
            $this->db->where('id_menu', $id_menu);
            $this->db->delete('user_access_menu');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_userdata('name', $name);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>'); 
            redirect('admin/profile'); 
        }
    }

    public function edit()
{
    // Redirect ke edit_profile
    redirect('admin/edit_profile');
}

public function changepassword()
{
    $data['title'] = 'Change Password';
    $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[repeat_password]');
    $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|matches[new_password]');
    
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('admin/changepassword', $data); // Pastikan view-nya ada
        $this->load->view('templates/footer');
    } else {
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $email = $this->session->userdata('email');
        
        // Cek password lama
        $admin = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if (password_verify($current_password, $admin['password'])) {
            // Password lama benar, update password baru
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $this->db->set('password', $password_hash);
            $this->db->where('email', $email);
            $this->db->update('user');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
        }
        
        redirect('admin/changepassword');
    }
}
}