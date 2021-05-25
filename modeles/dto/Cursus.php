<?php

class Cursus
{
    use Hydrate;
    private $idUtilisateur;
    private $Annee;
    private $idFiliere;

    public function __construct( $idUtilisateur="",  $Annee="",$idFiliere="")
    {
        $this->idUtilisateur=$idUtilisateur;
        $this->Annee=$Annee;
        $this->idFiliere=$idFiliere;
    }   

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getAnnee()
    {
        return $this->Annee;
    }

    public function getIdFiliere()
    {
        return $this->idFiliere;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setAnnee($Annee)
    {
        $this->Annee = $Annee;
    }

    public function setIdFiliere($idFiliere)
    {
        $this->idFiliere = $idFiliere;
    }
}