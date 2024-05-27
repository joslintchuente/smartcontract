<?php
$pageHtml = $data['contratmodifhtml'];
if (!empty($pageHtml) && $pageHtml != '') {
    $nom_contrat = $data['nomcontrat'];



    $newFile = APP_ROOT . "/views/includes/contrat/contrats_en_cours/" . $nom_contrat . ".html";



    $open = fopen($newFile, 'w');
    fwrite($open, $pageHtml);
    fclose($open);

    header('location: ' . URL_ROOT . '/revues/dashboard');
}
