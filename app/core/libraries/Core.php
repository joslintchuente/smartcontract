<?php

class Core
{
    /**
     * Attributs 
     */
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    /**
     * Constructeur
     */
    public function __construct()
    {
        $url = $this->getUrl();

        //On verifie l'existence de la premiere valeur dans l'url

        if (file_exists('../app/core/controllers/' . ucwords($url[0]) . '.php')) {

            //Creation du controlleur 
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/core/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        /**
         * Controle du deuxieme parametre de l'url
         */
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        /**
         * Recuperation des parametres d'url
         */

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     *    Fonction de recuperation de l'url
     * 
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // var_dump($_GET['url']);
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            $url = explode('/', $url);
            return $url;
        } else {
            die("Aucune page rechercher ");
            // $url = 'home';
        }
    }
}
