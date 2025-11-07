<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ci Admin </div>
    </a>

    <hr class="sidebar-divider">

    <!-- QUERY MENU  -->
     <?php 
     $id_role = $this->session->userdata('id_role');
     $querymenu = "SELECT `user_menu`.`id_menu`, `menu`
                    FROM `user_menu` 
                    JOIN `user_access_menu` ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                    WHERE `user_access_menu`.`id_role` = $id_role
                    ORDER BY `user_access_menu`.`id_menu` ASC
                    ";
    $menu = $this->db->query($querymenu)->result_array();
     ?>

    <!-- LOOPING MENU -->
     <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
        <?= $m['menu']; ?>
    </div>

    <!-- SUB-MENU SESUAI MENU -->
     

    <?php endforeach; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profile'); ?>">
            <i class="fas fa-users fa-fw"></i>
            <span>Dashboard</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/logout'); ?>">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            <span>Logout</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>