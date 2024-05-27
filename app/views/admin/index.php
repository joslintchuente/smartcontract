<?php
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
    header('location: ' . URL_ROOT . '/admins/login');
}
?>
<?php
require_once APP_ROOT . '/views/includes/headeradmin.php';
require_once APP_ROOT . '/views/includes/navbar.php';
require_once APP_ROOT . '/views/includes/sidebaradmin.php';
?>
<?php
require_once APP_ROOT . '/views/admin/dashboard.php';
?>
<?php
require_once APP_ROOT . '/views/includes/footeradmin.php';
?>
