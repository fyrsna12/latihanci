<?php
$role_id = $this->session->userdata('id_role');
$query = $this->db->query("
    SELECT m.*, am.can_create, am.can_edit, am.can_delete
    FROM user_menu m
    JOIN user_access_menu am ON m.id_menu = am.id_menu
    WHERE am.id_role = $role_id AND am.can_view = 1
    ORDER BY m.sequence
");
$menu_items = $query->result_array();
?>

<aside class="sidebar">
    <div class="sidebar-header">
        <h4>CL ADMIN</h4>
        <p class="text-muted small"><?= $this->session->userdata('name'); ?> (Siswa)</p>
    </div>
    
    <ul class="sidebar-menu">
        <?php foreach ($menu_items as $item): ?>
            <?php if ($item['menu'] == 'Dashboard'): ?>
                <li>
                    <a href="<?= base_url('siswa') ?>">
                        <i class="fas fa-tachometer-alt"></i> <?= $item['menu']; ?>
                    </a>
                </li>
            <?php elseif ($item['menu'] == 'My Profile'): ?>
                <li class="menu-title"><?= $item['menu']; ?></li>
                <li>
                    <a href="<?= base_url('siswa') ?>">
                        <i class="fas fa-user"></i> My Profile
                    </a>
                </li>
            <?php elseif ($item['menu'] == 'Edit Profile'): ?>
                <li>
                    <a href="<?= base_url('siswa/edit') ?>">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </li>
            <?php elseif ($item['menu'] == 'Change Password'): ?>
                <li>
                    <a href="<?= base_url('siswa/changepassword') ?>">
                        <i class="fas fa-key"></i> Change Password
                    </a>
                </li>
            <?php elseif ($item['menu'] == 'Logout'): ?>
                <li class="menu-title">SETTINGS</li>
                <li class="menu-title">PROFILE</li>
                <li>
                    <a href="<?= base_url('siswa') ?>">
                        <i class="fas fa-user"></i> My Profile
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/edit') ?>">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user/logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</aside>