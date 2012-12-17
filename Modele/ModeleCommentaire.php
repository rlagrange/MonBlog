<?php

require_once 'Modele/Modele.php';

class ModeleCommentaire extends Modele
{
    // Récupérer les commentaires
    public function getCommentairesBillet($idBillet)
    {
        $sql = "SELECT * FROM t_commentaire WHERE bil_id = $idBillet";
        return $this->executerLecture($sql);
    }

    public function ajouterCommentaire($idBillet, $auteur, $contenu)
    {
        $sql = "INSERT INTO t_commentaire VALUES('', NOW(), '$auteur', '$contenu', $idBillet)";
        $this->executerInsertion($sql);
    }
}

