<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
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
                </div>

                <a href="<?= URL_ROOT; ?>/pages/index">Accueil |</a>
                <a href="<?= URL_ROOT; ?>/admins/login">Espace Admin |</a>
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginUser'])) {


                    $_POST =  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $role = htmlspecialchars(trim($_POST['role']));
                    $errors = [];

                    //champ email vide
                    if (empty($email)) {
                        $errors['email'] = "Entrer une adresse email";
                    }

                    //champ password vide
                    if (empty($password)) {
                        $errors['password'] = "Entrer un mot de passe";
                    }

                    //champ role vide
                    if (empty($role)) {
                        $errors['role'] = "Choisir un role";
                    }

                    //les deux champs sont vide
                    if (!empty($email) && !empty($password)) {
                        if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
                            $errors['invalidEmail'] = "Entrer un format d'adresse email valide";
                        }
                    }

                    $role = strtolower($role);
                    $table = 'tbl' . $role;

                    //aucune erreur lier au remplissage du formulaire
                    if (empty($errors['email']) && empty($errors['password']) && empty($errors['invalidEmail'])) {

                        $db = new Database();
                        //on verifie dans la table $table qui veux se connecter et si le compte existe deja
                        $db->query("SELECT * FROM $table WHERE email=:email");
                        $db->bind(':email', $email);
                        $user = $db->single();
                        $nbOne = $db->rowCount();
                        $hashedPassword = sha1($password);

                        //si ce compte existe dans la table en question
                        if ($nbOne == 1) {
                            $checkedPassword = $user->PASSWORD;

                            if ($hashedPassword == $checkedPassword) {
                                //mot de passe correct
                                if ($role == "responsablerevue") {
                                    $_SESSION['responsable' . $role] = $user->EMAIL;
                                } else {
                                    $_SESSION[$role] = $user->EMAIL;
                                } //session role
                                $_SESSION['nomcomplet_' . $role] = $user->NOM_COMPLET;

                                if ($role == "responsablerevue") {
                                    $role = "responsable_revue";
                                }

                                $iduser = 'ID_' . strtoupper($role);




                                //Chiffrement de l'information a envoyer dans le controleur
                                /**
                                 * ----------------------------CHIFFREMENT-------------------------
                                 */

                                if ($role == "responsable_revue") {
                                    $role = "revue";
                                }
                                $_SESSION['id_' . $role] = $user->$iduser;
                                $data['id_' . $role] = $_SESSION['id_' . $role];
                                header('location:' . URL_ROOT . '/' . $role . 's/dashboard');
                            } else {
                                //mot de passe incorrecte
                                $errors['invalidPassword'] = "Mot de Passe Incorrecte";
                            }
                        } else {
                            $errors['no account found'] = "Ce compte n'existe pas dans ce rôle";
                        }
                        //
                    }
                    foreach ($errors as $error) {
                ?>
                        <h5 class="alert alert-danger"><?= $error; ?></h5>
                <?php
                    }
                }

                ?>

                <!-- title-->
                <h3 class="mt-0 py-50">Authentification</h3>


                <!-- form -->
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email <b style="color:red;">*</b></label>
                        <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Votre email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe <b style="color:red;">*</b> </label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Votre mot de passe ">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Se connecter en tant que: <b style="color:red;">*</b> </label>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option selected>choisir un role </option>
                            <option value="REDACTEUR">REDACTEUR</option>
                            <option value="INITIATEUR">INITIATEUR</option>
                            <option value="FOURNISSEUR">FOURNISSEUR</option>
                            <option value="APPROBATEUR">APPROBATEUR</option>
                            <option value="SIGNATAIRE">SIGNATAIRE</option>
                            <option value="RESPONSABLEREVUE">RESPONSABLE REVUE</option>
                        </select>
                    </div>
                    <div class="text-center d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="loginUser"> S'authentifier </button>
                    </div>

                </form>
                <!-- end form-->

                <!-- Footer-->

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center loginleftimage">
        <div class="auth-user-testimonial">
            <h2 class="mb-3 text-white"></h2>
            <p class="lead mt-10"><i class="mdi mdi-format-quote-open">Bienvenue sur SmartContrat l'application de realisation de contrat en ligne et tres rapide et blllaaaaaaa </i><i class="mdi mdi-format-quote-close"></i>
            </p>
            <h5 class="text-white">
                - Fadlisaad (Ubold Admin User)
            </h5>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>