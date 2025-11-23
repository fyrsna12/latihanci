<?php
function is_logged_in()
{
    $ci =& get_instance();

    if(!$ci->session->userdata('email')) {
        redirect('user');
    } 
 
    $id_role = $ci->session->userdata('id_role');
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
 
    if(!$queryMenu) {
        return; 
    }
    
    $id_menu = $queryMenu['id_menu'];

    $userAccess = $ci->db->get_where('user_access_menu', [
        'id_role' => $id_role, 
        'id_menu' => $id_menu
    ]);

    if($userAccess->num_rows() < 1) {
        redirect('auth/blocked');
    }
}