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
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div');
            redirect('menu');
        }
            
    }

    public function delete($id)
    {
    if (!$id) {
        redirect('menu');
    }
    $this->db->where('id_menu', $id);
    $this->db->delete('user_menu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu deleted!</div>');
    redirect('menu');
    }

    public function edit($id = null)
    {
    if ($id === null) {
        redirect('menu');
    }
    $menu_data = $this->db->get_where('user_menu', ['id_menu' => $id])->row_array();
    if (!$menu_data) {
        redirect('menu');
    }
    $data['title'] = 'Edit Menu';
    $data['menu'] = $menu_data; 
    //data admin/user yg login
    $data['admin'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array(); 
    $this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data); 
        $this->load->view('menu/edit', $data);       
        $this->load->view('templates/footer'); 
        
    } else {
    }
}

 public function submenu()
{
    $data['title'] = 'Submenu Management';
    $data['admin'] = $this->db->get_where('user', ['email' => 
    $this->session->userdata('email')])->row_array();

    $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();
    $data['allMenu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);  
    $this->load->view('menu/submenu', $data);       
    $this->load->view('templates/footer');  
}
}