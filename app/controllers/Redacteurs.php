<?php
class Redacteurs extends Controller
{
    public function __construct()
    {
        $this->redacteurModel = $this->model('Redacteur');
    }

    public function index()
    {
        $this->view('pages/login');
    }

    public function dashboard()
    {
        //SI la session a demarre et que la session de l'utilisateur existe
        if (!empty($_SESSION['redacteur']) && !empty($_SESSION['nomcomplet_redacteur']) && $_SESSION != null) {
            //creation d'un objet fournisseur
            $this->redacteurModel = $this->model('Redacteur');
            $iduser = $_SESSION['id_redacteur'];
            //initialisation de l'objet avec les attributs souhaitees
            $user =  $this->redacteurModel->initialisation($_SESSION['id_redacteur']);

            $user = $this->redacteurModel->get_attribut();
            $contrats = $this->redacteurModel->get_contrat($iduser);

            $data = [
                'user' => $user[0],
                'nomcomplet' => $_SESSION['nomcomplet_redacteur'],
                'contrats' => $contrats
            ];
            $this->view('redacteur/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/login');
        }
    }


    public function getContrats()
    {

        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->redacteurModel->initialisation($_SESSION['id_redacteur']);
            $user = $this->redacteurModel->get_attribut();
            $contrat_toedit = $this->redacteurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('redacteur/detailcontrat', $data);
        } else {
        }
        $user =  $this->redacteurModel->initialisation($_SESSION['id_redacteur']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->redacteurModel->get_attribut();
        $userid = $_SESSION['id_redacteur'];
        $contrats = $this->redacteurModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('redacteur/detailcontrat', $data);
    }
    public function detailcontrats()
    {
        $this->view('redacteur/detailcontrats');
    }

    public function editcontrat()
    {
        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->redacteurModel->initialisation($_SESSION['id_redacteur']);
            $user = $this->redacteurModel->get_attribut();
            $contrat_toedit = $this->redacteurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('redacteur/detailcontrat', $data);
        } else {
        }
        $this->view('redacteur/editcontrat', $data);
    }

    public function enregistrermodif()
    {
        if (isset($_POST['savemodifredacteur'])) {
            $html =  $_POST['contratmodifhtml'];
            $idcontrat = $_POST['idcontrat'];
            $path =  $_POST['nomcontrat'];
            $id_redacteur = $_POST['idredacteur'];
            if (isset($_POST['terminecontrat'])) {
                $terminecontrat = $_POST['terminecontrat'];
                $this->redacteurModel = $this->model('Redacteur');
                $this->redacteurModel->initialisation($id_redacteur);
                $this->redacteurModel->get_attribut();
                $termine =  $this->redacteurModel->terminer_travail($idcontrat);
                //var_dump($termine);
            } else {
            }
            $data = [
                'contratmodifhtml' => $html,
                'nomcontrat' => $path,
                'idcontrat' => $idcontrat,
                'idredacteur' => $id_redacteur,
                'termine' => $termine
            ];


            $this->view('redacteur/save_contrat', $data);
        }
    }
}
