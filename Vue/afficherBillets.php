<?php
    $title = "MonBlog - Page d'accueil";
    ob_start();
    foreach ($billets as $unResultat)
    {
            ?>
            <article>
                    <header>
                            <h1 class="titreBillet"><a href="<?= $lienBillet . $unResultat['BIL_ID']  ?>"><?= $unResultat['BIL_TITRE'] ?></a></h1>
                            <time datetime="2012-11-08"><?= $unResultat['BIL_DATE'] ?></time>
                    </header>
                    <p><?= $unResultat['BIL_CONTENU'] ?></p>
            </article>
            <hr />
            <?php
    }
    $contenu = ob_get_clean();
    require 'gabarit.php';
?>
