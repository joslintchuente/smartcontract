<div class="left-side-menu">

    <div class="h-100">

        <div class="sidebar-content">
            <div class="sidebar-icon-menu h-100" data-simplebar>
                <!-- LOGO -->
                <a href="index.html" class="logo">
                    <span>
                        <img src="../assets/images/logo-sm-light.png" alt="" height="28">
                    </span>
                </a>
                <nav class="nav flex-column" id="two-col-sidenav-main">
                    <a class="nav-link" href="#dashboard" title="Dashboard">
                        <i data-feather="home"></i>
                    </a>
                    <a class="nav-link" href="#apps" title="Contrats">
                        <i data-feather="grid"></i>
                    </a>
                </nav>
            </div>
            <!--- Sidemenu -->
            <div class="sidebar-main-menu">
                <div id="two-col-menu" class="h-100" data-simplebar>
                    <div class="twocolumn-menu-item d-block" id="dashboard">
                        <div class="title-box">
                            <h5 class="menu-title">Dashboard</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= URL_ROOT; ?>/initiateurs/dashboard">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="twocolumn-menu-item" id="apps">
                        <h5 class="menu-title">Contrats</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#sidebarProjects" data-bs-toggle="collapse" class="nav-link">
                                    <span> Contrats </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarProjects">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="<?= URL_ROOT; ?>/initiateurs/detailcontrats">Detail Des Contrats</a>
                                        </li>
                                        <li>
                                            <a href="<?= URL_ROOT; ?>/initiateurs/nouveau">Nouveau Contrat</a>
                                        </li>
                                        <li>
                                            <a href="<?= URL_ROOT; ?>/initiateurs/detailfournisseurs">Consulter les Fournisseur</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- End Sidebar -->

    </div>
    <!-- Sidebar -left -->

</div>