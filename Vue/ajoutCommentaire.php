<?php
    $title = "MonBlog - Ajout d'un commentaire";
    ob_start();
    ?>
    <p>Votre commentaire a été ajouté avec succès. <a href="index.php?action=afficherBillet&id=<?=$idBillet ?>">Retour à l'article</a></p>
    <?php
    $contenu = ob_get_clean();
    require 'gabarit.php';
?>
