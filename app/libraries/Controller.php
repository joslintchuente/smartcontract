<?php
//Chargement des modeles et des vues
class Controller
{
    /**
     * 
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        //Instance du model 

        return new $model();
    }

    public function view($view, $data = [])
    {
        //Recherce de la vue
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            echo "Cette page nexiste pas: Erreur 404";
        }
    }
}
