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
                    <a class="nav-link" href="#apps" title="Apps">
                        <i data-feather="grid"></i>
                    </a>

                </nav>
            </div>
            <!--- Sidemenu -->
            <div class="sidebar-main-menu">
                <div id="two-col-menu" class="h-100" data-simplebar>
                    <div class="twocolumn-menu-item d-block" id="dashboard">
                        <div class="title-box">
                            <h5 class="menu-title">Dashboards</h5>
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?= URL_ROOT; ?>/admins/dashboard">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="twocolumn-menu-item" id="apps">
                        <h5 class="menu-title">Catalogue</h5>
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a href="#sidebarProjects" data-bs-toggle="collapse" class="nav-link">
                                    <span> Contrats </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarProjects">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="<?= URL_ROOT; ?>/admins/listecontrats">Liste des Contrats</a>
                                        </li>
                                        <li>
                                            <a href="<?= URL_ROOT; ?>/admins/detailcontrats">Details des Contrats</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTasks" data-bs-toggle="collapse" class="nav-link">
                                    <span> Membres </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTasks">
                                    <ul class="nav-second-level">

                                        <li>
                                            <a href="<?= URL_ROOT; ?>/admins/listemembres">Liste des Membres</a>
                                        </li>

                                        <li>
                                            <a href="task-details.html">Details des Membres </a>
                                        </li>


                                    </ul>
                                </div>
                            </li>


                        </ul>
                    </div>




                    <div class="twocolumn-menu-item" id="components">
                        <div class="title-box">
                            <h5 class="menu-title">Components</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#sidebarExtendedui" data-bs-toggle="collapse" class="nav-link">
                                        <span class="badge bg-info float-end">Hot</span>
                                        <span> Extended UI </span>
                                    </a>
                                    <div class="collapse" id="sidebarExtendedui">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="extended-nestable.html">Nestable List</a>
                                            </li>
                                            <li>
                                                <a href="extended-range-slider.html">Range Slider</a>
                                            </li>
                                            <li>
                                                <a href="extended-dragula.html">Dragula</a>
                                            </li>
                                            <li>
                                                <a href="extended-animation.html">Animation</a>
                                            </li>
                                            <li>
                                                <a href="extended-sweet-alert.html">Sweet Alert</a>
                                            </li>
                                            <li>
                                                <a href="extended-tour.html">Tour Page</a>
                                            </li>
                                            <li>
                                                <a href="extended-scrollspy.html">Scrollspy</a>
                                            </li>
                                            <li>
                                                <a href="extended-loading-buttons.html">Loading Buttons</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarIcons" data-bs-toggle="collapse" class="nav-link">
                                        <span> Icons </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarIcons">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="icons-two-tone.html">Two Tone Icons</a>
                                            </li>
                                            <li>
                                                <a href="icons-feather.html">Feather Icons</a>
                                            </li>
                                            <li>
                                                <a href="icons-mdi.html">Material Design Icons</a>
                                            </li>
                                            <li>
                                                <a href="icons-dripicons.html">Dripicons</a>
                                            </li>
                                            <li>
                                                <a href="icons-font-awesome.html">Font Awesome 5</a>
                                            </li>
                                            <li>
                                                <a href="icons-themify.html">Themify</a>
                                            </li>
                                            <li>
                                                <a href="icons-simple-line.html">Simple Line</a>
                                            </li>
                                            <li>
                                                <a href="icons-weather.html">Weather</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarForms" data-bs-toggle="collapse" class="nav-link">
                                        <span> Forms </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarForms">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="forms-elements.html">General Elements</a>
                                            </li>
                                            <li>
                                                <a href="forms-advanced.html">Advanced</a>
                                            </li>
                                            <li>
                                                <a href="forms-validation.html">Validation</a>
                                            </li>
                                            <li>
                                                <a href="forms-pickers.html">Pickers</a>
                                            </li>
                                            <li>
                                                <a href="forms-wizard.html">Wizard</a>
                                            </li>
                                            <li>
                                                <a href="forms-masks.html">Masks</a>
                                            </li>
                                            <li>
                                                <a href="forms-quilljs.html">Quilljs Editor</a>
                                            </li>
                                            <li>
                                                <a href="forms-file-uploads.html">File Uploads</a>
                                            </li>
                                            <li>
                                                <a href="forms-x-editable.html">X Editable</a>
                                            </li>
                                            <li>
                                                <a href="forms-image-crop.html">Image Crop</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarTables" data-bs-toggle="collapse" class="nav-link">
                                        <span> Tables </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarTables">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="tables-basic.html">Basic Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-datatables.html">Data Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-editable.html">Editable Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-responsive.html">Responsive Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-footables.html">FooTable</a>
                                            </li>
                                            <li>
                                                <a href="tables-bootstrap.html">Bootstrap Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-tablesaw.html">Tablesaw Tables</a>
                                            </li>
                                            <li>
                                                <a href="tables-jsgrid.html">JsGrid Tables</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarCharts" data-bs-toggle="collapse" class="nav-link">
                                        <span> Charts </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarCharts">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="charts-apex.html">Apex Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-flot.html">Flot Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-morris.html">Morris Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-chartjs.html">Chartjs Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-peity.html">Peity Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-chartist.html">Chartist Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-c3.html">C3 Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-sparklines.html">Sparklines Charts</a>
                                            </li>
                                            <li>
                                                <a href="charts-knob.html">Jquery Knob Charts</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarMaps" data-bs-toggle="collapse" class="nav-link">
                                        <span> Maps </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMaps">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="maps-google.html">Google Maps</a>
                                            </li>
                                            <li>
                                                <a href="maps-vector.html">Vector Maps</a>
                                            </li>
                                            <li>
                                                <a href="maps-mapael.html">Mapael Maps</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarMultilevel" data-bs-toggle="collapse" class="nav-link">
                                        <span> Multi Level </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMultilevel">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                                    Second Level <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarMultilevel2">
                                                    <ul class="nav-second-level">
                                                        <li>
                                                            <a href="javascript: void(0);">Item 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript: void(0);">Item 2</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                                    Third Level <span class="menu-arrow"></span>
                                                </a>
                                                <div class="collapse" id="sidebarMultilevel3">
                                                    <ul class="nav-second-level">
                                                        <li>
                                                            <a href="javascript: void(0);">Item 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                                Item 2 <span class="menu-arrow"></span>
                                                            </a>
                                                            <div class="collapse" id="sidebarMultilevel4">
                                                                <ul class="nav-second-level">
                                                                    <li>
                                                                        <a href="javascript: void(0);">Item 1</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript: void(0);">Item 2</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- End Sidebar -->

    </div>
    <!-- Sidebar -left -->

</div>