<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }


public function edit()
{
    $data['title'] = 'Edit Profile';
    $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('name', 'Full name', 'required|trim');

    if($this->form_validation->run() == false)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/edit', $data);
        $this->load->view('templates/footer');
    } else {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //cek kalau ada gambar yg di upload
        $upload_image = $_FILES['image']['name'];

        if($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

if ($this->upload->do_upload('image')) {
    $old_image = $data['admin']['image'];
 
    $protected_images = ['default.jpg', 'user.jpg', 'admin.jpg'];
    
    if (!in_array($old_image, $protected_images) && file_exists(FCPATH . 'assets/img/profile/' . $old_image)) {
        unlink(FCPATH . 'assets/img/profile/' . $old_image);
    }
    
    $new_image = $this->upload->data('file_name');
    $this->db->set('image', $new_image);
} else {
            echo $this->upload->display_errors();
        }
    } 

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_userdata('name', $name);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>'); 
        redirect('siswa'); 
    }
}

public function changepassword()  
{
    $data['title'] = 'Change Password';
    $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

    if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/changepassword', $data);
        $this->load->view('templates/footer');
    } else {
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        
        if (!password_verify($current_password, $data['admin']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>'); 
            redirect('siswa/changepassword');
        } else {
            if($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current!</div>'); 
                redirect('siswa/changepassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user'); 

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>'); 
                redirect('siswa/changepassword');
            }
        }
    }
}
}