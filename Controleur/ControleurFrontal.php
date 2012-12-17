<?php

// CONTROLEUR FRONTAL
// Il va router tout ce qui est possible.
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurCommentaire.php';

class ControleurFrontal extends Controleur
{
    private $ctrlBillet;
    private $ctrlCommentaire;

    public function __construct()
    {
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlCommentaire = new ControleurCommentaire();
    }

    public function routerRequete()
    {
        try {

            if (isset($_GET['action'])) {
                // On va regarder ce que l'on veut faire 
                if ($_GET['action'] == 'afficherBillet') {
                    if (isset($_GET['id'])) {
                        $idBillet = intval($_GET['id']);
                        $this->ctrlBillet->afficherBillet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non défini");
                }
                else if ($_GET['action'] == 'ajouterCommentaire')
                {
                    if ($_POST)
                    {
                        if ($_POST['auteur'] != "" AND $_POST['contenu'] != "")
                        {
                            $auteur = stripslashes($_POST['auteur']);
                            $contenu = stripslashes($_POST['contenu']);
                            $idBillet = $_POST['idBillet'];
                            $this->ctrlCommentaire->ajouterCommentaire($idBillet, $auteur, $contenu);
                        }
                        else
                        {
                            throw new Exception("Votre pseudo est vide ou votre commentaire est vide.");
                        }
                    }
                    else
                    {
                        throw new Exception("Vous n'êtes pas passé par le formulaire pour poster un commentaire");
                    }
                }
                else {
                    throw new Exception("Page introuvable");
                }
            }
            else { 
                $this->ctrlBillet->afficherBillets(); // On affiche par défaut la liste des billets
            }

        }

        catch (Exception $ex)
        {
            $this->afficherErreur($ex->getMessage());
        }
    }
}