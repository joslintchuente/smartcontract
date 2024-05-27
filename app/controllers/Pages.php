<?php

class Pages extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {

        $this->view('pages/index');
    }

    public function login()
    {
        //fonction de deconnexion
        if (isset($_SESSION) && !empty($_SESSION) && $_SESSION != null) {
            //session_destroy();
            if (isset($_SESSION['fournisseur'])) {
                //unset($_SESSION['fournisseur']);
                unset($_SESSION['nomcomplet_fournisseur']);
            } else if (isset($_SESSION['initiateur'])) {
                //unset($_SESSION['initiateur']);
                unset($_SESSION['nomcomplet_initiateur']);
            } else if (isset($_SESSION['redacteur'])) {
                //unset($_SESSION['redacteur']);
                unset($_SESSION['nomcomplet_redacteur']);
            } else if (isset($_SESSION['revue'])) {
                //unset($_SESSION['revue']);
                unset($_SESSION['nomcomplet_revue']);
            }
            //$this->view('pages/index');
            header('location:' . URL_ROOT . '/pages/index');
        }
    }
}
