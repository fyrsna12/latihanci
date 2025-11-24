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
     <?php
     $menuId = $m['id_menu'];
     $querySubMenu = "SELECT *
    FROM `user_sub_menu` 
    JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`
    WHERE `user_sub_menu`.`menu_id` = $menuId
    AND `user_sub_menu`.`is_active` = 1
    ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
     ?>

     <?php foreach($subMenu as $sm) : ?>
     <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif ; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span></a>
         </li>

     <?php endforeach; ?>

      <hr class="sidebar-divider mt-3">

    <?php endforeach; ?>
    
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