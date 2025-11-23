<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function blocked()
    {
        $data['title'] = 'Access Blocked';
        
        $this->load->view('templates/auth_header', $data); 
        $this->load->view('auth/blocked'); 
        $this->load->view('templates/auth_footer'); 
    }
}