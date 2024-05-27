<?php
class Approbateurs extends Controller
{
    public function __construct()
    {
    }

    public function dashboard()
    {
        //SI la session a demarre et que la session de l'utilisateur existe
        if (!empty($_SESSION['approbateur']) && !empty($_SESSION['nomcomplet_approbateur']) && $_SESSION != null) {
            //creation d'un objet approbateur
            $this->approbateurModel = $this->model('Approbateur');
            $iduser = (int)$_SESSION['id_approbateur'];
            $user =  $this->approbateurModel->initialisation($iduser);
            $contrats = $this->approbateurModel->get_contrat(intval($iduser));
            //var_dump($contrats);
            //$approbateur = $user[0];
            //$attributs = $approbateur->get_attribut();
            //var_dump($attributs);
            //$user = $this->approbateurModel->get_attribut();

            $data = [
                'user' => $iduser,
                'nomcomplet' => $_SESSION['nomcomplet_redacteur'],
                'contrats' => $contrats
            ];

            //var_dump($data);
            $this->view('approbateur/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/login');
        }
        $data['bienvenue'] = "Bienvenue chers approbateur";
        $this->view('approbateur/index');
    }

    public function approverContrat()
    {
        $this->view('approbateur/approuvercontrat');
    }


    public function detailcontrats()
    {
        $this->view('approbateur/detailcontrats');
    }


    public function getContrats()
    {

        if (isset($_POST['seecontractrevue'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->approbateurModel->initialisation($_SESSION['id_approbateur']);
            $user = $this->approbateurModel->get_attribut();
            $contrat_toedit = $this->approbateurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('approbateur/detailcontrat', $data);
        } else {
        }
        $user =  $this->redacteurModel->initialisation($_SESSION['id_approbateur']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->redacteurModel->get_attribut();
        $userid = $_SESSION['id_approbateur'];
        $contrats = $this->redacteurModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('approbateur/detailcontrat', $data);
    }

    public function editcontrat()
    {
        if (isset($_POST['seecontract'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->redacteurModel->initialisation($_SESSION['id_approbateur']);
            $user = $this->redacteurModel->get_attribut();
            $contrat_toedit = $this->redacteurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('approbateur/detailcontrat', $data);
        } else {
        }
        $this->view('approbateur/editcontrat', $data);
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


            $this->view('approbateur/save_contrat', $data);
        }
    }
}
