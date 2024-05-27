<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= SITE_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= URL_ROOT; ?>/public/assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- les liens des fichiers contrats -->
    <link href="<?= URL_ROOT; ?>/public/assets/asset_file_edit/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <!-- JAVASCRIPT -->
    <script src="<?= URL_ROOT; ?>/public/assets/asset_file_edit/libs/jquery/jquery.min.js"></script>

    <!--tinymce js-->
    <script src="<?= URL_ROOT; ?>/public/assets/asset_file_edit/libs/tinymce/tinymce.min.js"></script>

    <!-- init js -->
    <script src="<?= URL_ROOT; ?>/public/assets/asset_file_edit/js/pages/form-editor.init.js"></script>



    <link rel="stylesheet" href="<?= URL_ROOT; ?>/public/assets/asset_model_contrat/css/style.css">
    <link rel="stylesheet" href="<?= URL_ROOT; ?>/public/assets/asset_model_contrat/css/lightbox.min.css">

    <script src="<?= URL_ROOT; ?>/public/assets/asset_model_contrat/js/lightbox-plus-jquery.min.js"></script>
    <script type="text/javascript" src="<?= URL_ROOT; ?>/public/assets/asset_model_contrat/js/ajax_display_model.js"></script>
    <script type="text/javascript">
        //Function de séléction

        function selectChoice() {
            var container = $('#container');
            var selector = $('#type_contrat');
            var url = '<?= URL_ROOT; ?>/initiateurs/chargermodels';


            selector.change(function() {
                var value = $(this).val();

                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        'type_contrat': value
                    },
                    success: function(data) {
                        container.html(data); //ici on envoie le résultat de la réponse dans la div
                    }
                });
            });
        }
        $(document).ready(function() {
            selectChoice();
        });

        function image_clicked(id) {
            document.getElementById('model_selected').innerHTML = id;
            document.getElementById('hidden_selected_model').value = id;
        }
    </script>



</head>

<body class="loading" data-layout-mode="two-column" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">