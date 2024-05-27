<?php

$resultat = false;
//var_dump($_POST, $data['instance']);
if (isset($_POST) && !empty($_POST['acteur']) && !empty($_POST['role'])) {

    $initiateur = $data['instance'];
    $resultat = 'false';
    $id_contrat = intval($_POST['id']);
    if ($_POST['role'] == 'revue') {
        $id = (int)$_POST['acteur'];
        $resultat = $initiateur->integration_responsable_revue($id, $id_contrat);
        if ($resultat) {
            echo ("integration terminee");
        } else {
            echo ("echec d'integration ");
        }
    } elseif ($_POST['role'] == 'fournisseur') {
        $id = (int)$_POST['acteur'];
        $resultat = $initiateur->integration_fournisseur($id, $id_contrat);
        if ($resultat) {
            echo ("integration terminee");
        } else {
            echo ("echec d'integration ");
        }
    } elseif ($_POST['role'] == 'approbateur') {
        $id = (int)$_POST['acteur'];
        $resultat = $initiateur->integration_approbateur($id, $id_contrat);
        if ($resultat) {
            echo ("integration terminee");
        } else {
            echo ("echec d'integration ");
        }
    } elseif ($_POST['role'] == 'signataire') {
        $id = (int)$_POST['acteur'];
        $resultat = $initiateur->integration_signataire($id, $id_contrat);
        if ($resultat) {
            echo ("integration terminee");
        } else {
            echo ("echec d'integration ");
        }
    }
    //header('location: '.URL_ROOT.'/initiateurs/detailcontrats');
?>
    <button><a href=<?= URL_ROOT . '/initiateurs/detailcontrats' ?>> Actualiser</a></button>
<?php
} else {
    echo ('les champs sont mal remplis');
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
                                <li class="breadcrumb-item active">Details des Contrats</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Details des Contrats</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php foreach ($data['contrats'] as $contrat) :
            ?>
                <div class="row">
                    <div class="col-xl-8 col-lg-6">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">

                                <!-- project title-->
                                <h3 class="mt-0 font-20">
                                    <?= $contrat->DESIGNATION; ?>
                                </h3>
                                <div class="text-white mb-3 btn btn-primary">
                                    <form method="post" action="<?= URL_ROOT; ?>/initiateurs/voirContrats">
                                        <input type="hidden" name="idcontrat" value="<?= $contrat->ID_CONTRAT; ?>">
                                        <button type="submit" name="voircontractinitiateur" class="btn btn-primary">Voir le contrat</button>
                                    </form>
                                </div>

                                <h5 class="alert alert-success">Numero contrat : <?= $contrat->NUM_CONTRAT; ?></h5>
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
                                <h5 class="card-title mb-3">Progression du projet</h5>
                                <div class="mt-3 chartjs-chart" style="height: 200px;">

                                    <div class="progress mb-3">

                                        <div class="progress-bar" role="progressbar" style="width: <?php $p = (((int)$contrat->NIVEAU) * 100) / 6;
                                                                                                    echo ($p . "%"); ?>;" aria-valuenow=<?php $p = intval((((int)$contrat->NIVEAU) * 100) / 6);
                                                                                                                                        echo ("" . $p); ?> aria-valuemin="0" aria-valuemax="100"><?php $p = intval((((int)$contrat->NIVEAU) * 100) / 6);
                                                                                                                                                                                                    echo ($p . "%"); ?></div>
                                    </div>

                                    <div>
                                        <h3 class="mb-3  px-5">Niveau</h3>
                                    </div>
                                    <h1 class="mb-3 px-5" style="font-size: 50px;"><?= $contrat->NIVEAU; ?></h1>
                                </div>
                                <div class="text-center">
                                    <?php
                                    switch (intval($contrat->NIVEAU)) {
                                        case 1:
                                            echo ("<b class='alert alert-danger'>Phase de Redaction</b>");
                                            break;
                                        case 2:
                                            echo ("<b class='alert alert-info'>Phase de Revue</b>");
                                            break;
                                        case 3:
                                            echo ("<b class='alert alert-info'>verification par fournisseur</b>");
                                            break;
                                        case 4:
                                            echo ("<b class='alert alert-success'>Phase d'Approbation</b>");
                                            break;
                                        case 5:
                                            echo ("<b class='alert alert-success'>phase de Signature</b>");
                                            break;
                                        default:
                                            echo ("Termine !!!");
                                    }
                                    ?>
                                </div>
                                <br>
                                <div class="mb-3 text-white d-grid ">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal<?= $contrat->ID_CONTRAT; ?>"><i class="mdi mdi-plus-circle me-1"></i>Passer >></button>
                                </div>
                            </div>
                        </div>
                        <!-- end card-->
                    </div>
                </div>
                <div class="modal fade" id="custom-modal<?= $contrat->ID_CONTRAT; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Passer au Niveau suivant</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Nom Acteur</label>
                                        <?php
                                        //$acteurs1 = $data["instance"]->get_name_responsablerevue();
                                        //$acteurs2 = $data["instance"]->get_name_fournisseur();
                                        //$acteurs3 = $data["instance"]->get_name_approbateur();
                                        //$acteurs4 = $data["instance"]->get_name_signataire();
                                        //var_dump($contrat->ID_CONTRAT);
                                        ?>

                                        <select class="form-control" name="acteur" data-toggle="select2" placeholder="Nom Acteur">
                                            <?php switch ((int)$contrat->NIVEAU) {
                                                case 1:
                                                    $acteurs = $data["instance"]->get_name_responsablerevue();
                                                    foreach ($acteurs as $acteur) {
                                            ?><option value="<?= $acteur->ID_RESPONSABLE_REVUE; ?>"><?= $acteur->NOM_COMPLET; ?></option>
                                            <?php
                                                    }
                                                    break;
                                                case 2:

                                                    $acteurs = $data["instance"]->get_name_fournisseur();
                                                    foreach ($acteurs as $acteur) {
                                                        echo ("<option value=$acteur->ID_FOURNISSEUR>$acteur->NOM_COMPLET</option>");
                                                    }
                                                    break;
                                                case 3:
                                                    $acteurs = $data["instance"]->get_name_approbateur();
                                                    foreach ($acteurs as $acteur) {
                                                        echo ("<option value=$acteur->ID_APPROBATEUR>$acteur->NOM_COMPLET</option>");
                                                    }
                                                    break;
                                                case 4:
                                                    $acteurs = $data["instance"]->get_name_signataire();
                                                    foreach ($acteurs as $acteur) {
                                                        echo ("<option value=$acteur->ID_SIGNATAIRE>$acteur->NOM_COMPLET</option>");
                                                    }
                                                    break;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Role Acteur</label>
                                        <?php switch ((int)$contrat->NIVEAU) {
                                            case 1:
                                                echo ("<input type='hidden' class='form-control' name='role' id='name' value='revue' placeholder='Revue'>");
                                                break;
                                            case 2:
                                                echo ("<input type='hidden' class='form-control' name='role' id='name' value='fournisseur' placeholder='Fournisseur'>");
                                                break;
                                            case 3:
                                                echo ("<input type='hidden' class='form-control' name='role' id='name' value='approbateur' placeholder='Approbateur' >");
                                                break;
                                            case 4:
                                                echo ("<input type='hidden' class='form-control' name='role' id='name' value='signataire' placeholder='Signataire' >");
                                                break;
                                        }
                                        ?>
                                    </div>


                                    <div class="mb-3">
                                        passage du contrat phase de revue
                                    </div>

                                    <div class="text-end">
                                        <button type="button" class="btn btn-danger waves-effect waves-light" name='integration' data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Integrer l'acteur au processus</button>
                                    </div>
                                    <input type='hidden' value=<?= $contrat->ID_CONTRAT; ?> name='id'>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            <?php endforeach;
            ?>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->



    <!-- Modal -->




</div>