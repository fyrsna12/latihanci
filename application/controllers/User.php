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
        // FIX: Tambahkan helper dan library penting yang hilang
        $this->load->helper('url');     // Untuk fungsi redirect()
        $this->load->database();    // Untuk fungsi $this->db->insert()
    }

    public function index()
    {
        $data['title'] = 'Login';
        // FIX: Kirim data $title ke view
        $this->load->view('templates/auth_header', $data); 
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function register()
    {
        $data['title'] = 'Register';
        // FIX: Kirim data $title ke view
        $this->load->view('templates/auth_header', $data); 
        $this->load->view('auth/register');
        $this->load->view('templates/auth_footer');
    }

    public function registration()
    {
        // Set rules validation
        // Catatan: Pastikan field di HTML kamu 'password1' dan 'password2'
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
            // Jika validasi gagal, panggil register (akan me-load view dengan error validation)
            $this->register();
        } else {
            // Jika validasi sukses
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', true)), // FIX: Lebih aman
                'email' => htmlspecialchars($this->input->post('email', true)), // FIX: Lebih aman
                'image' => 'user.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'is_active' => 1,
                'date_created' => time()
            );

            // Perhatian: Jika masih gagal insert, cek database.php dan status MySQL/MariaDB kamu.
            $this->db->insert('user', $data); 
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created!</div>');
            redirect('user'); // Akan redirect ke halaman login (user/index)
        }
    }
}