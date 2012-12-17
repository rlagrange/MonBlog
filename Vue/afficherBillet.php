<?php


$title = "MonBlog - Article ";
ob_start();
?>
<article>
        <header>
                <h1 class="titreBillet"><?= $billet['BIL_TITRE'] ?></h1>
                <time datetime="2012-11-08"><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= $billet['BIL_CONTENU'] ?></p>
</article>
<hr />
<h3><a id="voirCommentaires">Afficher les commentaires</a></h3>
<div id="commentaires">
<?php
foreach ($commentaires as $commentaire)
{
    ?>
    <div class="commentaire">
    Auteur : <?= $commentaire['COM_AUTEUR'] ?><br />
    Commentaire : <?= $commentaire['COM_CONTENU'] ?>
    </div>
    <?php
}
?>
</div>
<hr />
<h3 id="voirCommentaire">Ajouter votre commentaire</h3>	
<form method="post" action="index.php?action=ajouterCommentaire">
    <p><label for="auteur">Votre pseudo : </label><input type="text" name="auteur" id="auteur"/></p>
    <p>Votre message : <br /><textarea name="contenu" rows="5" cols="100" id="contenu"></textarea></p>
    <input type="hidden" name="idBillet" value="<?= $billet['BIL_ID']; ?>" />
    <p><input type="submit" value="Envoyer votre commentaire" /></p>
</form>	

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>

// On a besoin de deux scripts pour cette page pour l'affichage des commentaires
<script type="text/javascript" src="jquery.js"></script>
<script src="script.js" type="text/javascript"></script>
