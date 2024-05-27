<?php
// insertion d'un nouveau fournisseur 
$alerte = [];

if (isset($_POST["enregistrer"]) && !empty($_POST["nom"]) && !empty($_POST["telephone"]) && !empty($_POST["email"]) && !empty($_POST["pays"]) && !empty($_POST["ville"]) && !empty($_POST["adresse"]) && !empty($_POST["contrat"]) && !empty($_POST["password"])) {
    $initiateur =  $data['instance'];
    $user = $data['user'];
    $conts = $data['contrats']; // il faut un test

    foreach ($conts as $cont) {
        if (intval($_POST['contrat']) == intval($cont->ID_CONTRAT)) {
            if ($cont->NIVEAU == 2) {
                //creation du fournisseur
                $insertion = $initiateur->create_fournisseur($_POST["nom"], $_POST["telephone"], $_POST["email"], $_POST["adresse"], $_POST["pays"], $_POST["ville"], sha1($_POST["password"]));
                // integration de celui ci au contrat
                var_dump($insertion);
                if ($insertion) {
                    $id_fournisseur = $initiateur->get_idfournisseur($_POST["nom"]);
                    $integrate = $initiateur->integration_fournisseur($id_fournisseur, $cont->ID_CONTRAT);
                    if ($integrate) {
                        //echo ("<h3 class = 'alert alert-success'>reussite d'integration</h3>");
                    } else {
                        //echo ("echec d'integration");
                    }
                } else {
                    //echo ("erreur d'insertion du fournisseur!!");
                }
            } else {
                //echo ("<h3 class = 'alert alert-danger'>l'integration de ce fournisseur est impossible pour le moment !! </h3>");
            }
        } else {
            // echo ("<h3 class = 'btn btn-primary-danger'>erreur de correspondance de contrats</h3>");
        }
    }





    // correction 






    $alerte["erreur"] = "champs recenses !!";
} else {
    $alerte["erreur"] = "echec d'ajout veuillez recenser tous les champs !!";
}


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

                                <li class="breadcrumb-item active">Liste des Fournisseurs </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Liste des Fournisseurs</h4>
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
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Ajouter un Fournisseur</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Nom complet</th>
                                            <th>Numéro</th>
                                            <th>Email</th>
                                            <th>Adresse</th>
                                            <th>Pays</th>
                                            <th>Ville</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['liste_fournisseur'])) : ?>
                                            <?php foreach ($data['liste_fournisseur'] as $four) : ?>
                                                <?php if (!empty($four[0])) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <!--<img src="../assets/images/users/user-4.jpg" alt="table-user" class="me-2 rounded-circle">-->
                                                            <a href="javascript:void(0);" class="text-body fw-semibold"><?= $four[0]->NOM_COMPLET;  ?></a>
                                                        </td>
                                                        <td>
                                                            <?= $four[0]->TELEPHONE;  ?>
                                                        </td>
                                                        <td>
                                                            <?= $four[0]->EMAIL;  ?>
                                                        </td>
                                                        <td>
                                                            <?= $four[0]->ADRESSE;  ?>
                                                        </td>
                                                        <td>
                                                            <?= $four[0]->PAYS;  ?>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-soft-success text-success"><?= $four[0]->VILLE;  ?></span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>

                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <tr>

                                        </tr>

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
                <h4 class="modal-title" id="myCenterModalLabel">Ajouter un Fournisseur</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body p-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nom du fournisseur" class="form-label">Nom du Fournisseur</label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" class="form-control" name="telephone" placeholder="Telephone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email du Fournisseur</label>
                        <input type="email" class="form-control" name="email" placeholder="Email du Fournisseur">
                    </div>
                    <div class="mb-3">
                        <label for="mot de passe " class="form-label">Mot de passe</label>
                        <div class="input-group input-group-merge">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Pays</label>
                        <input type="text" class="form-control" name="pays" placeholder="Pays">
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" name="ville" placeholder="Ville">
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                    </div>



                    <div class="mb-3">
                        <label for="category" class="form-label">Contrat Assigné</label>

                        <select class="form-control" name="contrat" data-toggle="select2" placeholder="Contrat">
                            <?php foreach ($data['contrats'] as $contrat) : ?>
                                <option value="<?= $contrat->ID_CONTRAT; ?>"><?= $contrat->DESIGNATION; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" name="enregistrer" class="btn btn-success waves-effect waves-light">Enregistrer</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->