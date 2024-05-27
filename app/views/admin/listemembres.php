<?php
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
    header('location: ' . URL_ROOT . '/admins/login');
}
?>
<?php
require_once APP_ROOT . '/views/includes/headeradmin.php';
require_once APP_ROOT . '/views/includes/navbar.php';
require_once APP_ROOT . '/views/includes/sidebaradmin.php';
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

                                <li class="breadcrumb-item active">Liste des Membres </li>
                            </ol>

                        </div>
                        <h4 class="page-title">Liste des Membres</h4>
                        <b class="alert alert success text-center">
                            <?php if (isset($data['result'])) : ?>
                                <?php
                                foreach ($data['result'] as $msg) {
                                ?>

                                    <?php if (!empty($msg)) : ?>
                                        <?php
                                        $info['message'] = $msg;
                                        ?>
                                        <b class="alert alert-info"><?= $info['message']; ?></b> <br> <br>
                                    <?php endif; ?>
                                <?php
                                }
                                ?>
                            <?php endif; ?>
                        </b>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Ajouter un Membre</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>
                                        <tr>
                                            <th>Nom des Membres</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Date Enregistrer</th>
                                            <th>Fonction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Recuperation des membres dans toute la bd -->
                                        <?php if (!empty($data['listeredacteur'])) : ?>
                                            <?php foreach ($data['listeredacteur'] as $member) : ?>
                                                <?php if (!empty($member)) : ?>
                                                    <tr>
                                                        <td class="table-user">
                                                            <img src="../assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?= $member->NOM_COMPLET; ?></a>
                                                        </td>
                                                        <td>
                                                            <?= $member->EMAIL; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->TELEPHONE; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->CREATIONDATE; ?>
                                                        </td>
                                                        <td>
                                                            Redacteurs
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if (!empty($data['listeinitiateur'])) : ?>
                                            <?php foreach ($data['listeinitiateur'] as $member) : ?>
                                                <?php if (!empty($member)) : ?>
                                                    <tr>
                                                        <td class="table-user">
                                                            <img src="../assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?= $member->NOM_COMPLET; ?></a>
                                                        </td>
                                                        <td>
                                                            <?= $member->EMAIL; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->TELEPHONE; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->CREATIONDATE; ?>
                                                        </td>
                                                        <td>
                                                            Initiateur
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if (!empty($data['listeapprobateur'])) : ?>
                                            <?php foreach ($data['listeapprobateur'] as $member) : ?>
                                                <?php if (!empty($member)) : ?>
                                                    <tr>
                                                        <td class="table-user">
                                                            <img src="../assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?= $member->NOM_COMPLET; ?></a>
                                                        </td>
                                                        <td>
                                                            <?= $member->EMAIL; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->TELEPHONE; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->CREATIONDATE; ?>
                                                        </td>
                                                        <td>
                                                            Approbateur
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php if (!empty($data['listesignataire'])) : ?>
                                            <?php foreach ($data['listesignataire'] as $member) : ?>
                                                <?php if (!empty($member)) : ?>
                                                    <tr>
                                                        <td class="table-user">
                                                            <img src="../assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?= $member->NOM_COMPLET; ?></a>
                                                        </td>
                                                        <td>
                                                            <?= $member->EMAIL; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->TELEPHONE; ?>
                                                        </td>
                                                        <td>
                                                            <?= $member->CREATIONDATE; ?>
                                                        </td>
                                                        <td>
                                                            Signataire
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>



                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
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

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Ajouter un Membre</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body p-4">

                <?php

                ?>
                <form action="<?= URL_ROOT; ?>/admins/createmember" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du Membre</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nom complet">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="name" placeholder="Email du membre">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Telephone</label>
                        <input type="text" name="phone" class="form-control" id="name" placeholder="Numero de telephone">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Rolde du Membres </label>

                        <select class="form-control" name="role" data-toggle="select2" data-width="100%" aria-placeholder="fonction du membre">
                            <option value="INITIATEUR">Initiateur</option>
                            <option value="REDACTEUR">Redacteur</option>
                            <option value="FOURNISSEUR">Fournisseur</option>
                            <option value="APPROBATEUR">Approbateur</option>
                            <option value="Signataire">Signataire</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Fonction du Membre</label>
                        <select class="form-control" name="fonction" id="fonction" data-toggle="select2" placeholder="fonction du membre">
                            <?php
                            $db = new Database();
                            $db->query("SELECT * FROM tblfonction");
                            $results = $db->resultSet();
                            foreach ($results as $result) {
                            ?>
                                <option value="<?= $result->LIBELLE_FONCTION; ?>"><?= $result->LIBELLE_FONCTION; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="savemember" class="btn btn-success waves-effect waves-light">Enregistrer</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Right Sidebar -->
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<?php
require_once APP_ROOT . '/views/includes/footeradmin.php';
?>