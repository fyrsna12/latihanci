<?php
function is_logged_in()
{
    $ci =& get_instance();

    $current_controller = $ci->uri->segment(1);

    if ($current_controller == 'user' || $current_controller == 'auth') {
        if ($ci->session->userdata('email') && $ci->uri->segment(2) == '') {
            redirect('siswa');
        }
        return;
    }
    
    if(!$ci->session->userdata('email')) {
        redirect('user');
    }
    
    // Kalau mau cek menu access, baru uncomment bagian bawah
}

function check_access($id_role, $id_menu)
{
    $ci = get_instance();

    $ci->db->where('id_role', $id_role);
    $ci->db->where('id_menu', $id_menu);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0){
        return "checked='checked'";
    }
}