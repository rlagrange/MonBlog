<?php

require_once 'Modele/Modele.php';

class ModeleBillet extends Modele
{

    // Méthode pour récupèrer tous les billets
    public function getBillets()
    {
        $sql = "SELECT * FROM t_billet ORDER BY BIL_ID desc";
        return $this->executerLecture($sql);
    }

    // Méthode pour récupérer un seul billet
    public function getBillet($idBillet)
    {
        $sql = "SELECT * FROM t_billet WHERE bil_id = $idBillet";
        return $this->executerLecture($sql, true); // true car on veut qu'un seul résultat.
    }
}