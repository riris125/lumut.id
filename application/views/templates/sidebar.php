        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Beranda</span></a>
            </li>


            <!-- QUERY MENU -->
            <?php
            $role = $this->session->userdata('role');
            $queryMenu = "SELECT *  
                            FROM `account` 
                           WHERE `role` = '$role'
                       
                        ";
            $menu = $this->db->query($queryMenu)->result_array();

            foreach ($menu as $data) {

                if ($data['role'] == 'admin') { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/role'); ?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Post</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/account'); ?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Akun</span></a>
                    </li>


            <?php  }
            }
            ?>


            <!-- LOOPING MENU -->

            <div class="sidebar-heading">

            </div>

            <!-- SIAPKAN SUB-MENU SESUAI MENU -->

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End  of Sidebar -->