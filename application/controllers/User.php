<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_DB_query_builder $db
 * @property CI_URI $uri
 * @property CI_Lang $lang
 */
class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');     
        $this->load->database();    
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
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password don\'t match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', true)), 
                'email' => htmlspecialchars($this->input->post('email', true)), 
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