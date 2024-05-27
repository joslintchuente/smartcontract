<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../public/assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="../public/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../public/assets/css/config/saas/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../public/assets/css/config/saas/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="../public/assets/css/config/saas/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="../public/assets/css/config/saas/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body class="loading" data-layout-mode="two-column" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>
    <!-- Insertion des headers et sidesbar-->
    <!-- Begin page -->
    <div id="wrapper">
        <?php require_once APP_ROOT . '../includes/navbar.php'; ?>
        <?php require_once APP_ROOT . '../includes/leftsidebar.php'; ?>
        <div class="content-page">
            <div class="content">
                <?= var_dump($_GET['url']); ?>
            </div>
        </div>
    </div>
    <!-- Insertion des parties liees aux scripts--->
    <?php require_once APP_ROOT . '../includes/footerscripts.php'; ?>
</body>

</html>