<?php

class Signataires extends Controller
{
    public function __construct()
    {
        // $this->initiateurModel = $this->model('Initiateur');
    }

    public function index()
    {
        $this->view('pages/login');
    }

    public function dashboard()
    {
        //SI la session a demarre et que la session de l'utilisateur existe
        if (!empty($_SESSION['signataire']) && !empty($_SESSION['nomcomplet_signataire']) && $_SESSION != null) {
            //creation d'un objet fournisseur
            $this->signataireModel = $this->model('Signataire');
            $iduser = $_SESSION['id_signataire'];
            //initialisation de l'objet avec les attributs souhaitees
            $user = $this->signataireModel->initialisation($iduser);
            //recuperation des attributs du fournisseur initialise
            $user = $this->signataireModel->get_attribut();
            //$contrats = $this->signataireModel->get_contrat($iduser);

            $data = [
                //'user' => $user[0]['nom_complet'],
                //'nomcomplet_signataire' => $_SESSION['nomcomplet_signataire'],
                //'contrats' => $contrats
            ];
            $this->view('signataire/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/index');
        }
    }


    public function detailcontrats()
    {
        $this->view('revue/detailcontrats');
    }


    public function getContrats()
    {

        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->redacteurModel->initialisation($_SESSION['id_revue']);
            $user = $this->redacteurModel->get_attribut();
            $contrat_toedit = $this->redacteurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('revue/detailcontrat', $data);
        } else {
        }
        $user =  $this->redacteurModel->initialisation($_SESSION['id_revue']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->redacteurModel->get_attribut();
        $userid = $_SESSION['id_redacteur'];
        $contrats = $this->redacteurModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('signataire/detailcontrat', $data);
    }

    public function editcontrat()
    {
        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->redacteurModel->initialisation($_SESSION['id_signataire']);
            $user = $this->redacteurModel->get_attribut();
            $contrat_toedit = $this->redacteurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('signataire/detailcontrat', $data);
        } else {
        }
        $this->view('signataire/editcontrat', $data);
    }

    public function enregistrermodif()
    {
        if (isset($_POST)) {
            $html =  $_POST['contratmodifhtml'];
            $idcontrat = $_POST['idcontrat'];
            $path =  $_POST['nomcontrat'];
            $data = [
                'contratmodifhtml' => $html,
                'nomcontrat' => $path,
                'idcontrat' => $idcontrat,
            ];


            $this->view('signataire/save_contrat', $data);
        }
    }
}
