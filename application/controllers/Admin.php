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
class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database(); 
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        
        $data ['admin'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])->row_array();
            
        $this->load->view('templates/header', $data);  
        $this->load->view('admin/index', $data);       
        $this->load->view('templates/footer');       
    }
    
}
