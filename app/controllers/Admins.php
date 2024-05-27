<?php

class Admins extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
            //si une session admin existe il est redirige vers le dashboard en cas d'appel de page fictive
            $admin = $_SESSION['admin'];
            $data = [
                'admin' => $admin,
            ];
            $this->view('admin/index', $data);
        } else {
            //si aucune session n'est disponible il est redirige vers la page de connexion
            $this->view('admin/login');
        }
    }

    public function login()
    {
        $this->view('admin/login');
    }
    public function dashboard()
    {
        $data = [];
        $admin = null;

        //si l'action se connecter est declenche on verifie les identifiants soumis dans le formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pseudo = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));
            $this->adminModel = $this->model('Admin');
            if (empty($pseudo) || empty($password)) {
                $data['empty_fields'] = 'Remplir tous les champs';
            } else {
                $admin = $this->adminModel->getAdmin($pseudo, $password);
                if (empty($admin['error'])) {
                    //if account exist for the admin trying to login
                    $_SESSION['admin'] = $pseudo;
                    $this->view('admin/index', $data);
                } else {
                    $data['no_account_found'] = $admin['error'];
                    $this->view('admin/login', $data);
                }
            }
        } else {
            $admin = '';
        }


        $data = [
            'admin' => $admin,
        ];
        $this->view('admin/index', $data);
    }

    public function logout()
    {
        if (isset($_SESSION) && !empty($_SESSION['admin'])) {
            session_destroy();
            unset($_SESSION['admin']);
            header('location: ' . URL_ROOT . '/admins/login');
            //$this->view('admin/login');
        } else {
            $this->view('admin/login');
        }
    }

    public function listemembres()
    {
        $this->adminModel = $this->model('Admin');
        $outputRedacteur =  $this->adminModel->getallMembersFrom('tblredacteur');
        $outputInitiateur =  $this->adminModel->getallMembersFrom('tblinitiateur');
        $outputSignataire =  $this->adminModel->getallMembersFrom('tblsignataire');
        $outputApprobateur =  $this->adminModel->getallMembersFrom('tblapprobateur');
        $data = [
            'listeredacteur' => $outputRedacteur['all_members'],
            'listeinitiateur' => $outputInitiateur['all_members'],
            'listesignataire' => $outputSignataire['all_members'],
            'listeapprobateur' => $outputApprobateur['all_members'],
        ];
        $this->view('admin/listemembres', $data);
    }

    public function createmember()
    {
        $errors = [];
        $data = [];
        if (isset($_POST['savemember'])) {
            $membername = htmlspecialchars(trim($_POST['name']));
            $memberemail = htmlspecialchars(trim($_POST['email']));
            $memberphone = htmlspecialchars(trim($_POST['phone']));
            $memberrole = strtolower(htmlspecialchars(trim($_POST['role'])));
            $memberfonction = strtolower(htmlspecialchars(trim($_POST['fonction'])));

            if (empty($membername)) {
                $errors['error']['empty_name'] = "Renseigner un nom";
            }
            if (empty($memberemail)) {
                $errors['error']['empty_email'] = "Renseigner une adresse email";
            }
            if (empty($memberrole)) {
                $errors['error']['empty_role'] = "Renseigner un role valide";
            }
            if (empty($memberfonction)) {
                $errors['error']['empty_fonction'] = "Renseigner une fonction valide valide";
            }
            if (empty($memberphone)) {
                $errors['error']['empty_phone'] = "Renseigner un numero de telephone valide";
            }

            if (empty($errors['error'])) {
                //si aucune erreur n'est effectuer dans le remplissage du formulaire
                $this->adminModel = $this->model('Admin');
                //on verifie si l'utilisateur na pas deja ete enregister dans la table 
                $isInserted = $this->adminModel->createMember($memberrole, $memberemail, $membername,  $memberphone);
            } else {
            }
        }

        $data = [
            'errors' => $errors,
            'result' => $isInserted,
        ];

        $this->view('admin/listemembres', $data);
    }
}
