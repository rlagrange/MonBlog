<?php
$title = "MonBlog - Erreur";
ob_start();
echo '<h1>' . $msgErreur . '</h1>';
$contenu = ob_get_clean();
require 'gabarit.php';
?>
