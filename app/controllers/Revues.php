<?php
class Revues extends Controller
{
    public function __construct()
    {
        //$this->revueModel = $this->model('Revue');
    }

    public function index()
    {
        $this->view('pages/login');
    }

    public function dashboard()
    {
        //SI la session a demarre et que la session de l'utilisateur existe
        if (isset($_SESSION) && !empty($_SESSION['responsablerevue']) && !empty($_SESSION['nomcomplet_responsablerevue']) && $_SESSION != null) {
            //creation d'un objet fournisseur
            $this->revueModel = $this->model('Revue');
            $iduser = $_SESSION['id_revue'];
            //initialisation de l'objet avec les attributs souhaitees
            $user =  $this->revueModel->initialisation($iduser);
            //recuperation des attributs du fournisseur initialise
            $user = $this->revueModel->get_attribut();
            $contrats = $this->revueModel->get_contrat($iduser);
            $instance = $this->revueModel;

            $data = [
                'user' => $user[0],
                'nomcomplet' => $_SESSION['nomcomplet_responsablerevue'],
                'contrats' => $contrats,
                'instance' => $instance
            ];
            $this->view('revue/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            //  $this->view('revue/index');
        }
    }





    public function detailcontrats()
    {
        $this->view('revue/detailcontrats');
    }


    public function getContrats()
    {
        //var_dump($_SESSION['id_revue']);
        if (isset($_POST['seecontractrevue'])) {
            $idcontrat = $_POST['idcontrat'];
            $idrevue = $_SESSION['id_revue'];
            $this->revueModel = $this->model('Revue');
            $this->revueModel->initialisation($idrevue);
            $user =  $this->revueModel->get_attribut();
            $contrat_toedit = $this->revueModel->specificcontrat($idcontrat);
            //var_dump($contrat_toedit);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('revue/detailcontrat', $data);
        } else {
        }
        $user =  $this->revueModel->initialisation($_SESSION['id_revue']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->revueModel->get_attribut();
        $userid = $_SESSION['id_revue'];
        $contrats = $this->revueModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('revue/detailcontrat', $data);
    }

    public function editcontrat()
    {
        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->revueModel->initialisation($_SESSION['id_revue']);
            $user = $this->revueModel->get_attribut();
            $contrat_toedit = $this->revueModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('revue/detailcontrat', $data);
        } else {
        }
        $this->view('revue/editcontrat', $data);
    }

    public function enregistrermodifrevue()
    {
        if (isset($_POST['savemodifrevue'])) {

            $html =  $_POST['contratmodifhtml'];
            //echo $html;
            $idcontrat = $_POST['idcontrat'];
            $path =  $_POST['nomcontrat'];
            $id_revue = $_POST['idrevue'];
            if (isset($_POST['terminecontrat'])) {
                // $terminecontrat = $_POST['terminecontrat'];
                $this->revueModel = $this->model('Revue');
                $this->revueModel->initialisation($id_revue);
                $this->revueModel->get_attribut();
                $termine =  $this->revueModel->terminer_travail($idcontrat);
                //var_dump($termine);
            } else {
            }
            $data = [
                'contratmodifhtml' => $html,
                'nomcontrat' => $path,
                'idcontrat' => $idcontrat,
                'idrevue' => $id_revue,
                'termine' => $termine
            ];

            $this->view('revue/save_contrat', $data);
        }
    }
}
