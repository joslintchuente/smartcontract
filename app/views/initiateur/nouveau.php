<?php

require_once APP_ROOT . '/views/includes/headerinitiateur.php';
?>
<?php
require_once APP_ROOT . '/views/includes/navbarinitiateur.php';
?>
<?php
require_once APP_ROOT . '/views/includes/sidebarinitiateur.php';
?>
<?php
//require_once APP_ROOT . '/views/initiateur/creernouveaucontract.php';
?>
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

                                <li class="breadcrumb-item active">Commencez a creer un Contrat</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Creer un nouveau Contrat</h4><br>
                        <?php if (isset($data['success_message'])) : ?>
                            <b class="alert alert-success"><?= $data['success_message']; ?></b>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form name="form" action="<?= URL_ROOT; ?>/initiateurs/creerContrat" method="POST">

                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="projectname" class="form-label">Nom du contrat</label>
                                            <input type="text" name="contractname" id="projectname" class="form-control" placeholder="Nom du Contrat">
                                        </div>

                                        <div class="mb-3">
                                            <label for="type_contrat" class="form-label">Type de contat </label>

                                            <select class="form-control" name="type_contrat" id="type_contrat" data-toggle="select2" data-width="100%">
                                                <option value=""></option>
                                                <?php foreach ($data['models'] as $model) : ?>
                                                    <option value="<?= $model->NOM_MODEL; ?>"><?= $model->NOM_MODEL; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label for="project-overview" class="form-label">Extrait du Projet</label>
                                            <textarea class="form-control" name="description" id="project-overview" rows="5" placeholder="description du contrat"></textarea>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <!-- Date View -->
                                                <div class="mb-3">
                                                    <label for="delai" class="form-label">Delai </label>

                                                    <select name="delai" class="form-control" data-toggle="select2" data-width="100%">
                                                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="project-priority" class="form-label">Odre de Priorite </label>

                                            <select class="form-control" data-toggle="select2" data-width="100%">
                                                <option value="MD">Moyen</option>
                                                <option value="HI">Elevé</option>
                                                <option value="LW">Faible</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="membres" class="form-label">Membres </label>

                                            <select name="membres" class="form-control" data-toggle="select2" data-width="100%">
                                                <option value=""> </option>
                                                <?php foreach ($data['redacteurs'] as $model) : ?>
                                                    <option value="<?= $model->NOM_COMPLET; ?>"><?= $model->NOM_COMPLET; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <div class="mt-2" id="tooltips-container">
                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>/public/assets/images/users/user-6.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>/public/assets/images/users/user-7.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>/public/assets/images/users/user-8.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>/public/assets/images/users/user-4.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Lorene Block">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>/public/assets/images/users/user-5.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mike Baker">
                                                </a>
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <label for="project-budget" class="form-label">Observations</label>
                                            <input name="observations" type="text" id="project-budget" class="form-control" placeholder="Observations">
                                        </div>

                                    </div> <!-- end col-->

                                    <div class="col-xl-8">

                                        <div class="container" id="container">

                                        </div>
                                        <input type="hidden" name="contractsource" value="" id="hidden_selected_model">
                                        <div class="mb-3 py-3 col-xl-12 ml-3" id="model_selected" style=" border: 5px, groove rgba(0,0,0,0.575);">

                                        </div>
                                    </div> <!-- end col-->
                                </div>
                                <!-- end row -->


                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button name="savecontract" type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i>Creér </button>
                                        <button type="reset" class="btn btn-light waves-effect waves-light m-1"><i class="fe-x me-1"></i>Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>

            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
</div>

<!-- Vendor js -->
<script src="<?= URL_ROOT; ?>/public/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?= URL_ROOT; ?>/public/assets/js/app.min.js"></script>

</body>

</html>