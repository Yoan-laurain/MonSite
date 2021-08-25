<?php

class Filiere
{
    use Hydrate;
    private $idFiliere;
    private $nom;

    public function __construct( $idFiliere="",  $nom="")
    {
        $this->idFiliere=$idFiliere;
        $this->nom=$nom;
    }   

    public function getIdFiliere()
    {
        return $this->idFiliere;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setIdFiliere($idFiliere)
    {
        $this->idFiliere = $idFiliere;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}