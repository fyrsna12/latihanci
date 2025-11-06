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
    public function index()
	{
		$data['title'] = 'My Profile';
		$data ['admin'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		$this->load->view('admin/index', $data);
	}
}