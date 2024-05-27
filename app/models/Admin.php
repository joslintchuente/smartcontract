<?php

class Admin
{

    private $db;

    public function __construct()
    {
        //Instance de connexion a la base de donnees
        $this->db = new Database();
    }

    public function getAdmin($pseudo, $password)
    {
        $results = [];
        $this->db->query("SELECT * FROM admin WHERE email=:email");
        $this->db->bind(':email', $pseudo);
        $user = $this->db->single();
        $nbOne = $this->db->rowCount();
        $hashedPassword = sha1($password);
        if ($nbOne == 1) {
            $checkedPassword = $user->password;
            if ($hashedPassword == $checkedPassword) {
                $results = [
                    'user' => $user,
                    'error' => '',
                ];
            }
        } else {
            $results = [
                'user' => '',
                'error' => 'Aucun compte admin n\'est associer a ce pseudo',
            ];
        }

        return $results;
    }

    public function createMember($memberrole, $memberemail, $membername,  $memberphone)
    {
        $table = 'tbl' . $memberrole; //nom de la table 


        //Si l'utilisateur existe dans la table en question
        $this->db->query("SELECT * FROM $table WHERE `EMAIL`=:email");
        $test = $this->db->bind(':email', $memberemail);
        $user = $this->db->resultSet();
        $row = $this->db->rowCount();
        if ($row > 0) {
            $result['error_email'] = "Un membre existe deja avec cette adresse email";
        } else {
            $password = sha1($memberemail); //hashage du mot de passe pour enregistrement
            $this->db->query("INSERT INTO $table(`NOM_COMPLET`, `EMAIL`, `TELEPHONE`, `PASSWORD`) VALUES('$membername','$memberemail','$memberphone','$password')");
            $isOk = $this->db->execute();
            if ($isOk == true) {
                $result['is_inserted'] = "Membre cree avec succes";
                //l'insertion c'est bien passee
            } else {
                //si on a pas effectuer une insertion 
                $result['not_inserted'] = "Le membre na pas ete creer : erreur interne";
            }
        }
        return $result;
    }

    public function getallMembersFrom($table)
    {
        $members = [];
        $this->db->query("SELECT * FROM $table ORDER BY `NOM_COMPLET` ASC");
        $members = $this->db->resultSet();
        $membersNumber = $this->db->rowCount();
        // $members['number_of_' . $table] = $membersNumber;
        $members['all_members'] = $members;
        return $members;
    }
}
