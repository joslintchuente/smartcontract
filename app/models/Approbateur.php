<?php

class Approbateur
{
    private $nom_complet;
    private $telephone;
    private $email;
    private $password;
    private $id;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function initialisation($id)
    {  // ok
        $this->id = (int)$id;
        $id = (int)$id;
        $this->db->query("SELECT * FROM tblapprobateur WHERE ID_APPROBATEUR=$id ");
        $objet =  $this->db->resultSet();

        $this->nom_complet = $objet[0]->NOM_COMPLET;
        $this->telephone = $objet[0]->TELEPHONE;
        $this->email = $objet[0]->EMAIL;
        $this->password = $objet[0]->PASSWORD;
        return $objet;
    }
    public function get_attribut()
    {    // ok
        $params = [];
        if (isset($this->nom_complet) && isset($this->telephone) && isset($this->email) && isset($this->password) && isset($this->ville) && isset($this->pays) && isset($this->adresse)) {
            // $params = array();
            array_push($params, array("id" => $this->id, "nom_complet" => $this->nom_complet, "telephone" => $this->telephone, "email" => $this->email, "password" => $this->password));
            return $params;
        } else {

            return null;
        }
    }

    public function terminer_travail($id_contrat)
    {  // ok
        // envoi de notification à l'initiateur et aux autres acteurs du mm pallier
        $datef = Date('Y-m-d H:i:s');
        var_dump($datef);
        $this->db->query("UPDATE tblhistoriquecontratsapprobateur SET STATUT='termine',DATEFIN='$datef' WHERE ID_CONTRAT=$id_contrat && ID_APPROBATEUR=$this->id ");
        $result = $this->db->execute();

        return $result;
    }

    public function get_contrat($id)
    {   // ok
        // on recupère la liste des contrat concernant l'approbateur
        $this->db->query("SELECT * FROM tblhistoriquecontratsapprobateur WHERE ID_APPROBATEUR = $id");
        $id_contrats =  $this->db->resultSet();
        $contrats = array();
        $i = 0;
        foreach ($id_contrats as $id_contrat) {
            $this->db->query("SELECT * FROM tblcontrat WHERE ID_CONTRAT = $id_contrat->ID_CONTRAT");
            $contrats[$i] = ($this->db->resultSet())[0];
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

        $this->db->query("SELECT STATUT FROM tblhistoriquecontratsapprobateur WHERE ID_CONTRAT=$id_contrat && ID_APPROBATEUR=$this->id");
        $statuts = $this->db->resultSet();
        $valeur = $statuts[0]->STATUT;


        return $valeur;
    }

    public function create_commentaire($libelle, $type_acteur = "approbateur", $id_personnel, $id_contrat)
    {
        $this->db->query("INSERT INTO tblcommentaire (ID_CONTRAT, ID_PERSONNEL,TYPE_ACTEUR,LIBELLE)
        VALUES ($id_contrat,$id_personnel,'$type_acteur','$libelle')");
        $result = $this->db->execute();
        if ($result) {
        } else {
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
