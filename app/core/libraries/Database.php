<?php
/*
*   Class de connexion à la BD et fonctions rélatives aux actions utilisateurs avec la BD
*   Creation : Jeudi 03 Mars 2022
*   Auteur  : Seini Abaya Gamaliel
*/
class Database
{

    /**
     * Attributs de la classe
     */
    private string $bd_name = DB_NAME;
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $passwd = DB_PASS;

    private $statement;
    private $dbHandler;
    private $error;

    /**
     * CONSTRUCTEUR
     */
    public function __construct()
    {
        //Constructeur qui initie un objet de connexion 
        $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->bd_name;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );


        try {
            $this->dbHandler = new PDO($conn, $this->user, $this->passwd, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($query)
    {
        $this->statement = $this->dbHandler->prepare($query);
    }

    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }

        $this->statement->bindValue($parameter, $value, $type);
    }

    //Execution des requetes
    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }


    //Renvoi une ligne particuliere
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //Row count
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
    /**
     * GETTERS
     */

    public function getBdName()
    {
        return $this->bd_name;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * SETTERS
     */

    public function setBdName(string $bd_name)
    {
        $this->bd_name = $bd_name;
    }


    public function setHost(string $host_name)
    {
        $this->host = $host_name;
    }

    public function setUser(string $user_name)
    {
        $this->user = $user_name;
    }

    public function setPasswd(string $passwd)
    {
        $this->passwd = $passwd;
    }
}
