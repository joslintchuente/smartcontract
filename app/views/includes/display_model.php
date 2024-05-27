<?php
function display($type_contrat)
{
    $path = "";


    $path =  '/wamp64/www/smartcontract/public/assets/images/modelcontrats/' . $type_contrat;

    $pathfile = URL_ROOT . '/app/views/includes';

    $scandir = scandir($path);
    //var_dump($scandir);
    foreach ($scandir as $fichier) {
        $imgpath = $path . '/' . $fichier;

        if (preg_match("#\.(jpg|jpeg|png|gif|bmp|tif)$#", strtolower($fichier))) {
            $urlimage = URL_ROOT . '/public/assets/images/modelcontrats/' . $type_contrat . '/' . $fichier;
?>
            <a href='<?= $urlimage ?>' data-lightbox='mygallery' data-title='dbz'><img src="<?= $urlimage ?>" onclick="image_clicked(this.id)" alt='image du contrat' id="<?= $urlimage ?>">
    <?php
            //echo "<a href= '$imgpath' data-lightbox='mygallery' data-title='dbz'><img src= '$imgpath' alt=''></a> ";
        }
    }
}
