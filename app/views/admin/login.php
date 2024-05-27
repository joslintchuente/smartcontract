<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?= URL_ROOT; ?>/public/assets/css/config/saas/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?= URL_ROOT; ?>/public/assets/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?= URL_ROOT; ?>/public/assets/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">
                                    <?php
                                    if (!empty($data)) {
                                        foreach ($data as $error) {
                                    ?>
                                            <b class="alert-danger"><?= $error; ?></b>
                                    <?php
                                        }
                                    }
                                    ?>
                                </p>
                            </div>

                            <form action="<?= URL_ROOT; ?>/admins/dashboard" method="POST">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Pseudo</label>
                                    <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="entrer votre pseudo :">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe </label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de Passe">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Connexion</button>
                                </div>
                                <div class="text-center">
                                    <a href="<?= URL_ROOT; ?>">Retour a la page d'accueil</a>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2015 - <script>
            document.write(new Date().getFullYear())
        </script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>

    <!-- Vendor js -->
    <script src="<?= URL_ROOT; ?>/public/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= URL_ROOT; ?>/public/assets/js/app.min.js"></script>

</body>

</html>