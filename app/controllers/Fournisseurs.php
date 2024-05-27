<?php

use ioncube\phpOpensslCryptor\Cryptor;

class Fournisseurs extends Controller
{
    public function __construct()
    {
        // $this->fournisseurModel = $this->model('Fournisseur');
    }

    /**
     *  Fonction d'appel du tableau de bord
     */
    public function index()
    {
        $this->view('pages/login');
    }
    public function dashboard()
    {
        //SI la session a demarre et que la session de l'utilisateur existe
        if (!empty($_SESSION['fournisseur']) && !empty($_SESSION['nomcomplet_fournisseur']) && $_SESSION != null) {
            //creation d'un objet fournisseur
            $this->fournisseurModel = $this->model('Fournisseur');
            $iduser = $_SESSION['id_fournisseur'];
            //initialisation de l'objet avec les attributs souhaitees
            $user =  $this->fournisseurModel->initialisation($iduser);
            //recuperation des attributs du fournisseur initialise
            $user = $this->fournisseurModel->get_attribut();
            $contrats = $this->fournisseurModel->get_contrat($iduser);

            $data = [
                'user' => $user[0]['nom_complet'],
                'nomcomplet' => $_SESSION['nomcomplet_fournisseur'],
                'contrats' => $contrats
            ];
            $this->view('fournisseur/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/login');
        }
    }

    /**
     * Fonction d'appel de la liste des contrats
     */

    public function getContrats()
    {
        $this->fournisseurModel = $this->model('Fournisseur');
        if (isset($_POST['seecontractfournisseur'])) {
            $idcontrat = $_POST['idcontrat'];

            $this->fournisseurModel->initialisation($_SESSION['id_fournisseur']);
            $user = $this->fournisseurModel->get_attribut();
            $contrat_toedit = $this->fournisseurModel->specificcontrat($idcontrat);
            //var_dump($contrat_toedit);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('fournisseur/detailcontrat', $data);
        } else {
        }
        $user =  $this->fournisseurModel->initialisation($_SESSION['id_fournisseur']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->fournisseurModel->get_attribut();
        $userid = $_SESSION['id_fournisseur'];
        $contrats = $this->fournisseurModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('fournisseur/detailcontrat', $data);
    }
    public function detailcontrats()
    {
        $this->view('fournisseur/detailcontrat');
    }

    public function editcontrat()
    {
        if (isset($_POST['seecontractfournisseur'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->fournisseurModel->initialisation($_SESSION['id_fournisseur']);
            $user = $this->fournisseurModel->get_attribut();
            $contrat_toedit = $this->fournisseurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('fournisseur/detailcontrat', $data);
        } else {
        }
        $this->view('fournisseur/editcontrat', $data);
    }

    public function enregistrermodiffournisseur()
    {
        if (isset($_POST['savemodiffournisseur'])) {
            $html =  $_POST['contratmodifhtml'];
            $idcontrat = $_POST['idcontrat'];
            $path =  $_POST['nomcontrat'];
            $id_fournisseur = $_POST['idfournisseur'];

            $this->fournisseurModel = $this->model('Fournisseur');
            $this->fournisseurModel->initialisation($id_fournisseur);
            $this->fournisseurModel->get_attribut();
            $termine =  $this->fournisseurModel->terminer_travail($idcontrat);
            //var_dump($termine);
            if ($termine) {
                header('location: ' . URL_ROOT . '/fournisseurs/dashboard');
                $valide = 'valide';
            } else {
                $valide = 'Non valide';
            }
            $data = [
                'valide' => $valide
            ];


            $this->view('fournisseur/index', $data);
        }
    }
}
