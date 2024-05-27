<?php
class Initiateurs extends Controller
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
        if (!empty($_SESSION['initiateur']) && !empty($_SESSION['nomcomplet_initiateur']) && $_SESSION != null) {
            //creation d'un objet fournisseur
            $this->initiateurModel = $this->model('Initiateur');
            $iduser = $_SESSION['id_initiateur'];
            //initialisation de l'objet avec les attributs souhaitees
            $user =  $this->initiateurModel->initialisation($iduser);
            //recuperation des attributs du fournisseur initialise
            $user = $this->initiateurModel->get_attribut();
            $contrats = $this->initiateurModel->get_contrat($iduser);
            $type = [];
            $statuts = [];
            $i = 0;
            foreach ($contrats as $contrat) {
                $type[$i]  = $this->initiateurModel->get_type($contrat->ID_TYPE_CONTRAT);
                $statuts[$i] = $this->initiateurModel->get_contrat_statut($contrat->ID_CONTRAT);
                $i++;
            }


            $data = [
                'user' => $user[0],  // ses attribs
                'contrats' =>  $contrats, // ses contrats
                'role' => "initiateur",    // son role
                'statuts' => $statuts,
                'type' => $type
            ];
            $this->view('initiateur/index', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/index');
        }
    }

    public function nouveau()
    {
        $this->initiateurModel = $this->model('Initiateur');
        $models = $this->initiateurModel->getModels();
        $redacteurs = $this->initiateurModel->getRedacteur();

        $datamodels = [
            'models' => $models,
            'redacteurs' => $redacteurs,
        ];
        $this->view('initiateur/nouveau', $datamodels);
    }

    public function creerContrat()
    {
        if (isset($_POST['savecontract']) && !empty($_SESSION['initiateur']) && !empty($_SESSION['id_initiateur'])) {
            $contract = $_POST;
            $designation = $_POST['contractname']; //*
            $contract_type = $_POST['type_contrat']; //*
            $description = $_POST['description'];
            $delai = $_POST['delai']; //*
            $membres = $_POST['membres'];
            $observations = $_POST['observations'];
            $piece_jointe = $_POST['contractsource']; //*
            $id_initiateur = $_SESSION['id_initiateur'];

            $num_contrat = rand(100000, 999999);

            $this->initiateurModel = $this->model('Initiateur');
            $id_type_contrat = $this->initiateurModel->get_idtypecontrat($contract_type);
            $id_type_contrat = (int) $id_type_contrat;
            $id_initiateur = (int)$id_initiateur;
            $delai = (int) $delai;
            $data['model_contrat'] = $id_type_contrat;
            //var_dump($id_initiateur, $id_type_contrat);
            //recuperation de l'id du redacteur choisis
            $idredacteur = $this->initiateurModel->get_idredacteur($membres);
            //enregistrement du contrat
            $addcontract = $this->initiateurModel->create_contrat($num_contrat, $designation, $delai, $piece_jointe, $observations, 1, 1, 0, $id_type_contrat, $id_initiateur);

            //recuperation de l'id du contrat enregistrer
            //var_dump($designation);
            $idcontratcreer = $this->initiateurModel->get_idContrat($designation);

            $idredacteur = (int) $idredacteur;
            //integration du redacteur au nouveau contrat creer
            $integration = $this->initiateurModel->integration_redacteur($idredacteur, $idcontratcreer->ID_CONTRAT);
            $data['saved_ok'] = $addcontract;
            if ($data['saved_ok'] == true) {
                $data['success_message'] = "Enregistrement du nouveau contrat n" . $num_contrat . " effectuer avec success";
                $this->view('initiateur/nouveau', $data);
            } else {
                $data['form_contract'] = $contract;
                $data['id_user'] = $_SESSION['id_initiateur'];

                $this->view('initiateur/nouveau', $data);
            }
        }
    }

    public function chargermodels()
    {
        $this->view('initiateur/contratmodels');
    }
    public function detailcontrats()
    {
        if (!empty($_SESSION['initiateur']) && !empty($_SESSION['nomcomplet_initiateur']) && $_SESSION != null) {
            //creation d'un objet Initiateur
            $this->initiateurModel = $this->model('Initiateur');
            $iduser = (int)$_SESSION['id_initiateur'];
            $user =  $this->initiateurModel->initialisation($iduser);
            $user = $this->initiateurModel->get_attribut(); // les attrib de l'initiateur
            $contrats = $this->initiateurModel->get_contrat($iduser); // ses contrats

            $type = [];
            $statuts = [];
            $i = 0;
            foreach ($contrats as $contrat) {
                $type[$i]  = $this->initiateurModel->get_type($contrat->ID_TYPE_CONTRAT);
                $statuts[$i] = $this->initiateurModel->get_contrat_statut($contrat->ID_CONTRAT);
                $i++;
            }


            $data = [
                'user' => $user[0],  // ses attribs
                'contrats' =>  $contrats, // ses contrats
                'role' => "initiateur",    // son role
                'statuts' => $statuts,
                'type' => $type,
                'instance' => $this->initiateurModel,
                'utilisateur' => $user
            ];
            $this->view('initiateur/detailcontrats', $data);
        }

        //$this->view('initiateur/detailcontrats');
    }

    public function newfournisseur()
    {
        $this->view('initiateur/newfournisseur');
    }
    public function detailfournisseurs()
    {
        if (!empty($_SESSION['initiateur']) && !empty($_SESSION['nomcomplet_initiateur']) && $_SESSION != null) {
            //creation d'un objet Initiateur
            $this->initiateurModel = $this->model('Initiateur');
            $iduser = (int)$_SESSION['id_initiateur'];
            $user =  $this->initiateurModel->initialisation($iduser);
            $user = $this->initiateurModel->get_attribut(); // les attrib de l'initiateur
            $contrats = $this->initiateurModel->get_contrat($iduser); // ses contrats

            $type = [];
            $statuts = [];
            $i = 0;
            $liste_fournisseur = [];
            foreach ($contrats as $contrat) {
                $type[$i]  = $this->initiateurModel->get_type($contrat->ID_TYPE_CONTRAT);
                $statuts[$i] = $this->initiateurModel->get_contrat_statut($contrat->ID_CONTRAT);
                $liste_fournisseur[$i] = ($this->initiateurModel->get_liste_fournisseur($contrat->ID_CONTRAT));

                $i++;
            }


            $data = [
                'user' => $user[0],  // ses attribs
                'contrats' =>  $contrats, // ses contrats
                'role' => "initiateur",    // son role
                'statuts' => $statuts,
                'type' => $type,
                'liste_fournisseur' => $liste_fournisseur,
                'instance' => $this->initiateurModel
            ];
            $this->view('initiateur/listefournisseur', $data);
        } else {
            //on le redirige vers la page de connexion car il na plus de session
            $this->view('pages/login');
        }

        //$this->view('initiateur/listefournisseur');
    }

    public function voirContrats()
    {
        $this->initiateurModel = $this->model('Initiateur');

        if (isset($_POST['voircontractinitiateur'])) {
            $idcontrat = $_POST['idcontrat'];
            $this->initiateurModel->initialisation($_SESSION['id_initiateur']);
            $user = $this->initiateurModel->get_attribut();
            $contrat_toedit = $this->initiateurModel->specificcontrat($idcontrat);
            $data['contrattoedit'] = $contrat_toedit;
            $this->view('initiateur/voircontrat', $data);
        } else {
        }
        $user =  $this->initiateurModel->initialisation($_SESSION['id_initiateur']);
        //recuperation des attributs du fournisseur initialise
        $user = $this->initiateurModel->get_attribut();
        $userid = $_SESSION['id_initiateur'];
        $contrats = $this->initiateurModel->get_contrat($userid);
        $data['contrats'] = $contrats;
        $this->view('initiateur/voircontrat', $data);
    }
}
