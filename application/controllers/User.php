<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function register()
    {
        $data['title'] = 'Register';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');
    }

    public function registration()
    {
        // Set rules validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form register lagi
            $this->register();
        } else {
            // Jika validasi sukses
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'user.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1,
                'date_created' => time()
            );

            $this->db->insert('user', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created!</div>');
            redirect('user');
        }
    }
}