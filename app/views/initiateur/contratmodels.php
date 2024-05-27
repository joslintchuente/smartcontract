<?php
require APP_ROOT . "/views/includes/display_model.php";

$choix =  $_POST['type_contrat'];

if (isset($_POST['type_contrat'])) {
    $choix =  $_POST['type_contrat'];

    echo display($choix);
} else {
    echo "Pas de choix effectuer";
}
