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
     $querymenu = "SELECT column-names
                    FROM table-name1 
                    JOIN table-name2 ON column-name1 = column-name2
                    WHERE condition";
     ?>

    <div class="sidebar-heading">
        Administrator
    </div>

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
            <span>My Profile</span></a>
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