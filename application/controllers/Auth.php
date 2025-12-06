<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if($this->session->userdata('email')) {
            if($this->session->userdata('id_role') == 1) {
                redirect('admin');
            } else {
                redirect('siswa');
            }
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    
    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if($user) {
            // Cek jika user aktif
            if($user['is_active'] == 1) {
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                        'name' => $user['name']
                    ];
                    $this->session->set_userdata($data);
                    
                    if($user['id_role'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('siswa');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        // Jika sudah login, redirect
        if($this->session->userdata('email')) {
            redirect('admin');
        }
        
        $data['title'] = 'Registration';
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1, // Aktif langsung untuk testing
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account created successfully. Please login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        // Hapus semua session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('name');
        
        // Atau gunakan sess_destroy() untuk lebih bersih
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked';
        
        $this->load->view('templates/auth_header', $data); 
        $this->load->view('auth/blocked'); 
        $this->load->view('templates/auth_footer'); 
    }
    
    // Method untuk testing
    public function test_session() {
        echo "Session Data:<br>";
        echo "<pre>";
        print_r($this->session->userdata());
        echo "</pre>";
        echo '<br><a href="' . base_url('auth/logout') . '">Logout</a>';
    }
}