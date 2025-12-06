
<?php $role = $this->session->userdata('id_role'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Logo -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
        <div class="sidebar-brand-text mx-3">CI ADMIN</div>
    </a>
    
    <hr class="sidebar-divider">
    
    <!-- Menu Admin -->
    <?php if ($role == 1): ?>
    <div class="sidebar-heading">ADMIN</div>
    <li class="nav-item <?= (isset($title) && $title == 'Dashboard Admin') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">USER MANAGEMENT</div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/users'); ?>">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/role'); ?>">
            <i class="fas fa-user-tag"></i>
            <span>Roles</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <?php endif; ?>
    
    <!-- Menu Profile -->
    <div class="sidebar-heading">PROFILE</div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa'); ?>">
            <i class="fas fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>
    
    <?php if ($role == 2): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/edit'); ?>">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('siswa/changepassword'); ?>">
            <i class="fas fa-key"></i>
            <span>Change Password</span>
        </a>
    </li>
    <?php endif; ?>
    
    <hr class="sidebar-divider">
    
    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    
</ul>