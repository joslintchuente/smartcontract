<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Details des Contrats</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Details des Contrats</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php foreach ($data['contrats'] as $contrat) : ?>
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="dripicons-dots-3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Editer</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Efacer</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Ajouter </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Retirer</a>
                                    </div>
                                </div>
                                <!-- project title-->
                                <h3 class="mt-0 font-20">
                                    <?= $contrat->DESIGNATION; ?>
                                </h3>
                                <div class="text-white mb-3 btn btn-primary">
                                    <a href="">
                                        <h6>Voir le Contrat</h6>
                                    </a>
                                </div>

                                <h5 class="alert alert-success">description du contat : <?= $contrat->NUM_CONTRAT; ?></h5>
                                <p class="text-muted mb-4">
                                    <?= $contrat->OBSERVATIONS; ?>
                                </p>



                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Date de Debut </h5>
                                            <p><?= $contrat->CREATION_DATE; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>Date de Fin</h5>
                                            <p> <?= $contrat->UPDATION_DATE; ?></p>
                                        </div>
                                    </div>

                                </div>



                            </div> <!-- end card-body-->

                        </div> <!-- end card-->


                        <!-- end card-->
                    </div> <!-- end col -->

                    <div class="col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Progress</h5>
                                <div class="mt-3 chartjs-chart" style="height: 320px;">
                                    <canvas id="line-chart-example"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; UBold theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>