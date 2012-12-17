<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Mon Blog</title>
</head>
<body>
    <div id="global">
        <header>
            <h1 id="titreBlog">Mon Blog</h1>
            <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
        </header>
        <nav>
            <section>
                <h1>Billets</h1>
                <ul>
                    <li><a href="todo">Billets récents</a></li>
                    <li><a href="todo">Tous les billets</a></li>
                </ul>
            </section>
            <section>
                <h1>Commentaires récents</h1>
                <!-- Enrichi plus tard -->
            </section>
            <section>
                <h1>Administration</h1>
                <ul>
                    <li><a href="todo">Ecrire un billet</a></li>
                </ul>
            </section>
        </nav>
        <div id="contenu">
		
			<?php
			// On récupère les articles
			// On commencer par se connecter
			try
			{
				$con = new PDO("mysql:host=localhost;dbname=monblog", "root", "");
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$con->query('set names utf8');
				
				// On fait la requête
				$requete = "SELECT BIL_ID, BIL_TITRE, BIL_CONTENU, BIL_DATE FROM t_billet";
				
				// on execute
				$resultats = $con->query($requete);
				
				foreach ($resultats as $unResultat)
				{
					// On récupère le nombre de commentaire
					$requete = 'SELECT COUNT(*) AS nbCommentaire FROM t_commentaire WHERE BIL_ID = ' . $unResultat['BIL_ID'];
					$resulats2 = $con->query($requete);
					$unResultat2 = $resulats2->fetchColumn();
					?>
					<article>
						<header>
							<h1 class="titreBillet"><?= $unResultat['BIL_TITRE'] ?></h1>
							<time datetime="2012-11-08"><?= $unResultat['BIL_DATE'] ?></time>
						</header>
						<p><?= $unResultat['BIL_CONTENU'] ?>)</p>

						<footer class="commentaire">Il y a <?= $unResultat2['nbCommentaire'] ?> commentaire(s)</footer>
					</article>
					<hr />				
					<?php
				}
			}
			catch (Exception $e)
			{
				echo 'Erreur : ' . $e->getMessage();
			}
			
			?>
        </div> <!-- #contenu -->
        <footer id="piedBlog">
            Blog réalisé avec HTML5 et CSS.
        </footer>
    </div> <!-- #global -->
</body>
</html>