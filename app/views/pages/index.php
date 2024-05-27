<?php

require_once APP_ROOT . '/views/includes/header.php';

?>

<?php
$backgroundimage = URL_ROOT . '/public/assets/images/homeimage1.jpg';
?>
<div class="splashimageintro">
    <img src="<?= $backgroundimage; ?>" class="fade-in">
</div>

<script type="text/javascript">
    const splash = document.querySelector('.splashimageintro');
    document.addEventListener('DOMContentLoaded', (e) => {
        setTimeout(() => {
            splash.classList.add('display-none');
        }, 3000);
    })
</script>
<?php require_once APP_ROOT . '/views/pages/login.php';
?>
<?php //APP_ROOT . '/views/includes/bottom.php'; 
?>

<!-- Vendor js -->
<script src="<?= URL_ROOT; ?>/public/assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?= URL_ROOT; ?>/public/assets/js/app.min.js"></script>

</body>

</html>