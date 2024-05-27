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

                                <li class="breadcrumb-item active">Redaction du Contrat</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Redaction du Contrat</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            //var_dump($data["user"]);
            //var_dump($data);
            //foreach($data as $contrat){
            //var_dump();
            //}

            ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form name="form" action="<?= URL_ROOT; ?>/initiateurs/enregistrermodifinitiateur" method="POST">
                                <?php foreach ($data as $contrat) : ?>
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <div class="mb-3">
                                                <label for="name">Nom du Contrat</label>
                                                <input type="hidden" name="nomcontrat" value="<?= $contrat->DESIGNATION; ?>">
                                                <input type="text" id="projectname" disabled class="form-control" placeholder="Nom du Contrat" value="<?= $contrat->DESIGNATION; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <input type="hidden" name="idredacteur" value="<?= $_SESSION['id_redacteur'] ?>">
                                                <input type="hidden" name="idcontrat" value="<?= $contrat->ID_CONTRAT; ?>">
                                                <label for="numerocontrat">Numero du Contrat</label>
                                                <input type="text" id="projectname" class="form-control" disabled placeholder="type de Contrat" value="<?= $contrat->ID_CONTRAT; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="numerocontrat">Description</label>
                                                <textarea class="form-control" id="project-overview" disabled rows="5" placeholder="description du contrat">
                                                    <?= $contrat->OBSERVATIONS; ?>
                                                    </textarea>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <!-- Date View -->
                                                    <div class="mb-3">
                                                        <label> Date de Creation:</label>
                                                        <?= $contrat->CREATION_DATE; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">

                                                <label for="membres">Membres</label>
                                                <select class="form-select" data-toggle="select2 " disabled data-width="100%" multiple aria-label="multiple select example">
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>


                                            </div>

                                            <div>
                                                <label for="observations">Observations</label>
                                                <div class="mb-3 ">
                                                    <input type="text" id="project-budget" class="form-control" placeholder="Observations" value="<?= $contrat->OBSERVATIONS; ?>" disabled>
                                                </div>

                                            </div>



                                        </div> <!-- end col-->

                                        <div class="col-xl-10">
                                            <div id="editor" style="resize:both; overflow: scroll;">
                                                <?php
                                                $chemin = $contrat->PIECE_JOINTE;

                                                $modele = basename($chemin, ".PNG");
                                                $type_contrat = basename(dirname($chemin));
                                                $nom_contrat = $contrat->DESIGNATION;
                                                $path = APP_ROOT . "/views/includes/contrat/contrats_en_cours/" . $nom_contrat . ".html";


                                                if (file_exists($path)) {
                                                    include($path);
                                                } else {
                                                    include(APP_ROOT . "/views/includes/contrat/model_html/" . $type_contrat . "/" . $modele . "/" . $modele . ".html");
                                                }

                                                ?>

                                            </div>
                                            <script>
                                                var editor = CKEDITOR.replace('editor');

                                                CKEDITOR.on('instanceReady', function(ev) {
                                                    editor = ev.editor;
                                                    editor.setReadOnly(true);

                                                });
                                                editor.on('change', function(evt) {
                                                    // getData() returns CKEditor's HTML content.
                                                    var valeur = CKEDITOR.instances.editor.getData();
                                                    document.getElementById('elm2').value = valeur;
                                                });

                                                initSample();
                                            </script>

                                            <textarea name="contratmodifhtml" id="elm2" style="display:none; width: 700px;">
                                                </textarea>

                                        </div>

                                    </div> <!-- end col-->

                        </div>
                        <!-- end row -->


                        <div class="row mt-3">
                            <div class="col-12 text-center">

                                <button name="savemodifinitiateur" type="submit" class="btn btn-success waves-effect waves-light m-1"><i class="fe-check-circle me-1"></i> Enregister les modifications</button>
                            </div>
                        </div>
                        <br>
                    <?php endforeach ?>
                    <form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col-->

        </div>
        <!-- end row-->

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
                    <a href="javascript:void(0);">A Propos </a>
                    <a href="javascript:void(0);">besoin d'aide </a>
                    <a href="javascript:void(0);">Contactez Nous</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>