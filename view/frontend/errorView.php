<?php $title = 'Erreurs' ?>

<?php ob_start(); ?>
<?php echo nl2br('<p> Il y a eu une erreur dans un traitement du site. Veuillez nous en excusez. L\'erreur est la suivante: ' . $error . '</p>'); ?>
<?php $content = ob_get_clean(); ?>

<?= require('view/frontend/templatePage.php'); ?>