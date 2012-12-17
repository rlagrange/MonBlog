<?php

require_once  'Controleur/Controleur.php';

class ControleurCommentaire extends Controleur
{

    private $modeleCommentaire;

    public function __construct()
    {
        $this->modeleCommentaire = new ModeleCommentaire();
    }

    // Gérer l'ajout d'un commentaire sur un billet
    public function  ajouterCommentaire($idBillet, $auteur, $contenu)
    {
        $this->modeleCommentaire->ajouterCommentaire($idBillet, $auteur, $contenu);
        // Et on affiche la vue
        $this->genererVue("ajoutCommentaire", array('idBillet' => $idBillet));
    }
}