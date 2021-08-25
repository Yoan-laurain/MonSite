<?php
class Projet 
{
    use Hydrate;
    private $idProjet;
    private $nom;
    private $Description_;
    private $idUtilisateur ;

    public function __construct( $idProjet="",  $nom="",$Description_="",$idUtilisateur="")
    {
        $this->idProjet=$idProjet;
        $this->nom=$nom;
        $this->Description_=$Description_;
        $this->idUtilisateur=$idUtilisateur;
    }   
 
     public function getIdProjet()
     {
         return $this->idProjet;
     }
 
     public function getNom()
     {
         return $this->nom;
     }
 
     public function getDescription()
     {
         return $this->Description_;
     }
 
     public function getIdUtilisateur()
     {
         return $this->idUtilisateur;
     }
 
     public function setIdProjet($idProjet)
     {
         $this->idProjet = $idProjet;
     }
 
     public function setNom($nom)
     {
         $this->nom = $nom;
     }
 
     public function setDescription($Description)
     {
         $this->Description_ = $Description;
     }
 
     public function setIdUtilisateur($idUtilisateur)
     {
         $this->idUtilisateur = $idUtilisateur;
     }
}