<?php

class User
{
    private $db;

    public function __construct()
    {
        //Instance de connexion a la base de donnees
        $this->db = new Database();
    }

    public function login($email, $password)
    {
        //Fonction de verification de connexion de l'utilisateur
        $this->db->query("SELECT * FROM users  WHERE email = :email");
        //joindre les valeurs
        $this->db->bind(':email', $email);

        $row = $this->db->rowCount();
        $hashedPassword = sha1($password);
        $avedPassword = $row->password;
        if (password_verify($hashedPassword, $avedPassword)) {
            return $row;
        } else {
            return false;
        }

        $this->db->bind(':password', $password);
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        $results = $this->db->resultSet();
        return $results;
    }
}
