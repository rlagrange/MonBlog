<?php

abstract class Modele
{

    private $bdd;

    private function getBDD()
    {
        if ($this->bdd == null) {
            $this->bdd = new PDO('mysql:host=localhost;dbname=MonBlog', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd->query('set names utf8');
        }
        return $this->bdd;
    }

    protected function executerLecture($sql, $accederPremierElement = false)
    {
        $resultats = $this->getBDD()->query($sql);
        if ($accederPremierElement == true)
            return $resultats->fetch();
        else
            return $resultats;
    }

    protected function executerInsertion($sql)
    {
        $this->getBDD()->query($sql);
    }
}