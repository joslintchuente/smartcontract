<?php switch ((int)$contrat->NIVEAU) {
    case 1:
        $acteurs = $data["instance"]->get_name_responsablerevue();
        foreach ($acteurs as $acteur) {
            echo ("<option value=$acteur->ID_RESPONSABLE_REVUE>$acteur->NOM_COMPLET</option>");
        }
        break;
    case 2:
        $acteurs = $data["instance"]->get_name_fournisseur();
        foreach ($acteurs as $acteur) {
            echo ("<option value=$acteur->ID_FOURNISSEUR>$acteur->RS_FOURNISSEUR</option>");
        }
        break;
    case 3:
        $acteurs = $data["instance"]->get_name_approbateur();
        foreach ($acteurs as $acteur) {
            echo ("<option value=$acteur->ID_APPROBATEUR>$acteur->NOM_COMPLET</option>");
        }
        break;
    case 4:
        $acteurs = $data["instance"]->get_name_signataire();
        foreach ($acteurs as $acteur) {
            echo ("<option value=$acteur->ID_SIGNATAIRE>$acteur->NOM_COMPLET</option>");
        }
        break;
}
?>
<?php
switch (intval($contrat->NIVEAU)) {
    case 1:
        echo ("Phase de Redaction");
        break;
    case 2:
        echo ("Phase de Revue");
        break;
    case 3:
        echo ("verification par fournisseur");
        break;
    case 4:
        echo ("Phase d'Approbation");
        break;
    case 5:
        echo ("phase de Signature");
        break;
    default:
        echo ("Termine !!!");
}
?>