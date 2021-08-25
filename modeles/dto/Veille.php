<?php

class Veille
{
    use Hydrate;
    private $idVeille;
    private $description;
    private $nom;

    public function getIdVeille()
    {
        return $this->idVeille;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setIdVeille($idVeille)
    {
        $this->idVeille = $idVeille;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}