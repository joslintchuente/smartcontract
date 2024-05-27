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
                        <h4 class="page-title">Creer un nouveau Contrat</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form name="form" action="" method="post">

                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="mb-3">
                                            <label for="projectname" class="form-label">Nom du contrat</label>
                                            <input type="text" id="projectname" class="form-control" placeholder="Nom du Contrat">
                                        </div>

                                        <div class="mb-3">
                                            <label for="project-priority" class="form-label">Type de contat </label>

                                            <select class="form-control" name="type_contrat" id="type_contrat" data-toggle="select2" data-width="100%">
                                                <option value=""></option>
                                                <option value="type_contrat_a">type_contrat_a</option>
                                                <option value="type_contrat_b">type_contrat_b</option>
                                                <option value="type_contrat_c">type_contrat_c</option>
                                                <option value="type_contrat_d">type_contrat_d</option>
                                                <option value="type_contrat_e">type_contrat_e</option>
                                            </select>
                                        </div>



                                        <div class="mb-3">
                                            <label for="project-overview" class="form-label">Extrait du Projet</label>
                                            <textarea class="form-control" id="project-overview" rows="5" placeholder="description du contrat"></textarea>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <!-- Date View -->
                                                <div class="mb-3">
                                                    <label class="form-label">Date de fin</label>
                                                    <input type="date" class="form-control" data-toggle="flatpicker" placeholder="March 9, 2020">
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
                                            <label for="selection des membres" class="form-label">Membres</label>

                                            <select class="form-select" data-toggle="select2" data-width="100%" multiple aria-label="multiple select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>

                                            <div class="mt-2" id="tooltips-container">
                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>public/assets/images/users/user-6.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>public/assets/images/users/user-7.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Michael Zenaty">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>public/assets/images/users/user-8.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="James Anderson">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>public/assets/images/users/user-4.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Lorene Block">
                                                </a>

                                                <a href="javascript:void(0);" class="d-inline-block">
                                                    <img src="<?= URL_ROOT; ?>public/assets/images/users/user-5.jpg" class="rounded-circle avatar-xs" alt="friend" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Mike Baker">
                                                </a>
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <label for="project-budget" class="form-label">Observations</label>
                                            <input type="text" id="project-budget" class="form-control" placeholder="Observations">
                                        </div>

                                    </div> <!-- end col-->

                                    <div class="col-xl-8">

                                        <div class="container" id="container">

                                        </div>

                                        <div class="mb-3 py-3 col-xl-6 ml-3" id="model_selected" style=" border: 5px, groove rgba(0,0,0,0.575);">


                                        </div>



                                    </div> <!-- end col-->
                                </div>
                                <!-- end row -->


                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <button onclick="click()" type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i><a href="<?= URL_ROOT; ?>/initiateurs/creerContrat">Creér</a> </button>
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