<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); // Helper Check
        
        // Block non-admin users (Only Admin can assess for now, or Teachers if role 3 exists, assuming Role 1 is Admin)
        if($this->session->userdata('id_role') != 1) { 
            redirect('user/blocked');
        }
    }

    public function index()
    {
        $data['title'] = 'Penilaian Akademik';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // Get all students (Role 2)
        $this->db->where('id_role', 2);
        $this->db->order_by('class_name', 'ASC');
        $this->db->order_by('name', 'ASC');
        $data['students'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('assessment/index', $data);
        $this->load->view('templates/footer');
    }

    public function input($user_id)
    {
        $data['title'] = 'Input Penilaian';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['student'] = $this->db->get_where('user', ['id_user' => $user_id])->row_array();
        
        if(!$data['student']) {
            redirect('assessment');
        }

        $this->form_validation->set_rules('period', 'Period', 'required|trim');
        $this->form_validation->set_rules('aspect', 'Aspect', 'required|trim');
        $this->form_validation->set_rules('predicate', 'Predicate', 'required|trim');

        if($this->form_validation->run() == false) {
             $this->load->view('templates/header', $data);
             $this->load->view('assessment/input', $data);
             $this->load->view('templates/footer');
        } else {
            $input_data = [
                'user_id' => $user_id,
                'period' => $this->input->post('period'),
                'aspect' => $this->input->post('aspect'),
                'predicate' => $this->input->post('predicate')
            ];

            $this->db->insert('assessments', $input_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Assessment has been added!</div>');
            redirect('assessment/input/' . $user_id);
        }
    }
    
    // Helper functionality to get previous assessments could be added here
}
