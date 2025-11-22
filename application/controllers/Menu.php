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
class Menu extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        
        $data ['admin'] = $this->db->get_where('user', ['email' => 
            $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if($this->form_validation->run() == false ){
            $this->load->view('templates/header', $data);  
            $this->load->view('menu/index', $data);       
            $this->load->view('templates/footer');    
        }
            
    }

}