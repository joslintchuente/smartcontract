<?php

// definition d'un initiateur

class Initiateur
{
    private $db;
    private $nom_complet;
    private $telephone;
    private $email;
    private $password;
    private $id;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function initialisation($id)
    {  // ok
        $this->id = $id;
        $attribut = array();
        $this->db->query("SELECT NOM_COMPLET,EMAIL,TELEPHONE,PASSWORD FROM tblinitiateur WHERE ID_INITIATEUR=$id");
        $objet =  $this->db->resultSet();
        $this->nom_complet = $objet[0]->NOM_COMPLET;
        $this->telephone = $objet[0]->TELEPHONE;
        $this->email = $objet[0]->EMAIL;
        $this->password = $objet[0]->PASSWORD;
    }
    public function get_attribut()
    {    // ok
        if (isset($this->nom_complet) && isset($this->nom_complet) && isset($this->nom_complet) && isset($this->nom_complet)) {
            $params = array();
            array_push($params, array("id" => $this->id, "nom_complet" => $this->nom_complet, "telephone" => $this->telephone, "email" => $this->email, "password" => $this->password));
            return $params;
        } else {
            //echo ("erreur");
            return null;
        }
    }
    public function create_fournisseur($rs_fournisseur, $telephone, $email, $adresse, $pays, $ville, $password)
    { // ok
        // verification de l'existance
        $this->db->query("SELECT EMAIL,TELEPHONE,PASSWORD FROM tblfournisseur WHERE NOM_COMPLET='$rs_fournisseur' ");
        $existence =  $this->db->resultSet(); //  recupère le contenu de la requete
        // creation d'un fournisseur 


        //si le son contenu est vide le crée
        if (empty($existence)) {
            $this->db->query("INSERT INTO `tblfournisseur` (`ID_FOURNISSEUR`, `NOM_COMPLET`, `TELEPHONE`, `EMAIL`, `ADRESSE`, `PAYS`, `VILLE`, `PASSWORD`) VALUES (NULL, '$rs_fournisseur', '$telephone', '$email', '$adresse', '$pays', '$ville', '$password')");
            $result = $this->db->execute();
            //var_dump($result);
            if ($result === true) {
                //echo ("insertion effectuée");
                return $result;
            } else {
                //echo ("erreur d'insertion");
                return $result;
            }
        } else {
            //echo ("le fournisseur $rs_fournisseur exite deja dans la BD");
            return false;
        }
    }

    public function get_name_redacteur()
    {   // ok
        $this->db->query("SELECT NOM_COMPLET FROM tblredacteur");
        $names =  $this->db->resultSet(); // les noms des redacteurs
        return $names;
    }

    public function get_name_approbateur()
    {  // ok
        $this->db->query("SELECT * FROM tblapprobateur");
        $names =  $this->db->resultSet(); // les noms des pprobateurs
        return $names;
    }

    public function get_name_signataire()
    {  // ok
        $this->db->query("SELECT * FROM tblsignataire");
        $names =  $this->db->resultSet(); // les noms des signataires
        return $names;
    }
    public function get_name_responsablerevue()
    {   // ok
        $this->db->query("SELECT * FROM tblresponsablerevue");
        $names =  $this->db->resultSet(); // les noms des responsablerevues
        return $names;
    }
    public function get_type_contrat()
    {   // ok
        $this->db->query("SELECT LIBELLE_TYPE_CONTRAT FROM tbltypecontrat");
        $type =  $this->db->resultSet(); // les noms des responsablerevues
        return $type;
    }
    public function get_name_fournisseur()
    {   // ok
        $this->db->query("SELECT * FROM tblfournisseur");
        $names =  $this->db->resultSet(); // les noms des responsablerevues
        return $names;
    }
    public function get_liste_fournisseur($id_contrat)
    {
        $this->db->query("SELECT * FROM tblhistoriquecontratsfournisseur WHERE ID_CONTRAT = $id_contrat ");
        $id_fournisseur =  $this->db->resultSet(); //  tableau d'objet
        $liste = [];
        $i = 0;
        if (!empty($id_fournisseur)) {
            foreach ($id_fournisseur as $id) {
                $this->db->query("SELECT * FROM tblfournisseur WHERE ID_FOURNISSEUR = $id->ID_FOURNISSEUR");
                $a = $this->db->resultSet();

                if (!empty($a[0])) {

                    $liste[$i] = $a[0];
                    $i++;
                }
            }
        }

        return $liste;
    }

    public function get_type($id_type_contrat)
    {
        // 
        $this->db->query("SELECT LIBELLE_TYPE_CONTRAT FROM tbltypecontrat WHERE ID_TYPE_CONTRAT");
        $type =  $this->db->resultSet();
        return $type[0]->LIBELLE_TYPE_CONTRAT;
    }

    // il faut un script d'envoi d'email


    // script d'integration des acteurs au contrat
    public function integration_redacteur($id_redacteur, $id_contrat, $status = "en cours")
    {  // ok
        $this->db->query("INSERT INTO `tblhistoriquecontratsredacteur` (`ID_REDACTEUR`, `ID_CONTRAT`, `STATUT`) VALUES ($id_redacteur, $id_contrat, '$status')");
        $result = $this->db->execute();
        if ($result) {
            //echo ("integration redacteur reussie !!!");
        } else {
            //echo ("echec de l'integration");
        }
        return $result;
    }
    public function integration_responsable_revue($id_responsable_revue, $id_contrat, $status = "en cours")
    {  // ok
        $result = false;
        if (intval($this->get_niveau($id_contrat)) == 1 && $this->get_niveau_statut($id_contrat) == "termine") {
            $this->db->query("INSERT INTO `tblhistoriquecontratsresponsablerevue` (`ID_RESPONSABLE_REVUE`, `ID_CONTRAT`, `STATUT`) VALUES ($id_responsable_revue, $id_contrat, '$status')");
            $result = $this->db->execute();
            if ($result) {
                echo ("reussite...");
                $this->set_niveau($id_contrat, intval($this->get_niveau($id_contrat)) + 1);
            } else {
                echo ("Erreur au moment du passage à la phase de REVUE");
            }
        } else {
            echo ("impossible de passer à la phase revue: redaction en cours...");
        }
        return $result;
    }
    public function integration_fournisseur($id_fournisseur, $id_contrat, $status = "en cours")
    {  // ok
        if ($this->get_niveau($id_contrat) == 2 && $this->get_niveau_statut($id_contrat) == "termine") {
            $this->db->query("INSERT INTO `tblhistoriquecontratsfournisseur` (`ID_FOURNISSEUR`, `ID_CONTRAT`, `STATUT`) VALUES ($id_fournisseur, $id_contrat, '$status')");
            $result = $this->db->execute();
            if ($result) {
                echo ("reussite...");
                $this->set_niveau($id_contrat, intval($this->get_niveau($id_contrat)) + 1);
            } else {
                echo ("Erreur au moment du passage à la phase de verification par fournisseur");
            }
        } else {
            echo ("impossible de passer à la phase verification par fournisseur: revue en cours...");
        }
    }
    public function integration_approbateur($id_approbateur, $id_contrat, $status = "en cours")
    { // ok
        if ($this->get_niveau($id_contrat) == 3 && $this->get_niveau_statut($id_contrat) == "termine") {
            $this->db->query("INSERT INTO `tblhistoriquecontratsapprobateur` (`ID_APPROBATEUR`, `ID_CONTRAT`, `STATUT`) VALUES ($id_approbateur, $id_contrat, '$status')");
            $result = $this->db->execute();
            if ($result) {
                echo ("reussite...");
                $this->set_niveau($id_contrat, intval($this->get_niveau($id_contrat)) + 1);
            } else {
                echo ("Erreur au moment du passage à la phase d'approbation");
            }
        } else {
            echo ("impossible de passer à la phase d'approbation: verification par fournisseur en cours...");
        }
    }
    public function integration_signataire($id_signataire, $id_contrat, $status = "en cours")
    {   // ok
        if ($this->get_niveau($id_contrat) == 4 && $this->get_niveau_statut($id_contrat) == "termine") {
            $this->db->query("INSERT INTO `tblhistoriquecontratssignataire` (`ID_SIGNATAIRE`, `ID_CONTRAT`, `STATUT`) VALUES ($id_signataire, $id_contrat, '$status')");
            $result = $this->db->execute();
            if ($result) {
                echo ("reussite...");
                $this->set_niveau($id_contrat, intval($this->get_niveau($id_contrat)) + 1);
            } else {
                echo ("Erreur au moment du passage à la phase de signature");
            }
        } else {
            echo ("impossible de passer à la phase signature: approbation en cours...");
        }
    }
    // script de recupération de l'id des acteurs via les noms
    public function get_idredacteur($nom_complet)
    {  //  ok
        $this->db->query("SELECT * FROM tblredacteur WHERE NOM_COMPLET='$nom_complet'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_REDACTEUR;
    }
    public function get_idresponsable_revue($nom_complet)
    {  // ok
        $this->db->query("SELECT * FROM tblresponsablerevue WHERE NOM_COMPLET='$nom_complet'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_RESPONSABLE_REVUE;
    }
    public function get_idfournisseur($nom_complet)
    {  // ok
        $this->db->query("SELECT * FROM tblfournisseur WHERE NOM_COMPLET='$nom_complet'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_FOURNISSEUR;
    }
    public function get_idapprobateur($nom_complet)
    {  // ok 
        $this->db->query("SELECT * FROM tblapprobateur WHERE NOM_COMPLET='$nom_complet'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_APPROBATEUR;
    }
    public function get_idsignataire($nom_complet)
    {   // ok
        $this->db->query("SELECT * FROM tblsignataire WHERE NOM_COMPLET='$nom_complet'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_SIGNATAIRE;
    }
    public function get_idtypecontrat($libelle_type_contrat)
    {   // ok
        $libelle_type_contrat = strtolower($libelle_type_contrat);
        $this->db->query("SELECT * FROM tblmodel WHERE NOM_MODEL = '$libelle_type_contrat'");
        $attribut =  $this->db->resultSet();
        return $attribut[0]->ID_MODEL;
    }

    public function get_idContrat($designation)
    {
        $this->db->query("SELECT * FROM tblcontrat WHERE DESIGNATION = :contrat");
        $this->db->bind(':contrat', $designation);
        $this->db->execute();
        $result = $this->db->single();
        //var_dump($result);
        return $result;
    }
    // creation d'un contrat           // ok
    public function create_contrat($num_contrat, $designation, $delai, $piece_jointe, $observations, $niveau, $nbr_appro_voulue, $nbr_appro_actuel, $id_type_contrat, $id_initiateur)
    {
        // test préalable
        $this->db->query("SELECT * FROM tblcontrat WHERE DESIGNATION = '$designation'");
        $redondance = $this->db->resultSet();
        if (empty($redondance)) {
            // génération d'un nombre aléatoire
            do {
                $presence = false;
                $num_contrat = rand(100000, 999999);
                $this->db->query("SELECT DESIGNATION FROM tblcontrat WHERE NUM_CONTRAT = $num_contrat");
                $design =  $this->db->resultSet();
                if (empty($design)) {
                    $presence = false;
                }
            } while ($presence === true);
            //var_dump($id_initiateur);
            // $num_contrat = rand(100000, 999999);
            $req = "INSERT INTO `tblcontrat` (`NUM_CONTRAT`, `DESIGNATION`, `DELAI_TRAITEMENT`, `PIECE_JOINTE`, `OBSERVATIONS`, `NIVEAU`, `NBR_APPRO_VOULUE`, `NBR_APPRO_ACTUEL`,`ID_TYPE_CONTRAT`,`ID_INITIATEUR`) VALUES ($num_contrat, '$designation', $delai, '$piece_jointe', '$observations', $niveau, $nbr_appro_voulue, $nbr_appro_actuel,$id_type_contrat,$id_initiateur)";
            //var_dump($req);
            $this->db->query("INSERT INTO `tblcontrat` (`NUM_CONTRAT`, `DESIGNATION`, `DELAI_TRAITEMENT`, `PIECE_JOINTE`, `OBSERVATIONS`, `NIVEAU`, `NBR_APPRO_VOULUE`, `NBR_APPRO_ACTUEL`,`ID_TYPE_CONTRAT`,`ID_INITIATEUR`) VALUES ($num_contrat, '$designation', $delai, '$piece_jointe', '$observations', $niveau, $nbr_appro_voulue, $nbr_appro_actuel,$id_type_contrat,$id_initiateur)");
            $result = $this->db->execute();
            return $result; // a retirer
        } else {
            return $result = false;
            //echo(" Erreur !! le contrat mentionné existe deja ");
        }
    }

    public function get_contrat($id)
    {  // ok
        // on recupère la liste des contrat concernant l'initiateur
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_INITIATEUR = $id");
        $contrats =  $this->db->resultSet();
        return $contrats;
    }
    //recup du niveau
    public function  get_niveau($id_contrat)
    {   // ok
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = $id_contrat");
        $contrat =  $this->db->resultSet();
        $niveau = $contrat[0]->NIVEAU;
        return intval($niveau);
    }
    public function  set_niveau($id_contrat, $niveau)
    { // ok
        $this->db->query("UPDATE tblcontrat SET NIVEAU=$niveau WHERE ID_CONTRAT=$id_contrat");
        $result =  $this->db->execute();
        if ($result) {
            echo ("passage de niveau reussie");
        } else {
            echo ("echec du passage de niveau");
        }
    }

    //pour connaitre le statut général du contrat
    public function get_contrat_statut($id_contrat)
    { //  ok
        $niveau = $this->get_niveau($id_contrat);


        // on recupere le statut
        $valeur = "en cours";
        if ($niveau > 5) {
            $valeur = "termine";
        } else {
            if ($this->get_niveau_statut($id_contrat) == "avorte") {
                $valeur = "avorte";
            }
        }
        return $valeur;
    }
    /**
     * Fonction de recuperation d'avancement du contrat par niveau
     */
    public function get_niveau_statut($id_contrat)
    {  // ok 
        $niveau = $this->get_niveau($id_contrat);
        //echo ("le niveau est $niveau");
        $valeur = "en cours";
        switch ($niveau) {
            case 1:
                $this->db->query("SELECT STATUT FROM tblhistoriquecontratsredacteur WHERE ID_CONTRAT=$id_contrat");
                $statuts = $this->db->resultSet();
                break;
            case 2:
                $this->db->query("SELECT STATUT FROM tblhistoriquecontratsresponsablerevue WHERE ID_CONTRAT=$id_contrat");
                $statuts = $this->db->resultSet();
                break;
            case 3:
                $this->db->query("SELECT STATUT FROM tblhistoriquecontratsfournisseur WHERE ID_CONTRAT=$id_contrat");
                $statuts = $this->db->resultSet();
                break;
            case 4:
                $this->db->query("SELECT STATUT FROM tblhistoriquecontratsapprobateur WHERE ID_CONTRAT=$id_contrat");
                $statuts = $this->db->resultSet();
                break;
            case 5:
                $this->db->query("SELECT STATUT FROM tblhistoriquecontratssignataire WHERE ID_CONTRAT=$id_contrat");
                $statuts = $this->db->resultSet();
                break;
            default:
                //echo ("le contrat est deja a deja été signé!!");
                $valeur = "termine";
        }
        if ($valeur !== "termine") {
            //var_dump($statuts);
            foreach ($statuts as $statut) {
                if ($statut->STATUT == "en cours") {
                    $valeur = "en cours";
                    //echo ("je suis entré 1 fois");
                    break;
                }
                $valeur = $statut->STATUT;
            }
        }
        return $valeur;
    }

    public function avorter($id_contrat)
    {  // ok
        // l'initiateur pour avorter le projet 
        // fait passer le statut de l'historique à "avorte"
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = $id_contrat");
        $contrat =  $this->db->resultSet();
        $niveau = $contrat[0]->NIVEAU;
        switch ($niveau) {
            case 1:
                $this->db->query("UPDATE tblhistoriquecontratsredacteur
            SET STATUT='avorte' WHERE ID_CONTRAT=$id_contrat");
                $result = $this->db->execute();
                echo ("contrat avorté au niveau redaction");
                break;
            case 2:
                $this->db->query("UPDATE tblhistoriquecontratsresponsablerevue
            SET STATUT='avorte' WHERE ID_CONTRAT=$id_contrat");
                $result = $this->db->execute();
                echo ("contrat avorté au niveau de la revue");
                break;
            case 3:
                $this->db->query("UPDATE tblhistoriquecontratsfournisseur
            SET STATUT='avorte' WHERE ID_CONTRAT=$id_contrat");
                $result = $this->db->execute();
                echo ("contrat avorté au niveau du fournisseur");
                break;
            case 4:
                $this->db->query("UPDATE tblhistoriquecontratsapprobateur
            SET STATUT='avorte' WHERE ID_CONTRAT=$id_contrat");
                $result = $this->db->execute();
                echo ("contrat avorté au niveau de l'approbation ");
                break;
            case 5:
                $this->db->query("UPDATE tblhistoriquecontratssignataire
            SET STATUT='avorte' WHERE ID_CONTRAT=$id_contrat");
                $result = $this->db->execute();
                echo ("contrat avorté au niveau de la signature");
                break;
            default:
                echo ("le contrat est deja a deja été signé!!");
                $result = false;
        }
        return $result;
        // après cela on envoie une notification et/ou email aux acteurs

    }

    public function create_commentaire($libelle, $type_acteur = "initiateur", $id_personnel, $id_contrat)
    {
        $this->db->query("INSERT INTO tblcommentaire (ID_CONTRAT, ID_PERSONNEL,TYPE_ACTEUR,LIBELLE)
        VALUES ($id_contrat,$id_personnel,'$type_acteur','$libelle')");
        $result = $this->db->execute();
        if ($result) {
            echo ("commentaire cree avec succes");
        } else {
            echo ("echec de commenteaire");
        }
        return $result;
    }

    public function getModels()
    {
        $results = [];
        $this->db->query("SELECT * FROM tblmodel");
        $models = $this->db->resultSet();
        return $models;
    }

    public function getRedacteur()
    {
        $results = [];
        $this->db->query("SELECT * FROM tblredacteur");
        $redacteurs = $this->db->resultSet();
        return $redacteurs;
    }
    public function specificcontrat($idcontrat)
    {
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = :contrat");
        $this->db->bind(':contrat', $idcontrat);
        $result = $this->db->single();
        return $result;
    }
}
