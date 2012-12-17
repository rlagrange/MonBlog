<?php

require_once  'Controleur/Controleur.php';
require_once  'Modele/ModeleBillet.php';
require_once 'Modele/ModeleCommentaire.php';

class ControleurBillet extends Controleur
{

    private $modeleBillet;
    private $modeleCommentaire;

    public function __construct()
    {
        $this->modeleBillet = new ModeleBillet();
        $this->modeleCommentaire = new ModeleCommentaire();
    }

    public function afficherBillets()
    {
        $billets = $this->modeleBillet->getBillets();
        $lienBillet = "index.php?action=afficherBillet&id=";
        $this->genererVue("afficherBillets", array(
            'billets'    => $billets,
            'lienBillet' => $lienBillet,
        ));
    }

    public function afficherBillet($idBillet)
    {
        $billet = $this->modeleBillet->getBillet($idBillet);
        $commentaires = $this->modeleCommentaire->getCommentairesBillet($idBillet);
        $this->genererVue("afficherBillet", array(
            "billet"       => $billet,
            "commentaires" => $commentaires,
        ));
    }
}