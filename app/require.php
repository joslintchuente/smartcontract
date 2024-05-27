<?php
session_start();
//Chargement des bibliotheques utiles
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';
require_once 'libraries/Cryptor.php';

require_once 'config/config.php';

//Instance de la classe core
//var_dump(__FILE__);

$init = new Core();
