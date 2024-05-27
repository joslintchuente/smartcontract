<?php

class Redacteur
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
        $this->db->query("SELECT NOM_COMPLET,EMAIL,TELEPHONE,PASSWORD FROM tblredacteur WHERE ID_REDACTEUR=$id");
        $objet =  $this->db->resultSet();
        $this->nom_complet = $objet[0]->NOM_COMPLET;
        $this->telephone = $objet[0]->TELEPHONE;
        $this->email = $objet[0]->EMAIL;
        $this->password = $objet[0]->PASSWORD;
    }
    public function get_attribut()
    {    // ok
        if (isset($this->nom_complet) && isset($this->telephone) && isset($this->email) && isset($this->password)) {
            $params = array();
            array_push($params, array("id" => $this->id, "nom_complet" => $this->nom_complet, "telephone" => $this->telephone, "email" => $this->email, "password" => $this->password));
            return $params;
        } else {
            echo ("erreur");
            return null;
        }
    }
    public function terminer_travail($id_contrat)
    {  // ok
        // envoi de notification à l'initiateur et aux autres acteurs du mm pallier
        $datef = Date('Y-m-d H:i:s');

        $this->db->query("UPDATE tblhistoriquecontratsredacteur SET STATUT='termine',DATEFIN='$datef' WHERE ID_CONTRAT=$id_contrat && ID_REDACTEUR=$this->id ");
        $result = $this->db->execute();

        return $result;
    }
    public function get_contrat($id)
    {   // ok
        // on recupère la liste des contrat concernant le redacteur
        $this->db->query("SELECT * FROM tblhistoriquecontratsredacteur WHERE ID_REDACTEUR = $id");
        $this->db->execute();
        $id_contrats =  $this->db->resultSet();
        $contrats = array();
        $i = 0;
        foreach ($id_contrats as $id_contrat) {

            $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = $id_contrat->ID_CONTRAT");
            $this->db->execute();
            $contrats[$i] = $this->db->resultSet()[0];
            $i++;
        }

        return $contrats;
    }
    public function etat_travail($id_contrat)
    {   //  ok
        if ($this->get_niveau($id_contrat) > 1) {
            $etat_travail = "acheve + approuve";
        } elseif ($this->get_niveau_statut($id_contrat) == "termine") {
            $etat_travail = "acheve + en cours de validation";
        } else {
            $etat_travail = "en cours";
        }
        return $etat_travail;
    }
    public function  get_niveau($id_contrat)
    {  // ok
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = $id_contrat");
        $contrat =  $this->db->resultSet();
        $niveau = $contrat[0]->NIVEAU;
        return intval($niveau);
    }
    public function get_niveau_statut($id_contrat)
    {  //  ok
        $niveau = $this->get_niveau($id_contrat);

        $this->db->query("SELECT STATUT FROM tblhistoriquecontratsredacteur WHERE ID_CONTRAT=$id_contrat && ID_REDACTEUR=$this->id");
        $statuts = $this->db->resultSet();
        $valeur = $statuts[0]->STATUT;


        return $valeur;
    }

    public function create_commentaire($libelle, $type_acteur = "redacteur", $id_personnel, $id_contrat)
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
    public function specificcontrat($idcontrat)
    {
        $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = :contrat");
        $this->db->bind(':contrat', $idcontrat);
        $result = $this->db->single();
        return $result;
    }
}
