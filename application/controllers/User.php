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
    if ($this->session->userdata('email')) {
        redirect('siswa');
    }

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    $data['title'] = 'Login';
    $this->load->view('templates/auth_header', $data); 
    $this->load->view('auth/login');
    $this->load->view('templates/auth_footer');
}

public function register()
{
    if ($this->session->userdata('email')) {
        redirect('siswa');
    }

    $data['title'] = 'Register';
    $this->load->view('templates/auth_header', $data); 
    $this->load->view('auth/register');
    $this->load->view('templates/auth_footer');
}

public function registration()
{
    if ($this->session->userdata('email')) {
        redirect('siswa');
    }
    
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
        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)), 
            'email' => htmlspecialchars($email), 
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'id_role' => 2,
            'is_active' => 0,
            'date_created' => time()
        ];

        // Token
        $token = bin2hex(random_bytes(16));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('user', $data); 
        $this->db->insert('user_token', $user_token); 

        $subject = 'Account Verification';
        $message = 'Click this link to verify your account: 
        <a href="'. base_url() . 'user/verify?email=' . urlencode($email) . 
        '&token=' . urlencode($token) . '">ACTIVATE ACCOUNT</a>';
        
        $this->_sendEmail($email, $subject, $message, 'verify');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created! Please activate your account.</div>');
        redirect('user'); 
    }
}

public function _sendEmail($to, $subject, $message, $type)
{
    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'citest411@gmail.com',
        'smtp_pass' => 'qgdktqniazvnrstl', 
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];

    $this->load->library('email', $config); 
    $this->email->from('citest411@gmail.com', 'Latihanci Admin');
    $this->email->to($to); 
    $this->email->subject($subject); 
    $this->email->message($message);

    if($this->email->send()) {
        return true;
    } else {
        echo $this->email->print_debugger();
        die;
    }
}

public function verify() 
{
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $email = urldecode($email);
    $token = urldecode($token);

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user) {
        $user_token = $this->db->get_where('user_token', [
            'email' => $email,
            'token' => $token
        ])->row_array();

        if($user_token) {
            $this->db->set('is_active', 1);
            $this->db->where('email', $email);
            $this->db->update('user');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> '. $email .' Account activation successful! Please login.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-triangle"></i> Account activation failed! Invalid token.</div>');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i> Account activation failed! Wrong email.</div>');
    }
    
    redirect('user');
}
public function login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user){
        if($user['is_active'] == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Your account is not activated yet. Please contact administrator.</div>');
            redirect('user');
        }
        
        if(password_verify($password,$user['password'])){
            $data=[
                'id_user'=>$user['id_user'],
                'name'=>$user['name'],
                'email'=>$user['email'],
                'id_role'=>$user['id_role'],
            ];
            $this->session->set_userdata($data);
         
            if($user['id_role'] ==1 ){
                redirect('admin');
            } else {
                redirect('siswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
            redirect('user');
        } 
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not registered</div>');
        redirect('user');
    }
    }	
    
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have been logged out</div>');
        redirect('user');
    }

    
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}