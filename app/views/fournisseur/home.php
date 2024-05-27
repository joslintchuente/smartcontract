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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Dashboard </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        <?php //var_dump($data); 
                        ?>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">Contrats</h4>

                            <div id="cardCollpase4" class="collapse pt-3 show">
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap table-borderless mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>NUM du Contrat</th>
                                                <th>Nom du Contrat</th>
                                                <th>Type de contrats</th>
                                                <th>Date de debut</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) : ?>
                                                <?php if (!empty($data['contrats'])) : ?>
                                                    <?php foreach ($data['contrats'] as $contrats) : ?>
                                                        <tr>
                                                            <td><?= $contrats->NUM_CONTRAT;  ?> </td>
                                                            <td><?= $contrats->DESIGNATION;  ?></td>
                                                            <td><?= $contrats->ID_TYPE_CONTRAT;  ?></td>
                                                            <td><?= $contrats->CREATION_DATE;  ?></td>
                                                            <td><span class="badge bg-soft-info text-info p-1">
                                                                    <?php
                                                                    if (isset($data['valide']) && !empty($data['valide'])) {
                                                                    ?>
                                                                        <?php if ($data['valie'] == 'valide') : ?>
                                                                            <b class="alert-success"><?= $data['valide']; ?></b>
                                                                        <?php endif; ?>
                                                                        <b class="alert-info"><?= $data['valide'];  ?></b>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </span></td>
                                                            <td>
                                                                <form method="post" action="<?= URL_ROOT; ?>/fournisseurs/getContrats">
                                                                    <input type="hidden" name="idcontrat" value="<?= $contrats->ID_CONTRAT; ?>">
                                                                    <button type="submit" name="seecontractfournisseur" class="btn btn-primary">Voir le contrat</button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div> <!-- .table-responsive -->
                            </div> <!-- end collapse-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
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
                    </script> &copy; SMART CONTRACT MANAGEMENT <i>Developped BY </i><a href="">SMART DEV TEAM</a>
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